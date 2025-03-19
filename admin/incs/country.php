<!-- uay inserteding code hian hamray pass -->
<?php
session_start(); 
include("../incs/conn.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'sub') {
    $country_title = $_POST['country_title'];

    // Insert query
    $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";
    $result = mysqli_query($conn, $insert_query);
    if ($result){
      $_SESSION['success_message'] = "Country added successfully!"; // ✅ Add this line
  } else {
      $_SESSION['error_message'] = "Failed to add country!"; // ✅ Add this line
  }

  // Redirect to index.php?page=countryData
  header("Location: ../index.php?page=countryData");
  exit();

   
}
?>





   








