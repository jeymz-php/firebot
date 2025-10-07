<?php
include '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <link rel="stylesheet" href="../styles/admin_navbar.css">
  <link rel="stylesheet" href="../styles/global_admin.css">
  <link rel="stylesheet" href="../styles/messages.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include 'admin_navbar.php'; ?>

<div class="main-content">
  <div class="header">
    <h2>Messages</h2>
  </div>

  <div class="inquiries-container">

    <!-- LEFT: Conversation List -->
    <div class="messages-panel">
      <div class="messages-header">
        <div class="search-wrapper">
          <i class="fa fa-search search-icon"></i>
          <input type="text" placeholder="Search Conversations..." class="search-bar">
        </div>
      </div>

      <div class="messages-list">
        <?php
        $query = "SELECT mt.id, mt.name, mt.subject, MAX(mr.sent_at) AS last_message_time
                  FROM message_threads mt
                  LEFT JOIN message_replies mr ON mt.id = mr.thread_id
                  GROUP BY mt.id
                  ORDER BY last_message_time DESC";

        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
            <div class='message-item' data-id='{$row['id']}'>
              <div class='msg-info'>
                <h4>" . htmlspecialchars($row['name']) . "</h4>
                <p class='snippet'>" . htmlspecialchars($row['subject']) . "</p>
              </div>
              <span class='msg-time'>" . date('M d', strtotime($row['last_message_time'])) . "</span>
            </div>";
          }
        } else {
          echo "<p class='no-messages'>No messages yet.</p>";
        }
        ?>
      </div>
    </div>

    <!-- RIGHT: Chat Window -->
    <div class="chat-panel">
      <div class="chat-header">
        <h3>Select a conversation</h3>
        <p>Messages will appear here</p>
      </div>

      <div class="chat-messages" id="chatMessages">
        <!-- dynamically loaded -->
      </div>

      <div class="chat-input">
        <button class="icon-btn"><i class="fa-solid fa-paperclip"></i></button>
        <button class="icon-btn"><i class="fa-regular fa-image"></i></button>

        <div class="input-wrapper">
          <i class="fa-regular fa-comment chat-icon"></i>
          <input type="text" id="replyMessage" placeholder="Type a message...">
          <button class="icon-btn emoji-btn"><i class="fa-regular fa-face-smile"></i></button>
        </div>

        <button class="send-btn" id="sendReply"><i class="fa-solid fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</div>

<script>
let currentThread = null;

// Load conversation when user clicks
document.querySelectorAll('.message-item').forEach(item => {
  item.addEventListener('click', () => {
    currentThread = item.getAttribute('data-id');

    fetch('../controls/get_conversation.php?id=' + currentThread)
      .then(res => res.json())
      .then(data => {
        const chat = document.getElementById('chatMessages');
        let output = '';
        data.messages.forEach(msg => {
          output += `
            <div class="${msg.sender === 'admin' ? 'admin-msg' : 'user-msg'}">
              <p>${msg.message}</p>
              <span>${msg.time}</span>
            </div>`;
        });

        document.querySelector('.chat-header').innerHTML = `
          <h3>${data.thread.name}</h3>
          <p>${data.thread.email}</p>`;

        chat.innerHTML = output;
        chat.scrollTop = chat.scrollHeight;
      });
  });
});

// Send reply
document.getElementById('sendReply').addEventListener('click', () => {
  const msg = document.getElementById('replyMessage').value.trim();
  if (!msg || !currentThread) return;

  fetch('../controls/send_reply.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'thread_id=' + currentThread + '&message=' + encodeURIComponent(msg)
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      const chat = document.getElementById('chatMessages');
      chat.innerHTML += `
        <div class="admin-msg">
          <p>${msg}</p>
          <span>Just now</span>
        </div>`;
      document.getElementById('replyMessage').value = '';
      chat.scrollTop = chat.scrollHeight;
    }
  });
});
</script>
</body>
</html>
