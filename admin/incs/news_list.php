<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- now this is sweet alert script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
</head>

<body>
    <!-- Connection add -->
    <?php require_once("connection.php");
    //edit code start
    if (isset($_POST['snoEdit_news'])) {
        $news_id_update = $_POST['snoEdit_news'];
        $news_title_update = $_POST['newsTitleEdit'];
        $news_descripiotn_update = $_POST['newsDescriptionEdit'];
        $updatenews_query = "UPDATE  news set news_title = ' $news_title_update' , news_description = ' $news_descripiotn_update' where news_id = '$news_id_update'";

        $result = mysqli_query($conn, $updatenews_query);
        if ($result) {
            echo  "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your News List  has been updated successfully!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Update query failed!',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    }
    //Edit code End



    // delete code start     /// es main jo delete_news_button uay  uay hamray pass class  hian
    if (isset($_GET['delete_news_button'])) {
        $snoEdit_news  = $_GET['delete_news_button'];
        $delet_query = "DELETE FROM `news` where news_id  = $snoEdit_news";
        $result = mysqli_query($conn, $delet_query);
        if ($result) {
            echo "<script>
      Swal.fire({
        icon: 'success',
         title: 'Success!',
         text: 'Your News List data has been Deleted successfully!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
         });
            </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Update query failed!',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    }

    //End delete code






    ?>



    <!-- start modal  when click the edit button  -->
    <!-- Modal -->
    <div class="modal fade" id="eidt_newsModal" tabindex="-1" aria-labelledby="ediit_newsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ediit_newsModalLabel">Edits News List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="text" name="newsTitleEdit" id="newsTitleEdit" placeholder="Enter news title" required>
                        <textarea name="newsDescriptionEdit" id="newsDescriptionEdit" placeholder="Enter news description" required></textarea>
                        <button type="submit" name="submit" value="sub">Update News List</button>
                        <!-- uay hamray pass hidden input dalla hian jo kay code lehkon ga or main es ko update karo ga  -->
                        <input type="hidden" name="snoEdit_news" id="snoEdit_news">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->















    <!-- Start table -->
    <div class="container my-4">
        <h1 class="text-center fw-bold" style="color: white;">News List</h1>
        <table class="table" id="myTable_news">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>News_title</th>
                    <th>News_description</th>
                    <th>Action</th> <!-- Column 3 -->
                </tr>
            </thead>
            <tbody>
                <?php
                $select_query = "SELECT * FROM news";
                $result = mysqli_query($conn, $select_query);
                $news_id = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $news_id++;
                    echo "
                    <tr> 
                       <td>" . $row['news_id'] . "</td>
                       <td>" . $row['news_title'] . "</td>
                       <td>" . $row['news_description'] . "</td>
                        <td>
                         <button class='edit_news_button  btn btn-sm btn-primary'   id =" . $row['news_id'] . " >Edit</button> 
                       <button class='delete_news_button btn btn-sm btn-danger' id=d" . $row['news_id'] . ">Delete</button>
                        </td> 
                    </tr>";
                }
                ?>
                <!-- es main hum ny edit button ko class di hian edit_news_button k name say  -->
            </tbody>
        </table>
    </div>
    <!-- End Table -->

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#myTable_news').DataTable();
        });
    </script>




    <!-- es mian bhei hamray pas both js hian 
     1.click karnay par wo hamay show hnt hai button 
     2. ab main button ka parent main jao ga or us ka bhei parent main jao ga to mohjy td td mill jian guy or un ki values ko lain loga 
     3.jasay hi mohjay dono td millay guy main un dono ko lain lo ga mtlab news_title or news_description 
     4.jashay hi mohjy dono td mill jian guy to main un ko modal main dall dun gaa -->

    <script>
        edits_button = document.getElementsByClassName('edit_news_button');
        Array.from(edits_button).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("Edit_button ", );
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[1].innerText;
                description = tr.getElementsByTagName("td")[2].innerText;
                console.log(title, description);
                //jo maray pass titile or description ki td value i hian ab main us ko form main id dian kay jo mara modal hian
                // us main dall dain guy tu wo us kay baraber hn jian gaa jab modal open hnga ab wo console.log ki bjain modal main 
                //open hnga
                newsTitleEdit.value = title;
                newsDescriptionEdit.value = description;

                // ab hum modal ko js kay throw or  jo modal m id di hngo wohi uahe lehkay guy

                //ab main ny ek hidden input main id dalli hian us ko main pass karo ga mtalb us ko main jo e.target h us kay barabar ke dun ga
                //mtab hun ny ek hidden input dall hian or us ko jo id di hian ab hamray pass wo jo hidden id di thi us ko database wali id 
                // kay barabar ke dia hian .. matlab kay snoEdit_news = hian hamray pass jo database main value h 
                snoEdit_news.value = e.target.id;
                console.log(e.target.id);
                $('#eidt_newsModal').modal('toggle');
            })
        });


        //delete js code start  
        deletes_button = document.getElementsByClassName('delete_news_button');
        Array.from(deletes_button).forEach((element) => {
            element.addEventListener("click", (e) => {
                snoEdit_news = e.target.id.substr(1, );
                if (confirm("Are you Confirm to Delete")) {
                    window.location = `./index.php?delete_news_button=${snoEdit_news}`;
                } else {
                    console.log("no");
                }

            })
        });
    </script>


</body>

</html>