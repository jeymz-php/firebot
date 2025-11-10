<?php 
include 'admin_navbar.php'; 
require_once '../config/config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Generator | FireBOT Admin</title>

  <link rel="stylesheet" href="../styles/global_admin.css">
  <link rel="stylesheet" href="../styles/admin_navbar.css">
  <link rel="stylesheet" href="../styles/code.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>

<div class="main-content">
  <div class="header">
    <h2>QR Code Generator</h2>
    <p>Create and register new users for FireBOT access.</p>
  </div>

  <div class="card">
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
          <input type="text" name="contact" placeholder="+63 9XX XXX XXXX" required>
        </div>
        <div class="input-group">
          <i class="fa fa-home"></i>
          <input type="text" name="address" placeholder="Address" required>
        </div>

        <button type="submit" class="btn-generate">Create QR Code</button>
      </form>
    </div>

    <div id="qrResult" class="qr-result" style="display:none;">
      <h3>Generated QR Code</h3>
      <div id="qrcode"></div>
      <button id="downloadBtn" class="btn-download">Download QR Code</button>
    </div>
  </div>
</div>

<script>
document.getElementById('qrForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('../controls/generate_qr.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'exists') {
      alert('Email already exists!');
    } else if (data.status === 'error') {
      alert('Error: ' + data.message);
    } else if (data.status === 'success') {
      const qrContainer = document.getElementById('qrcode');
      qrContainer.innerHTML = '';
      document.getElementById('qrResult').style.display = 'flex';

      new QRCode(qrContainer, {
        text: data.qrData,
        width: 200,
        height: 200
      });

      const downloadBtn = document.getElementById('downloadBtn');
      downloadBtn.onclick = function() {
        const qrImg = qrContainer.querySelector('img') || qrContainer.querySelector('canvas');
        const link = document.createElement('a');
        link.href = qrImg.src || qrImg.toDataURL();
        link.download = data.filename || 'user_qr.png';
        link.click();
      };
    }
  })
  .catch(err => alert('Network error: ' + err));
});
</script>

</body>
</html>