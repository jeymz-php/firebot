<?php
session_set_cookie_params(['path' => '/']); // makes session cookie global
session_start();

if (!isset($_SESSION['admin_id'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.png" type="images/png">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../styles/admin_navbar.css">
  <link rel="stylesheet" href="../styles/global_admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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
          <h3 id="robotsDeployed">0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-user card-icon"></i>
        <div class="card-info">
          <p>Total Users</p>
          <h3 id="totalUsers">0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-fire-extinguisher card-icon"></i>
        <div class="card-info">
          <p>Fire Incidents</p>
          <h3 id="fireIncidents">0</h3>
        </div>
      </div>
      <div class="card">
        <i class="fa-solid fa-envelope-open-text card-icon"></i>
        <div class="card-info">
          <p>Unread Messages</p>
          <h3 id="unreadMessages">0</h3>
        </div>
      </div>
    </div>

      <div class="map-section">
          <h3>Monitoring Map</h3>
         <div id="map" class="map-box">
          <div id="mapLoader" class="loader">Loading map data...</div>
         </div>
      </div>

      <div class="logs-section">
         <h3>Robot Logs</h3>
         <div class="log-filters">
            <a href="#robotLogs" class="filter active">All</a> |
            <a href="#" class="filter">Emergency</a> |
           <a href="#" class="filter">Resolved</a>
         </div>
            <div id="robotLogs" class="log-list">
              <div id="logLoader" class="loader">Loading logs...</div>
         </div>
             <div class="see-all">
                <button id="seeAllBtn">See All</button>
            </div>
      </div>
  </div>
<script src="../script/admin_dashboard.js"></script>
</body>
</html>
