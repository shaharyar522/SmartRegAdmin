<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Register</title>
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/dashbord.css">
    <link rel="stylesheet" href="css/header_h1.css">
    <!-- css botstarp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include("./incs/left_admin_dashboard.php") ?>

    <div class="main-content">
        <div class="dashboard">
            <!-- Header ko hataya nahi jayega -->
            <div class="dashboard-topbar">
                <h1 class="dashboard-header">Interactive CMS Dashboard</h1>
                <a href="../logout.php" class="logout-btn">Logout</a>
            </div>

            <!-- Sections -->
            <div id="dashboardSection">
                <?php include("incs/dashboard.php"); ?>
            </div>

            <div id="countryDataSection" style="display: none;">
                <?php include("incs/country_table.php"); ?>
            </div>

            <div id="stateDataSection" style="display: none;">
                <?php include("incs/state_table.php"); ?>
            </div>

            <div id="cityDataSection" style="display: none;">
                <?php include("incs/city_table.php"); ?>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/hidden_sidebar.js"></script>
    <script src="js/dashbord.js"></script>
</body>

</html>