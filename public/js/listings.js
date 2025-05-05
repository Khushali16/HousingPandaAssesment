// Delete Listing
base_url = document
  .querySelector('meta[name="base-url"]')
  .getAttribute("content");
function deleteListing(id) {
  if (confirm("Are you sure you want to delete this listing?")) {
    fetch(`${base_url}delete/${id}`, {
      method: "DELETE", // Ensure the method matches your route
      headers: {
        "Content-Type": "application/json",
        //   'X-CSRF-TOKEN': csrf_token // Add CSRF token if applicable
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.status === "success") {
          alert("Listing deleted successfully.");
          location.reload();
        } else {
          alert("Failed to delete listing.");
        }
      })
      .catch((error) => console.error("Error:", error));
  }
}

// Save Listing
document.querySelectorAll(".btn-save").forEach((button) => {
  button.addEventListener("click", function () {
    const id = this.getAttribute("data-val");
    const formData = new FormData();
    formData.append("id", id); // Append the ID to the form data
    // Collect input values
    document.querySelectorAll(`.input-listing-${id}`).forEach((input) => {
      console.log(input.name, input.value.trim());
      formData.append(input.name, input.value.trim());
    });

    fetch(`${base_url}update`, {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.status === "success") {
          alert("Listing updated successfully.");
          location.reload();
        } else {
          alert("Failed to update listing.");
        }
      })
      .catch((error) => console.error("Error:", error));
  });
});

// Edit Listing
document.querySelectorAll(".btn-edit").forEach((button) => {
  button.addEventListener("click", function () {
    const id = this.getAttribute("data-val");
    const viewElements = document.querySelectorAll(`.view-listing-${id}`);
    const inputElements = document.querySelectorAll(`.input-listing-${id}`);

    viewElements.forEach((el) => el.classList.add("hidden"));
    inputElements.forEach((el) => el.classList.remove("hidden"));

    document.querySelector(`.btn-edit-${id}`).classList.add("hidden");
    document.querySelector(`.btn-save-${id}`).classList.remove("hidden");
    document.querySelector(`.btn-cancel-${id}`).classList.remove("hidden");
  });
});

// Cancel Edit
function cancelEdit(id) {
    // Hide input fields and show view elements
    const viewElements = document.querySelectorAll(`.view-listing-${id}`);
    const inputElements = document.querySelectorAll(`.input-listing-${id}`);
    viewElements.forEach((el) => el.classList.remove("hidden"));
    inputElements.forEach((el) => el.classList.add("hidden"));
    // Hide the save and cancel buttons and show the edit button
    document.querySelector(`.btn-edit-${id}`).classList.remove("hidden");
    document.querySelector(`.btn-save-${id}`).classList.add("hidden");
    document.querySelector(`.btn-cancel-${id}`).classList.add("hidden");
}
