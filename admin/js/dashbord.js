document.addEventListener("DOMContentLoaded", function () {
    const countryForm = document.getElementById("countryform");
    const stateForm = document.getElementById("stateform");
    const cityForm = document.getElementById("cityform");

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
        showForm("stateform");
    });

    cityBtn.addEventListener("click", function () {
        showForm("cityform");
    });

    // Keep the last opened form visible
    const visibleForm = localStorage.getItem("visibleForm");
    if (visibleForm) {
        document.getElementById(visibleForm).style.display = "block";
    }

    // ✅ AJAX Form Submission (Ensures data is submitted)
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
                        text: "Your data has been saved successfully!",
                        confirmButtonText: "OK"
                    });

                    form.reset(); // ✅ Clear input fields but keep form open
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

            // ✅ Keep the last form open
            localStorage.setItem("visibleForm", form.id);
        });
    }

    // ✅ Ensure all forms submit correctly
    if (countryForm) handleFormSubmission(countryForm, "incs/country.php");
    if (stateForm) handleFormSubmission(stateForm, "incs/state.php");
    if (cityForm) handleFormSubmission(cityForm, "incs/city.php");
});
