<!-- Burger icon -->
<div class="burger">
  <i class="fa-solid fa-bars"></i>
</div>

<div class="sidebar">
  <!-- Logo + Title -->
  <div class="sidebar-header">
    <a href="admin.php" class="sidebar-link">
      <img src="images/logo1.png" alt="FireBOT Logo" class="logo-img">
      <h2>FireBOT</h2>
    </a>
  </div>
</div>


  <!-- Menu -->
  <ul class="nav-links">
    <li class="nav-item active">
      <a href="admin.php"><i class="fa-solid fa-table-cells-large"></i><span>Dashboard</span></a>
      <hr>
    </li>
    <li class="nav-item">
      <a href="users.php"><i class="fa-solid fa-users"></i><span>Users</span></a>
      <hr>
    </li>
    <li class="nav-item">
      <a href="messages.php"><i class="fa-solid fa-message"></i><span>Messages</span></a>
      <hr>
    </li>
    <li class="nav-item">
      <a href="code.php"><i class="fa-solid fa-qrcode"></i><span>QR Codes</span></a>
      <hr>
    </li>
  </ul>

  <!-- Footer -->
  <div class="sidebar-footer">
    <i class="fa-solid fa-user"></i>
    <span>Admin</span>
  </div>
</div>

<script>
  const burger = document.querySelector('.burger');
  const sidebar = document.querySelector('.sidebar');

  burger.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    burger.classList.toggle('active');
  });
</script>
