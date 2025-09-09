<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Generator</title>
  <link rel="stylesheet" href="admin_navbar.css">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="code.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <?php include 'admin_navbar.php'; ?>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h2>QR Code Generator</h2>
    </div>

  <!-- Form -->
  <div class="form-container">
    <form id="qrForm">
      <div class="input-group">
        <i class="fa fa-user"></i>
        <input type="text" name="fullname" placeholder="Full Name" required>
      </div>
      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email Address" required>
      </div>
      <div class="input-group">
        <i class="fa fa-phone"></i>
        <input type="text" name="contact" placeholder="Contact No." required>
      </div>
      <div class="input-group">
        <i class="fa fa-home"></i>
        <input type="text" name="address" placeholder="Address" required>
      </div>

      <!-- Trigger Button (dapat nasa loob ng form) -->
      <button id="generateBtn" class="btn-generate">Generate QR Code</button>
    </form>
  </div>


  <!-- Modal -->
<div class="modal" id="qrModal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <img src="images/qr.png" alt="QR Code" class="qr-image">
    <button class="btn-download">Download QR Code</button>
    <p>Scan this QR code to open the FireBOT App.</p>
  </div>
</div>
s

<script>
const modal = document.getElementById("qrModal");
const btn = document.getElementById("generateBtn");
const closeBtn = document.querySelector(".close-btn");

btn.addEventListener("click", function(e) {
  e.preventDefault();
  modal.classList.add("show");
});

closeBtn.addEventListener("click", function() {
  modal.classList.remove("show");
});

window.addEventListener("click", function(e) {
  if (e.target === modal) {
    modal.classList.remove("show");
  }
});
</script>

</body>
</html>
</body>
</html>
