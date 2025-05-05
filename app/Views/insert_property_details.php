<?php require_once('layouts/header.php'); ?>
  <title>Submit Listing</title>
</head>
<body>
  <?php require_once('layouts/nav.php'); ?>
  <h1>Submit a New Listing</h1>

  <?php if (isset($message)): ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars($message); ?>
    </div>
  <?php endif; ?>

  <form id="listingForm" method="POST" action="/">
    <label for="title">Title</label>
    <input name="title" placeholder="Title" required />
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" required></textarea>
    <label for="rent">Rent</label>
    <input name="rent" type="number" placeholder="Rent" required />
    <label for="address">Address</label>
    <input name="address" placeholder="Address" required />
    <label for="rooms">Number of Rooms</label>
    <input name="rooms" type="number" placeholder="Number of Rooms" required />
    <label for="contact_info">Contact Info</label>
    <input name="contact_info" placeholder="Contact Info" required />
    <button type="submit">Submit</button>
  </form>
</body>
</html>