<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <link rel="stylesheet" href="admin_navbar.css">
  <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="messages.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <?php include 'admin_navbar.php'; ?>

   <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h2>Messages</h2>
    </div>  

<div class="inquiries-container">
  
  <!-- Left: Conversations -->
  <div class="messages-panel">
    <div class="messages-header">
      <div class="search-wrapper">
        <i class="fa fa-search search-icon"></i>
        <input type="text" placeholder="Search People..." class="search-bar">
      </div>
    </div>
    <!-- intentionally empty (no convos) -->
  </div>

<!-- Right: Chat Window -->
<div class="chat-panel">
  <div class="chat-messages">
    <!-- intentionally empty -->
  </div>
<div class="chat-input">
  <!-- Left icons -->
  <button class="icon-btn"><i class="fa-solid fa-paperclip"></i></button>
  <button class="icon-btn"><i class="fa-regular fa-image"></i></button>

  <!-- Input field with icons -->
  <div class="input-wrapper">
    <i class="fa-regular fa-comment chat-icon"></i> <!-- chat/message icon -->
    <input type="text" placeholder="Type a message...">
    <button class="icon-btn emoji-btn"><i class="fa-regular fa-face-smile"></i></button>
  </div>

  <!-- Send button -->
  <button class="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
</div>



</div> <!-- ✅ Ito lang closing ng inquiries-container -->

</body>
</html>
</body>
</html>