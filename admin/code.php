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
    <p>Auto-generate hardware IDs and register new users.</p>
  </div>

  <div class="card">
    <div class="form-container">
      <form id="qrForm">
        <div class="input-group"><i class="fa fa-user"></i><input type="text" name="fullname" placeholder="Full Name" required></div>
        <div class="input-group"><i class="fa fa-envelope"></i><input type="email" name="email" placeholder="Email Address" required></div>
        <div class="input-group"><i class="fa fa-phone"></i><input type="text" name="contact" placeholder="+63 9XX XXX XXXX" required></div>
        <div class="input-group"><i class="fa fa-home"></i><input type="text" name="address" placeholder="Address" required></div>

        <div style="border-top: 1px solid #ddd; padding-top: 15px; margin-top: 10px;">
          <label style="font-size: 12px; color: #888;">Auto-Generated Hardware Info:</label>
          <div class="input-group">
            <i class="fa fa-microchip"></i>
            <input type="text" id="auto_device_id" name="device_id" readonly style="background: #f9f9f9;">
          </div>
          <div class="input-group">
            <i class="fa fa-gears"></i>
            <input type="text" name="device_model" value="ESP32-FireBOT" readonly style="background: #f9f9f9;">
          </div>
        </div>

        <button type="submit" class="btn-generate">Register & Generate QR</button>
      </form>
    </div>

    <div id="qrResult" class="qr-result" style="display:none; flex-direction: column; align-items: center;">
      <h3>Generated QR Code</h3>
      <div id="qrcode"></div>
      <button id="downloadBtn" class="btn-download" style="margin-top:15px;">Download QR Code</button>
    </div>
  </div>
</div>

<script>
// Auto-generate Device ID on Load
window.onload = function() {
    const randomId = Math.floor(1000 + Math.random() * 9000); // 4-digit random
    document.getElementById('auto_device_id').value = "FireBOT-" + randomId;
};

document.getElementById('qrForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);

  fetch('../controls/generate_qr.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'exists') alert(data.message);
    else if (data.status === 'success') {
      const qrContainer = document.getElementById('qrcode');
      qrContainer.innerHTML = '';
      document.getElementById('qrResult').style.display = 'flex';
      new QRCode(qrContainer, { text: data.qrData, width: 200, height: 200 });
      
      document.getElementById('downloadBtn').onclick = function() {
        const qrImg = qrContainer.querySelector('img') || qrContainer.querySelector('canvas');
        const link = document.createElement('a');
        link.href = qrImg.src || qrImg.toDataURL();
        link.download = 'FireBOT_User_QR.png';
        link.click();
      };
    }
  });
});
</script>
</body>
</html>