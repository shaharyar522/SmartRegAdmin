
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/hidden_form.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Table Container */
.table-container {
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    padding: 15px;
    background-color: #2a4479c7;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    overflow-x: auto;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
}

/* Table Headers */
thead {
    background: #00246B;
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    font-size: 18px;
}

/* Table Rows */
tbody tr:nth-child(even) {
    background: #f4f4f4;
}

tbody tr:hover {
    background: #6AB187;
    color: white;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 10px;
}

.edit-btn, .delete-btn {
    padding: 8px 14px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.edit-btn {
    background: #ffc107;
    color: black;
}

.edit-btn:hover {
    background: #e0a800;
    transform: scale(1.05);
}

.delete-btn {
    background: #dc3545;
    color: white;
}

.delete-btn:hover {
    background: #c82333;
    transform: scale(1.05);
}

/* Responsive Styling */
@media (max-width: 768px) {
    .table-container {
        max-width: 95%;
    }

    

    th, td {
        padding: 10px;
        font-size: 14px;
    }

    .edit-btn, .delete-btn {
        padding: 6px 12px;
        font-size: 12px;
    }
}

    </style>

</head>
<body>
    <!-- Buttons to show Forms -->
<div class="top-section">
    <button id="countryBtn" class="btn" style="background-color:#6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">Country</button>
    <button id="newsBtn" class="btn" style="background-color: #6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">State</button>

    <button id="marqueeBtn" class="btn" style="background-color: #6AB187; color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: bold; transition: background-color 0.3s, transform 0.2s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">City</button>

</div>
<!-- Forms Section -->
<div id="formSection" class="bottom-section">
    <div class="form-container" id="countryform" style="display:none;">
        <h3>Add_Country</h3>

        <form action="incs/country.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="country_title" placeholder="Add a Country">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
        
       
    </div>
    <div class="form-container" id="Stateform" style="display:none;">
        <h3>Add_State</h3>
        <form action="" method="POST">
          <input type="text" name="state" placeholder="Add a State">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
    <div class="form-container" id="CityForm" style="display:none;">
        <h3>Add_City</h3>
        <form action="" method="POST">
           <input type="text" name="city" placeholder="Add a  City">
            <button type="submit" name="submit" value="sub">Submit</button>
        </form>
    </div>
</div>
<h3>Country List</h3>
        <table>
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>sldfh</td>
                    <td>sldfh</td>
                    <td>sldfh</td>
            
            </tr>
              
            </tbody>
        </table>





















<!-- uay hamray pass sweet aler ka code hian country ka  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Check URL for success message
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.has('success')) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your data has been successfully inserted.",
            showConfirmButton: false,
            timer: 1500
        });

        // Remove success from URL after showing alert
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (urlParams.has('error')) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: urlParams.get('error')
        });

        // Remove error from URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
</script>

</body>
</html>






