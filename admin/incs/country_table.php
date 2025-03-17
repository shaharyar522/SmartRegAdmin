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
    <?php require_once("conn.php")?>
        <!-- modal hian harmay apass -->
     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                    <th>Sno</th>
                    <th>Title</th>
                    <th>Action</th>
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
                          <td><button class='edit btn btn-sm btn-primary'>Edit</button> 
                          <button class='delete_country_button btn btn-sm btn-danger' id=d" . $row['country_id'] . ">Delete</button></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


<script>
    edits_button = document.getElementsByClassName('edit');
    Array.from(edits_button).forEach((element)=>{
        element.addEventListener("click", (e)=>{
            console.log("edit", e.target);
        })

    })
</script>





<!-- At the bottom before </body> -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>

</html>