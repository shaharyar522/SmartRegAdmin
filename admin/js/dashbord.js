document.addEventListener("DOMContentLoaded", function () {
  const countryBtn = document.getElementById("countryBtn");
  const newsBtn = document.getElementById("newsBtn");
  const marqueeBtn = document.getElementById("marqueeBtn");

  countryBtn.addEventListener("click", () => showForm("countryform"));
  newsBtn.addEventListener("click", () => showForm("Stateform"));
  marqueeBtn.addEventListener("click", () => showForm("CityForm"));

  function showForm(formId) {
    localStorage.setItem("activeForm", formId); // Store active form
    document.getElementById("countryform").style.display = "none";
    document.getElementById("Stateform").style.display = "none";
    document.getElementById("CityForm").style.display = "none";

    document.getElementById(formId).style.display = "block";
  }

  // Keep form visible after reload
  const savedForm = localStorage.getItem("activeForm");
  if (savedForm) {
    showForm(savedForm);
  }

  // Handle form submission using AJAX
  document.querySelectorAll("form").forEach((form) => {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      const actionUrl = this.getAttribute("action");

      fetch(actionUrl, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          Swal.fire({
            icon: "success",
            title: "Success!",
            text: "Your data has been submitted successfully.",
          });

          // Refresh the table after submission
          updateTable();
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Failed to submit data.",
          });
        });
    });
  });

  // Function to refresh table after submission
  function updateTable() {
    fetch("incs/get_country_list.php") // Create this PHP script to return the updated list
      .then((response) => response.text())
      .then((html) => {
        document.querySelector("table tbody").innerHTML = html;
      });
  }
});
