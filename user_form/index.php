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
$uploaded_image = "";

// Form Submission
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

  // File Upload Handling
  $file_name = $_FILES['student_image']['name'];
  $file_tmp = $_FILES['student_image']['tmp_name'];
  $upload_dir = "uploads/";

  if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
  }

  $file_path = $upload_dir . basename($file_name);
  move_uploaded_file($file_tmp, $file_path);

  // Insert data into database
  $sql = "INSERT INTO student_form (student_name, student_cnic, father_name, father_cnic, student_email, student_phone, student_country, student_state, student_city, student_image) 
          VALUES ('$student_name', '$student_cnic', '$father_name', '$father_cnic', '$email', '$phone', '$student_country', '$student_state', '$student_city', '$file_path')";

  if ($conn->query($sql) === TRUE) {
    $message = "Data has been successfully inserted!";
    $message_type = "success";

    // Fetch the last uploaded image for display
    $uploaded_image = $file_path;
  } else {
    $message = "Error: " . $conn->error;
    $message_type = "error";
  }
}

// Fetch last uploaded student image from database
$image_query = "SELECT student_image FROM student_form ORDER BY student_name DESC LIMIT 1";

$image_result = $conn->query($image_query);
if ($image_result->num_rows > 0) {
  $row = $image_result->fetch_assoc();
  $uploaded_image = $row['student_image'];
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 20px;
    }

    .form-container {
      flex: 1;
    }

    .image-preview {
      width: 300px;
      height: 300px;
      border: 2px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f8f8;
    }

    .image-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
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

  <div class="container">
    <!-- Left Side: Form -->
    <div class="form-container">
      <h1>Student Registration</h1>
      <form id="studentForm" method="POST" enctype="multipart/form-data">
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

        <!-- Bootstrap File Upload -->
        <div class="mb-3">
          <label for="student_image" class="form-label">Upload Student Image</label>
          <input class="form-control" type="file" id="student_image" name="student_image" required>
        </div>

        <button type="submit" class="submit-btn" name="student_form" value="sub">Register</button>
      </form>
    </div>

    <!-- Right Side: Image Preview -->
    <div class="image-preview">
      <?php if (!empty($uploaded_image)) : ?>
        <img src="<?php echo $uploaded_image; ?>" alt="Uploaded Image">
      <?php else : ?>
        <p>No Image Uploaded</p>
      <?php endif; ?>
    </div>
  </div>

</body>

</html>

<?php
$conn->close();
?>


