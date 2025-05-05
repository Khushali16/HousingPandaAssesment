<?php require_once('layouts/header.php'); ?>
<title>All Listings</title>
</head>

<body>
  <?php require_once('layouts/nav.php'); ?>
  <h1>Available Listings</h1>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Rent</th>
        <th>Address</th>
        <th>Rooms</th>
        <th>Contact Info</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="listings">
      <?php foreach ($data as $item): ?>
        <tr>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="title" >
              <?php echo htmlspecialchars($item['title']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="title" value="<?php echo htmlspecialchars($item['title']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="description" >
              <?php echo htmlspecialchars($item['description']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="description" value="<?php echo htmlspecialchars($item['description']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="rent" >
              <?php echo htmlspecialchars($item['rent']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="rent" value="<?php echo htmlspecialchars($item['rent']); ?>">
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="address" >
              <?php echo htmlspecialchars($item['address']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="address" value="<?php echo htmlspecialchars($item['address']); ?>">
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="rooms" >
              <?php echo htmlspecialchars($item['rooms']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="rooms" value="<?php echo htmlspecialchars($item['rooms']); ?>">
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="contact_info" >
              <?php echo htmlspecialchars($item['contact_info']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?>" style="display: none;" name="contact_info" value="<?php echo htmlspecialchars($item['contact_info']); ?>">
          </td>
          <td>
            <button class="btn btn-edit btn-edit-<?php echo $item['id']; ?>" data-val="<?php echo $item['id']; ?>">Edit</button>
            <button class="btn btn-save btn-save-<?php echo $item['id']; ?>" data-val="<?php echo $item['id']; ?>" style="display: none;">Save</button>
            <button class="btn btn-cancel btn-cancel-<?php echo $item['id']; ?>" onclick="cancelEdit(<?php echo $item['id']; ?>)" style="display: none;">Cancel</button>
            <button class="btn btn-delete" onclick="deleteListing(<?php echo $item['id']; ?>)">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
      <!-- Listings will be dynamically inserted here -->
    </tbody>
  </table>
  <script>
    function deleteListing(id) {
      if (confirm('Are you sure you want to delete this listing?')) {
        fetch('<?php echo base_url("delete"); ?>/' + id, {
            method: 'DELETE',
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              alert('Listing deleted successfully.');
              location.reload(); // Reload the page to reflect changes
            } else {
              alert('Failed to delete listing.');
            }
          })
          .catch(error => console.error('Error:', error));
      }
    }
    // Save button functionality
    document.querySelectorAll('.btn-save').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-val');

        // Get original values from <span>
        const originalTitle = document.querySelector('.view-listing-' + id + '[name="title"]').innerText.trim();
        const originalDescription = document.querySelector('.view-listing-' + id + '[name="description"]').innerText.trim();
        const originalRent = document.querySelector('.view-listing-' + id + '[name="rent"]').innerText.trim();
        const originalAddress = document.querySelector('.view-listing-' + id + '[name="address"]').innerText.trim();
        const originalRooms = document.querySelector('.view-listing-' + id + '[name="rooms"]').innerText.trim();
        const originalContact = document.querySelector('.view-listing-' + id + '[name="contact_info"]').innerText.trim();
        // Get new values from <input>
        const title = document.querySelector('.input-listing-' + id + '[name="title"]').value.trim();
        const description = document.querySelector('.input-listing-' + id + '[name="description"]').value.trim();
        const rent = document.querySelector('.input-listing-' + id + '[name="rent"]').value.trim();
        const address = document.querySelector('.input-listing-' + id + '[name="address"]').value.trim();
        const rooms = document.querySelector('.input-listing-' + id + '[name="rooms"]').value.trim();
        const contact_info = document.querySelector('.input-listing-' + id + '[name="contact_info"]').value.trim();

        console.log(originalTitle, originalDescription, originalRent, originalAddress, originalRooms, originalContact);
        console.log(title, description, rent, address, rooms, contact_info);
        // Check if any value actually changed
        if (
          title === originalTitle &&
          description === originalDescription &&
          rent === originalRent &&
          address === originalAddress &&
          rooms === originalRooms &&
          contact_info === originalContact
        ) {
          alert('No changes detected.');
          return;
        }

        const formData = new FormData();
        formData.append('id', id);
        formData.append('title', title);
        formData.append('description', description);
        formData.append('rent', rent);
        formData.append('address', address);
        formData.append('rooms', rooms);
        formData.append('contact_info', contact_info);
        // Send the data to the server using Fetch API
        fetch('<?php echo base_url("update"); ?>', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              alert('Listing updated successfully.');
              location.reload(); // Reload the page to reflect changes
            } else {
              alert('Failed to update listing.');
            }
          })
          .catch(error => console.error('Error:', error));
      });
    });
    // Cancel button functionality
    function cancelEdit(id) {
      // reload the page to reset the form
      location.reload();
    }
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-val');
        const viewElements = document.querySelectorAll('.view-listing-' + id);
        const inputElements = document.querySelectorAll('.input-listing-' + id);

        viewElements.forEach(el => el.style.display = 'none');
        inputElements.forEach(el => el.style.display = 'block');
        title = document.querySelector('.input-listing-' + id + '[name="title"]');
        description = document.querySelector('.input-listing-' + id + '[name="description"]');
        rent = document.querySelector('.input-listing-' + id + '[name="rent"]');
        address = document.querySelector('.input-listing-' + id + '[name="address"]');
        rooms = document.querySelector('.input-listing-' + id + '[name="rooms"]');
        contact_info = document.querySelector('.input-listing-' + id + '[name="contact_info"]');
        title.style.width = '100px';
        description.style.width = '100px';
        address.style.width = '100px';
        rent.style.width = '100px';
        rooms.style.width = '50px';
        contact_info.style.width = '100px';
        inputElements.forEach(el => el.removeAttribute('readonly'));

        const saveButton = document.querySelector('.btn-save-' + id);
        const cancelButton = document.querySelector('.btn-cancel-' + id);
        saveButton.style.display = 'inline-block';
        cancelButton.style.display = 'inline-block';
        // set css for save button and cancel button
        saveButton.style.backgroundColor = 'green';
        cancelButton.style.backgroundColor = 'red';
        // Hide the edit button
        this.style.display = 'none';
      });
    });
  </script>
</body>

</html>