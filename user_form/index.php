<?php
// Database connection
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "student_registraction"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $student_cnic = $_POST['student_cnic'];
    $father_name = $_POST['father_name'];
    $father_cnic = $_POST['father_cnic'];
    $email = $_POST['student_email'];
    $phone = $_POST['student_phone'];
    $student_country = $_POST['student_country'];
    $student_state = $_POST['student_state'];
    $student_city = $_POST['student_city'];

    $sql = "INSERT INTO student_form (student_name, student_cnic, father_name, father_cnic, student_email, student_phone, student_country, student_state, student_city) 
            VALUES ('$student_name', '$student_cnic', '$father_name', '$father_cnic', '$email', '$phone', '$student_country', '$student_state', '$student_city')";

    if ($conn->query($sql) === TRUE) {
        $message = "Data has been successfully inserted!";
        $message_type = "success";
    } else {
        $message = "Error: " . $conn->error;
        $message_type = "error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/form.css">
</head>

<body>

<?php if (!empty($message)) : ?>
    <script>
        Swal.fire({
            icon: "<?php echo $message_type; ?>",
            title: "<?php echo ucfirst($message_type); ?>!",
            text: "<?php echo $message; ?>",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "index.php";
        });
    </script>
<?php endif; ?>

  <div class="form-container">
    <h1>Student Registration</h1>
    <form id="studentForm" method="POST">
      <div class="form-group">
        <input type="text" id="student_name" name="student_name" required placeholder=" ">
        <label for="student_name">Student Name</label>
      </div>
      
      <div class="form-group">
        <input type="text" id="student_cnic" name="student_cnic" required placeholder=" ">
        <label for="student_cnic">Student CNIC</label>
      </div>
      
      <div class="form-group">
        <input type="text" id="father_name" name="father_name" required placeholder=" ">
        <label for="father_name">Father's Name</label>
      </div>
      
      <div class="form-group">
        <input type="text" id="father_cnic" name="father_cnic" required placeholder=" ">
        <label for="father_cnic">Father's CNIC</label>
      </div>
      
      <div class="form-group">
        <input type="email" id="email" name="student_email" required placeholder=" ">
        <label for="email">Email</label>
      </div>
      
      <div class="form-group">
        <input type="tel" id="phone" name="student_phone" required placeholder=" ">
        <label for="phone">Phone Number</label>
      </div>
      
      <!-- Fetching Country Data from Database -->
        <?php
        $sql = "SELECT country_id, country_title FROM country";
        $result = $conn->query($sql);
        ?>
        <div class="form-group">
          <select id="country" name="student_country" required>
            <option value="">Select Country</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='" . $row['country_id'] . "'>" . $row['country_title'] . "</option>";
            }
            ?>
          </select>
        </div>

      
      <div class="form-group">
        <select id="state" name="student_state" required>
          <option value=""></option>
          <option value="California">California</option>
          <option value="Texas">Texas</option>
          <option value="Punjab">Punjab</option>
        </select>
        <label for="state">State</label>
      </div>
      
      <div class="form-group">
        <select id="city" name="student_city" required>
          <option value=""></option>
          <option value="New York">New York</option>
          <option value="Los Angeles">Los Angeles</option>
          <option value="Lahore">Lahore</option>
        </select>
        <label for="city">City</label>
      </div>
      
      <button type="submit" class="submit-btn" name="student_form" value="sub">Register</button>
    </form>
  </div>

</body>
</html>