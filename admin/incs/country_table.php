<?php
include("conn.php");


if (isset($_GET['delete'])) {
  $country_id = $_GET['delete'];

  $sql = "DELETE FROM `country` WHERE `country_id` = $country_id";
  $result = mysqli_query($conn, $sql);

  
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
                          <button class='delete btn btn-sm btn-primary' id=d".$row['country_id'].">Delete</button></td>
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

 <!-- iserting code  -->
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
    deletes_button = document.getElementsByClassName('delete');
    Array.from(deletes_button).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit", );
        tr = e.target.parentNode.parentNode;
        tittle = tr.getElementsByTagName("td")[0].innerText;

        country_id = e.target.id.substr(1, )

        //main pahly user say pohco ga kay ap es ko delete karna chatin hain
        if (confirm("press a button")) {
          console.log("yes");
          window.location = `../index.php?section=countryData?c${country_id}`;
        } else {
          console.log("no");
        }
      });
    });
  </script>
  <!-- End delete code -->








</body>

</html>