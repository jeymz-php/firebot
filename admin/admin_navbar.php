<?php
// ✅ Ensure session is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Example session data (remove this once real login sets it)
$_SESSION['username'] = $_SESSION['username'] ?? 'admin';
$_SESSION['email'] = $_SESSION['email'] ?? 'admin@example.com';
$_SESSION['last_login'] = $_SESSION['last_login'] ?? date("F d, Y");
?>

<!-- Burger icon -->
<div class="burger">
  <i class="fa-solid fa-bars"></i>
</div>

<div class="sidebar">
  <!-- Logo + Title -->
  <div class="sidebar-header">
    <a href="admin_dashboard.php" class="sidebar-link">
      <img src="../images/logo1.png" alt="FireBOT Logo" class="logo-img">
      <h2>FireBOT</h2>
    </a>
  </div>

  <!-- Menu -->
  <ul class="nav-links">
    <li class="nav-item active">
      <a href="index.php"><i class="fa-solid fa-table-cells-large"></i><span>Dashboard</span></a>
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

  <!-- Admin dropdown -->
  <div class="sidebar-footer" id="adminDropdown">
    <div class="admin-info">
      <i class="fa-solid fa-user"></i>
      <span><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin'); ?></span>
      <i class="fa-solid fa-caret-up caret"></i>
    </div>

    <div class="dropdown-menu" id="dropdownMenu">
      <a href="#" class="profile-btn"><i class="fa-solid fa-id-card"></i> Profile</a>
      <hr>
      <a href="../auth/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
  </div>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="profile-header">
      <i class="fa-solid fa-user-circle"></i>
      <h2>Admin Profile</h2>
    </div>
      <div class="profile-details">
        <p><strong>Username:</strong> <?= htmlspecialchars($_SESSION['admin_name'] ?? 'N/A') ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['admin_email'] ?? 'N/A') ?></p>
        <p><strong>Role:</strong> Administrator</p>
        <p><strong>Last Login:</strong> <?= htmlspecialchars($_SESSION['last_login'] ?? 'N/A') ?></p>
      </div>
    <div class="modal-footer">
      <button class="close-modal-btn">Close</button>
    </div>
  </div>
</div>

<!-- JS -->
<script>
  const burger = document.querySelector('.burger');
  const sidebar = document.querySelector('.sidebar');
  const adminDropdown = document.getElementById('adminDropdown');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const caret = adminDropdown.querySelector('.caret');

  // Toggle sidebar
  burger.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    burger.classList.toggle('active');
  });

  // Toggle admin dropdown with animation
  adminDropdown.addEventListener('click', (e) => {
    dropdownMenu.classList.toggle('show');
    caret.classList.toggle('fa-caret-down');
    caret.classList.toggle('fa-caret-up');
    e.stopPropagation();
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!adminDropdown.contains(e.target)) {
      dropdownMenu.classList.remove('show');
      caret.classList.add('fa-caret-up');
      caret.classList.remove('fa-caret-down');
    }
  });

  // Profile modal
  const profileBtn = document.querySelector('.profile-btn');
  const profileModal = document.getElementById('profileModal');
  const closeBtn = document.querySelector('.close-btn');
  const closeModalBtn = document.querySelector('.close-modal-btn');

  // Open modal
  profileBtn.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    profileModal.style.display = 'flex';
  });

  // Close modal (X)
  closeBtn.addEventListener('click', () => {
    profileModal.style.display = 'none';
  });

  // Close modal (button)
  closeModalBtn.addEventListener('click', () => {
    profileModal.style.display = 'none';
  });

  // Click outside closes modal
  window.addEventListener('click', (e) => {
    if (e.target === profileModal) {
      profileModal.style.display = 'none';
    }
  });
</script>