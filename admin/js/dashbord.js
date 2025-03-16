document.addEventListener("DOMContentLoaded", function () {
    const countryForm = document.getElementById("countryform");
    const stateForm = document.getElementById("Stateform");
    const cityForm = document.getElementById("CityForm");

    const countryBtn = document.getElementById("countryBtn");
    const stateBtn = document.getElementById("stateBtn");
    const cityBtn = document.getElementById("cityBtn");

    function showForm(formId) {
        countryForm.style.display = "none";
        stateForm.style.display = "none";
        cityForm.style.display = "none";

        document.getElementById(formId).style.display = "block";
        localStorage.setItem("visibleForm", formId);
    }

    countryBtn.addEventListener("click", function () {
        showForm("countryform");
    });

    stateBtn.addEventListener("click", function () {
        showForm("Stateform");
    });

    cityBtn.addEventListener("click", function () {
        showForm("CityForm");
    });

    const visibleForm = localStorage.getItem("visibleForm");
    if (visibleForm) {
        document.getElementById(visibleForm).style.display = "block";
    }

    // AJAX Form Submission
    function handleFormSubmission(form, url) {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent page reload

            let formData = new FormData(form);

            fetch(url, {
                method: "POST",
                body: formData
            })
            .then(response => response.json()) 
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: data.message
                    });

                    form.reset();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: data.message
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "An unexpected error occurred."
                });
            });

            localStorage.setItem("visibleForm", form.id);
        });
    }

    if (countryForm) handleFormSubmission(countryForm, "country.php");
    if (stateForm) handleFormSubmission(stateForm, "state.php");
    if (cityForm) handleFormSubmission(cityForm, "city.php");
});
