<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- now this is sweet alert script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/dashbord.css">
    <!-- css botstarp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <!-- jquey -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- uay form ki css hian -->
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form input[type="text"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form input[type="text"]:focus,
        form input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        form button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <!-- uay hamray pass  connection hian -->
    <?php include("connection.php");
    // star update code
    if (isset($_POST['snoEdit_Marquee'])) {
        $marquee_id_update = $_POST['snoEdit_Marquee'];
        $update_Marquee_text = $_POST['marqueeTextEdit'];
        $updatemarquee_query = "UPDATE  marquee set marquee_text = ' $update_Marquee_text' where marquee_id  = '$marquee_id_update'";

        $result = mysqli_query($conn, $updatemarquee_query);
        if ($result) {
            echo  "<script>
           Swal.fire({
               icon: 'success',
               title: 'Success!',
               text: 'Your Marquee_Text List  has been updated successfully!',
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




    // delete code start     /// es main jo delete_news_button uay  uay hamray pass class  hian
    if (isset($_GET['delete_marquee_button'])) {
        $snoEdit_marquee  = $_GET['delete_marquee_button'];
        $delet_query = "DELETE FROM `marquee` where marquee_id  = $snoEdit_marquee";
        $result = mysqli_query($conn, $delet_query);

        if ($result) {
            echo "<script>
        Swal.fire({
         icon: 'success',
         title: 'Success!',
         text: 'Your Marquee List data has been Deleted successfully!',
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








    <!-- start modal  -->

    <!-- Modal -->
    <div class="modal fade" id="edit_MarqueeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edits Marquee_Text</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="text" name="marqueeTextEdit" id="marqueeTextEdit" placeholder="Enter scrolling text" required>
                        <button type="submit" name="submit" value="sub">Update Marquee_Text</button>
                        <input type="hidden" name="snoEdit_Marquee" id="snoEdit_Marquee">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->





    <!-- table start -->
    <div class="container my-4">
        <h1 class="text-center fw-bold" style="color: white;">Marquee List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Marquee_Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $Select_query = "SELECT * FROM marquee";
                    $result = mysqli_query($conn, $Select_query);
                    $marquee_id = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $marquee_id++;
                        echo "<tr>
                        <td>" . $row['marquee_id'] . "</td>
                        <td>" . $row['marquee_text'] . "</td>
                     <td><button class='edit_marquee_button  btn btn-sm btn-primary' id=" . $row['marquee_id'] . ">Edit</button> 
                          <button class='delete_marquee_button  btn btn-sm btn-danger' id=d" . $row['marquee_id'] . ">Delete</button></td>
                          </tr>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- table End -->










    <!-- es mian bhei hamray pas both js hian 
     1.click karnay par wo hamay show hnt hai button 
     2. ab main button ka parent main jao ga or us ka bhei parent main jao ga to mohjy td td mill jian guy or un ki values ko lain loga 
     3.jasay hi mohjay dono td millay guy main un dono ko lain lo ga mtlab news_title or news_description 
     4.jashay hi mohjy dono td mill jian guy to main un ko modal main dall dun gaa -->

    <script>
        edits_button = document.getElementsByClassName('edit_marquee_button');
        Array.from(edits_button).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("Edit_button ", );
                tr = e.target.parentNode.parentNode;
                Marque_text = tr.getElementsByTagName("td")[1].innerText;
                console.log(Marque_text);
                marqueeTextEdit.value = Marque_text;

                // ab hum modal ko js kay throw or  jo modal m id di hngo wohi uahe lehkay guy

                //ab main ny ek hidden input main id dalli hian us ko main pass karo ga mtalb us ko main jo e.target h us kay barabar ke dun ga
                //mtab hun ny ek hidden input dall hian or us ko jo id di hian ab hamray pass wo jo hidden id di thi us ko database wali id 
                // kay barabar ke dia hian .. matlab kay snoEdit_news = hian hamray pass jo database main value h 
                snoEdit_Marquee.value = e.target.id;
                console.log(e.target.id);
                $('#edit_MarqueeModal').modal('toggle');
            })
        });



        //delete js code start  
        deletes_button = document.getElementsByClassName('delete_marquee_button');
        Array.from(deletes_button).forEach((element) => {
            element.addEventListener("click", (e) => {
                snoEdit_Marquee = e.target.id.substr(1, );
                if (confirm("Are you Confirm to Delete")) {
                    window.location = `./index.php?delete_marquee_button=${snoEdit_Marquee}`;
                } else {
                    console.log("no");
                }

            })
        });
    </script>






</body>

</html>