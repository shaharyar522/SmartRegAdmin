document.addEventListener("DOMContentLoaded", function () {
    let countryDataSection = document.getElementById("countryDataSection");
    let countryDataLink = document.getElementById("countryDataLink");

    // Check if redirected after editing country data
    let urlParams = new URLSearchParams(window.location.search);
    let section = urlParams.get("section");

    if (section === "countryData" && countryDataSection) {
        countryDataSection.style.display = "block"; // Ensure country data is visible
    }

    // Event listener only for "Country Data" link
    if (countryDataLink) {
        countryDataLink.addEventListener("click", function (event) {
            event.preventDefault();
            if (countryDataSection) {
                countryDataSection.style.display = "block"; // Show "Country Data" section
            }
            history.pushState(null, "", "?page=countryData"); // Update URL
        });
    }
});
