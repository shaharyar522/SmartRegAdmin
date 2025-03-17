document.addEventListener("DOMContentLoaded", function () {
    let sections = {
        dashboard: document.getElementById("dashboardSection"),
        countryData: document.getElementById("countryDataSection"),
        stateData: document.getElementById("stateDataSection"),
        cityData: document.getElementById("cityDataSection")
    };

    let links = {
        dashboard: document.getElementById("dashboardLink"),
        countryData: document.getElementById("countryDataLink"),
        stateData: document.getElementById("stateDataLink"),
        cityData: document.getElementById("cityDataLink")
    };

    // Sab sections ko initially hide kar dena (sirf dashboard chhod kar)
    for (let key in sections) {
        if (sections[key] && key !== "dashboard") {
            sections[key].style.display = "none";
        }
    }

    // Function to show only the clicked section and hide others
    function showSection(sectionKey) {
        for (let key in sections) {
            sections[key].style.display = (key === sectionKey) ? "block" : "none";
        }
    }

    // Event listeners for each sidebar button
    for (let key in links) {
        links[key].addEventListener("click", function (event) {
            event.preventDefault();
            showSection(key);
            history.pushState(null, "", key === "dashboard" ? "index.php" : "#" + key);
        });
    }
});
