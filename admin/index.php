<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login | Firebot</title>
  <link rel="stylesheet" href="../styles/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container login-container">
      <form id="loginForm">
        <h2 class="form-title">Admin Login</h2>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Email Address" required />
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <button type="submit" class="submit-btn">Login</button>
        <div class="form-footer">
          <p>Don’t have an account? <a href="#" id="switchToSignup">Sign up</a></p>
        </div>
      </form>
    </div>

    <div class="form-container signup-container">
      <form id="signupForm">
        <h2 class="form-title">Create Account</h2>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="full_name" placeholder="Full Name" required />
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Email Address" required />
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <button type="submit" class="submit-btn">Sign Up</button>
        <div class="form-footer">
          <p>Already have an account? <a href="#" id="switchToLogin">Login</a></p>
        </div>
      </form>
    </div>

    <div class="welcome-container">
      <div class="logo-container">
        <img src="../images/logo1.png" alt="Firebot Logo" onerror="this.style.display='none'">
      </div>
      <div class="welcome-text">
        <h2>Welcome to Firebot Admin</h2>
        <p>Login or sign up to manage your dashboard and control firebots efficiently.</p>
      </div>
      <div class="decoration-circle circle-1"></div>
      <div class="decoration-circle circle-2"></div>
    </div>
  </div>

  <script>
    const container = document.getElementById("container");
    $("#switchToSignup").click(function(e) {
      e.preventDefault();
      container.classList.add("active");
    });
    $("#switchToLogin").click(function(e) {
      e.preventDefault();
      container.classList.remove("active");
    });

    // ✅ Signup
    $("#signupForm").submit(function(e) {
      e.preventDefault();
      $.post("../auth/signup.php", $(this).serialize(), function(res) {
        Swal.fire(res.title, res.message, res.icon);
        if (res.icon === "success") {
          $("#signupForm")[0].reset();
          container.classList.remove("active");
        }
      }, "json");
    });

    // ✅ Login
    $("#loginForm").submit(function(e) {
      e.preventDefault();
      $.post("../auth/login.php", $(this).serialize(), function(res) {
        Swal.fire(res.title, res.message, res.icon);
        if (res.icon === "success") {
          setTimeout(() => (window.location = "admin_dashboard.php"), 1500);
        }
      }, "json");
    });
  </script>
</body>

</html>