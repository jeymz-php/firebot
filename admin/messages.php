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
  <style>
    /* Chat bubble styles */
    .message {
      padding: 10px 15px;
      margin: 8px 0;
      border-radius: 18px;
      font-size: 14px;
      max-width: 70%;
      line-height: 1.4;
      word-wrap: break-word;
      position: relative;
    }

    .outgoing {
      align-self: flex-end;
      background: #8E1616;
      color: #fff;
      border-bottom-right-radius: 4px;
    }

    .incoming {
      align-self: flex-start;
      background: #eaeaea;
      color: #111;
      border-bottom-left-radius: 4px;
    }

    .message small {
      display: block;
      font-size: 11px;
      color: #666;
      margin-top: 4px;
      text-align: right;
    }

    .chat-messages {
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      padding: 15px;
      background: #fafafa;
      height: 100%;
    }
  </style>
</head>
<body>

  <?php include 'admin_navbar.php'; ?>

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
        <!-- Future list of users/conversations -->
        <div class="conversation-list" style="padding: 10px; color: #666; text-align:center;">
          <p><i>No recent conversations</i></p>
        </div>
      </div>

      <!-- Right: Chat Window -->
      <div class="chat-panel">
        <div class="chat-messages">
          <!-- messages will load here -->
        </div>

        <div class="chat-input">
          <!-- Left icons -->
          <button class="icon-btn"><i class="fa-solid fa-paperclip"></i></button>
          <button class="icon-btn"><i class="fa-regular fa-image"></i></button>

          <!-- Input field with icons -->
          <div class="input-wrapper">
            <i class="fa-regular fa-comment chat-icon"></i>
            <input type="text" id="messageInput" placeholder="Type a message...">
            <button class="icon-btn emoji-btn"><i class="fa-regular fa-face-smile"></i></button>
          </div>

          <!-- Send button -->
          <button class="send-btn" id="sendBtn"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Replace with actual logged-in admin (via PHP session if available)
    const sender = "admin";     
    const receiver = "mobile";  // temporary target for demo

    const chatMessages = document.querySelector(".chat-messages");
    const messageInput = document.getElementById("messageInput");
    const sendBtn = document.getElementById("sendBtn");

    // Load messages
    function loadMessages() {
      fetch(`../api/get_messages.php?sender=${sender}&receiver=${receiver}`)
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            chatMessages.innerHTML = "";
            data.data.forEach(msg => {
              const div = document.createElement("div");
              div.classList.add("message", msg.sender === sender ? "outgoing" : "incoming");
              div.innerHTML = `
                ${msg.message}
                <small>${new Date(msg.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</small>
              `;
              chatMessages.appendChild(div);
            });
            chatMessages.scrollTop = chatMessages.scrollHeight;
          }
        })
        .catch(err => console.error("Error loading messages:", err));
    }

    // Send message
    sendBtn.addEventListener("click", () => {
      const msg = messageInput.value.trim();
      if (!msg) return;

      fetch("../api/send_message.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          sender_type: "admin",   // ✅ Added line
          sender,
          receiver,
          message: msg
        })
      })
      .then(res => res.json())
      .then(response => {
        console.log("Send response:", response);
        if (response.status === "success") {
          messageInput.value = "";
          loadMessages();
        } else {
          alert("Failed: " + response.message);
        }
      })
      .catch(err => alert("Network error: " + err));
    });

    // Send by pressing Enter
    messageInput.addEventListener("keydown", e => {
      if (e.key === "Enter") {
        e.preventDefault();
        sendBtn.click();
      }
    });

    // Refresh every 3 seconds
    setInterval(loadMessages, 3000);
    loadMessages();
  </script>

</body>
</html>
