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
        <?php if ($role == 'admin'): ?>
          <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody id="listings">
      <?php foreach ($data as $item): ?>
        <tr>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="title">
              <?php echo htmlspecialchars($item['title']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="title" value="<?php echo htmlspecialchars($item['title']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="description">
              <?php echo htmlspecialchars($item['description']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="description" value="<?php echo htmlspecialchars($item['description']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="rent">
              <?php echo htmlspecialchars($item['rent']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="rent" value="<?php echo htmlspecialchars($item['rent']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="address">
              <?php echo htmlspecialchars($item['address']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="address" value="<?php echo htmlspecialchars($item['address']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="rooms">
              <?php echo htmlspecialchars($item['rooms']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="rooms" value="<?php echo htmlspecialchars($item['rooms']); ?>">
          </td>
          <td>
            <span class="view-listing-<?php echo $item['id']; ?>" name="contact_info">
              <?php echo htmlspecialchars($item['contact_info']); ?>
            </span>
            <input class="input-listing-<?php echo $item['id']; ?> hidden" name="contact_info" value="<?php echo htmlspecialchars($item['contact_info']); ?>">
          </td>
          <?php if ($role == 'admin'): ?>
            <td>
              <button class="btn btn-edit btn-edit-<?php echo $item['id']; ?>" data-val="<?php echo $item['id']; ?>">Edit</button>
              <button class="btn btn-save btn-save-<?php echo $item['id']; ?> hidden" data-val="<?php echo $item['id']; ?>">Save</button>
              <button class="btn btn-cancel btn-cancel-<?php echo $item['id']; ?> hidden" onclick="cancelEdit(<?php echo $item['id']; ?>)">Cancel</button>
              <button class="btn btn-delete" onclick="deleteListing(<?php echo $item['id']; ?>)">Delete</button>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php if ($role == 'admin'): ?>
    <script src="<?php echo base_url('/js/listings.js'); ?>"></script>
  <?php endif; ?>
</body>
</html>