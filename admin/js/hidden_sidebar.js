document.addEventListener("DOMContentLoaded", function () {
    let countryDataSection = document.getElementById("countryDataSection");
    let countryDataLink = document.getElementById("countryDataLink");

    // ✅ Update to match PHP redirection
    let urlParams = new URLSearchParams(window.location.search);
    let section = urlParams.get("section");  // ✅ Use 'section' instead of 'page'

    if (section === "countryData" && countryDataSection) {
        countryDataSection.style.display = "block"; // Ensure country data is visible
    }

    // Event listener for "Country Data" link
    if (countryDataLink) {
        countryDataLink.addEventListener("click", function (event) {
            event.preventDefault();
            if (countryDataSection) {
                countryDataSection.style.display = "block"; // Show "Country Data" section
            }
            history.pushState(null, "", "?section=countryData"); // ✅ Update URL to match PHP
        });
    }
});
