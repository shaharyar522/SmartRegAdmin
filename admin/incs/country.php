<?php
include("../incs/conn.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'sub') {
    $country_title = $_POST['country_title'];

    // Insert query
    $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your data has been saved successfully!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../index.php';
                });
            };
        </script>";
    } else {
        echo "<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '" . mysqli_error($conn) . "',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../dashboard.php';
                });
            };
        </script>";
    }
}
?>

<!-- Add SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
