<?php
include("../incs/conn.php");


if (isset($_POST['submit'])  && $_POST['submit'] == 'sub') {

    $country_title = $_POST['country_title'];

    //ab hum data insert karay guy databse m 

    $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        // Redirect back with success message in URL
        header("Location:../index.php?success=1");
        exit();
    } else {
        // Redirect back with error message
        header("Location:../index.php?error=" . urlencode(mysqli_error($conn)));
        exit();
    }
}
?>
