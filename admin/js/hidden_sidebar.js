document.addEventListener("DOMContentLoaded", function () {
    let contentArea = document.querySelector(".main-content .dashboard"); // Yahan content show hoga

    let links = {
        dashboard: document.getElementById("dashboardLink"),
        countryData: document.getElementById("countryDataLink"),
        stateData: document.getElementById("stateDataLink"),
        cityData: document.getElementById("cityDataLink")
    };

    function loadPage(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                contentArea.innerHTML = data; // Content ko replace karna
            })
            .catch(error => console.error("Error loading page:", error));
    }

    // Event listeners
    links.dashboard.addEventListener("click", function (event) {
        event.preventDefault();
        loadPage("incs/dashboard.php");
    });

    links.countryData.addEventListener("click", function (event) {
        event.preventDefault();
        loadPage("incs/country_table.php");
    });

    links.stateData.addEventListener("click", function (event) {
        event.preventDefault();
        loadPage("incs/state_table.php"); // Aap isko baad mein add kar sakte hain
    });

    links.cityData.addEventListener("click", function (event) {
        event.preventDefault();
        loadPage("incs/city_table.php"); // Aap isko baad mein add kar sakte hain
    });

    // Default page load (dashboard)
    loadPage("incs/dashboard.php");
});
