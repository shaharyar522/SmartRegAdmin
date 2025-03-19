<?php
include("conn.php");


if(isset($_GET['delete'])){
 $country_id = $_GET['delete'];

 $delete_sql = "DELETE FROM `country` WHERE `country_id` =  $country_id";

 $result = mysqli_query($conn,  $delete_sql);
 if ($result) {
  echo json_encode(["status" => "success", "message" => "Country deleted successfully!"]);
} else {
  echo json_encode(["status" => "error", "message" => "Failed to delete country!"]);
}
exit(); 
}






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['snoEdit'])) {
    $Updat_country_id = $_POST['snoEdit'];
    $Updat_title = $_POST['titleEdit'];

    $update_query = "UPDATE `country` SET `country_title` = '$Updat_title' WHERE `country`.`country_id` = $Updat_country_id";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
      header("Location: ../index.php?section=countryData&success=1");
      exit();
    } else {
      echo "Failed to update data!";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- jQuery (Required for DataTables) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


</head>

<body>
  <?php require_once("conn.php") ?>
  <!-- modal hian harmay apass -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edits Country_Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="incs/country_table.php" method="POST">
            <div class="mb-3">
              <label for="" class="form-label">Title</label>
              <input type="text" class="form-control" name="titleEdit" id="titleEdit">
            </div>
            <button type="submit" class="btn btn-primary">Update_Country</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- ab main es main hidden input tag dallun ga or us ko main trigger karo ga -->
            <input type="hidden" name="snoEdit" value="sub" id="snoEdit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- End modal  -->


  <!-- this is table  -->
  <div class="container my-4">
    <h1 class="text-center fw-bold" style="color: white;">Country Data</h1>
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th style="text-align: center; vertical-align: middle;">Sno</th>
          <th style="text-align: center; vertical-align: middle;">Title</th>
          <th style="text-align: center; vertical-align: middle;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM country";
        $result = mysqli_query($conn, $query);
        $country_id  = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $country_id++;
          echo "<tr>
                         <th>" . $country_id  . "</th>
                          <td>" . $row['country_title'] . "</td>
                          <td>
                          <button class='edit btn btn-sm btn-primary' id=" . $row['country_id'] . ">Edit</button> 
                          <button class='delete btn btn-sm btn-primary' id=d" . $row['country_id'] . ">Delete</button></td>
                          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- End table -->








  <!-- At the bottom before </body> -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>


  <!-- UAY HAMRAY PASS WO CODE HIAN jab humn data ko inserted karay guy 
 or wo us ko $result kay bad hun ny usy js ka code paste kya hina -->

  <!-- inserting sweet swal funciton js code   -->
  <script>
    // Function to show SweetAlert2 messages
    function showAlert(type, title, message) {
      Swal.fire({
        icon: type, // "success" or "error"
        title: title,
        text: message,
        confirmButtonText: "OK",
        customClass: {
          popup: 'swal-custom-popup', // Custom styling
          title: 'swal-custom-title',
          confirmButton: 'swal-custom-btn'
        }
      });
    }

    $(document).ready(function() {
      // ✅ Show session-based messages (PHP to JS)
      <?php
      if (isset($_SESSION['success_message'])) {
        echo "showAlert('success', 'Success!', '{$_SESSION['success_message']}');";
        unset($_SESSION['success_message']); // Clear session message after displaying
      }

      if (isset($_SESSION['error_message'])) {
        echo "showAlert('error', 'Error!', '{$_SESSION['error_message']}');";
        unset($_SESSION['error_message']); // Clear session message after displaying
      }
      ?>

      // ✅ Show message if URL contains success=1
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('success')) {
        showAlert('success', 'Success!', 'Your data has been updated successfully.');
        // Remove success parameter from URL to prevent repeat alerts
        window.history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&?success=1/, ''));
      }
    });
  </script>
  <!-- End inserting swal funciton js code  -->



<!-- starting delet swal js code  -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    let deleteButtons = document.querySelectorAll(".delete");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function() {
            let country_id = this.id.replace("d", ""); // Extract numeric ID

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ Redirect to delete PHP script
                    window.location = `/p4/admin/incs/delete_country.php?delete=${country_id}`;
                }
            });
        });
    });
});
</script>


<!-- End swal funciton js code  -->














  <!-- start Edit js -->
  <script>
    edits_button = document.getElementsByClassName('edit');
    Array.from(edits_button).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit", );
        tr = e.target.parentNode.parentNode;
        tittle = tr.getElementsByTagName("td")[0].innerText;
        console.log(tittle);
        document.getElementById("titleEdit").value = tittle;
        snoEdit.value = e.target.id;
        console.log(e.target.id);


        // es ka matlab hain kay ka agar form hidden hain tu open kar dun or agar 
        // wo open hain tu us ko hidde kar dun;
        $('#editModal').modal('toggle');
      });
    });
  </script>

  
  <!-- End Edit js -->



  <!-- start delete code -->
  <script>
document.addEventListener("DOMContentLoaded", function () {
    let deleteButtons = document.querySelectorAll(".delete");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            let country_id = this.id.replace("d", ""); // Extract numeric ID

            Swal.fire({
              title: "Are you sure you want to delete this country?",
              text: "This will permanently remove the country from the database!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ Redirect to delete PHP script
                    fetch(`incs/country_table.php?delete=${country_id}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: "Your country has been deleted successfully!",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    // ✅ Redirect after confirmation
                                    window.location.href = "index.php?section=countryData";
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "Failed to delete the country!",
                                    confirmButtonText: "OK"
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: "Something went wrong!",
                                confirmButtonText: "OK"
                            });
                        });
                }
            });
        });
    });
});

</script>

  <!-- End delete code -->








</body>

</html>