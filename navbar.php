
<!-- Sticky Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="index.php" class="logo">
                FireB
                <img src="images/logo.png" alt="O Logo" class="logo-o">
                    <span class="logo-t">T</span>
            </a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php echo ($active_page == 'index.php') ? 'active' : ''; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a href="about_us.php" class="nav-link <?php echo ($active_page == 'about_us.php') ? 'active' : ''; ?>">About Us</a>
            </li>
            <li class="nav-item">
                <a href="guide_page.php" class="nav-link <?php echo ($active_page == 'guide.php') ? 'active' : ''; ?>">Guide</a>
            </li>
            <li class="nav-item">
                <a href="index.php#contact-us" class="nav-link <?php echo ($active_page == 'contact-us.php') ? 'active' : ''; ?>">Contact Us</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
