<?php
include("../incs/conn.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'sub') {
    $country_title = $_POST['country_title'];

    // Insert query
    $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
        header("Location: ../index.php?section=countryData&success=1");
        exit();
    } else {
        echo "Failed to update data!";
    }
}







?>

<!-- Add SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Function to show alert if update is successful
  function showSuccessAlert() {
    Swal.fire({
      title: "Success!",
      text: "Your data has been updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    });
  }

  // Check URL parameters
  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
      showSuccessAlert();
      // Remove the success param from URL to prevent repeat alerts
      window.history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&?success=1/, ''));
    }
  });
</script>
