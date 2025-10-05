<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png" type="images/png">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin_navbar.css">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <?php include 'admin_navbar.php'; ?>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h2>Admin Dashboard</h2>
    </div>

    <div class="cards">
      <div class="card">
        <i class="fa-solid fa-robot card-icon"></i>
        <div class="card-info">
          <p>Robots Deployed</p>
          <h3>0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-user card-icon"></i>
        <div class="card-info">
          <p>Total Users</p>
          <h3>0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-fire-extinguisher card-icon"></i>
        <div class="card-info">
          <p>Fire Incidents</p>
          <h3>0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-envelope-open-text card-icon"></i>
        <div class="card-info">
          <p>Unread Messages</p>
          <h3>0</h3>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
