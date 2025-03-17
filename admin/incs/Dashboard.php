<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/hidden_form.css">
    <link rel="stylesheet" href="./css/button.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Buttons to show Forms -->
    <div class="top-section">
    <button id="countryBtn" class="btn">Country</button>
    <button id="" class="btn">State</button>
    <button id="" class="btn">City</button>
</div>

    <!-- Forms Section -->
    <div id="formSection" class="bottom-section">
        <div class="form-container" id="countryform" style="display:none;">
            <h3>Add Country</h3>
            <form action="incs/country.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="country_title" placeholder="Add a Country" required>
                <button type="submit" name="submit" value="sub">Submit</button>
            </form>
        </div>

        <div class="form-container" id="stateform" style="display:none;">
            <h3>Add State</h3>
            <form action="incs/state.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="state_title" placeholder="Add a State" required>
                <button type="submit" name="submit" value="sub">Submit</button>
            </form>
        </div>

        <div class="form-container" id="cityform" style="display:none;">
            <h3>Add City</h3>
            <form action="incs/city.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="city_title" placeholder="Add a City" required>
                <button type="submit" name="submit" value="sub">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</body>

</html>