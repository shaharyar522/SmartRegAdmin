<?php
session_start(); // Start the session
include("../incs/conn.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'sub') {
  $country_title = $_POST['country_title'];

  // Insert query
  $insert_query = "INSERT INTO country (country_title) VALUES ('$country_title')";
  $result = mysqli_query($conn, $insert_query);
  if ($result){
    header("Location: ../index.php?section=countryData&success=1"); // Redirect with success message
    exit();
  } else {
    echo "Failed to update data!";
  }
}
?>


<!-- Add SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function showAlert(title, text, icon) {
    Swal.fire({
      title: title,
      text: text,
      icon: icon,
      confirmButtonText: "OK"
    });
  }

  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('success')) {
      showAlert("✅ Success!", "Your data has been inserted successfully.", "success");
      window.history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&?success=1/, ''));
    } else if (urlParams.has('error')) {
      showAlert("❌ Error!", "Failed to insert data.", "error");
      window.history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&?error=1/, ''));
    }
  });
</script>
