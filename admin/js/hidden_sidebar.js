document.addEventListener("DOMContentLoaded", function () {
    let sections = {
        dashboard: document.getElementById("dashboardSection")
    };

    let links = {
        dashboard: document.getElementById("dashboardLink")
    };

    // Initially hide the dashboard section
    sections.dashboard.style.display = "none";

    // Function to toggle the dashboard section visibility
    function toggleSection() {
        if (sections.dashboard.style.display === "none") {
            sections.dashboard.style.display = "block";
        } else {
            sections.dashboard.style.display = "none";
        }
    }

    // Event listener for the dashboard link to toggle visibility
    links.dashboard.addEventListener("click", function (event) {
        event.preventDefault();
        toggleSection();
        // Optional: Update the URL without reloading the page
        const currentDisplay = sections.dashboard.style.display === "block" ? "index.php" : "";
        history.pushState(null, "", currentDisplay);
    });
});
