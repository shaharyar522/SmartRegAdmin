<?php

$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$databasename = "student_registraction";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}






if (isset($_POST['submit'])  && $_POST['submit'] == 'sub') {

    $country_title = $_POST['country_title'];

    //ab hum data insert karay guy databse m 

    $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>alert('Query executed successfully!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="country_title" placeholder="Add a Country">
    <button type="submit" name="submit" value="sub">Submit</button>
</form>

</body>
</html>