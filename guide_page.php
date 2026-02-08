<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started</title>
    <link rel="icon" href="images/favicon.png" type="images/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/guide_page.css">
</head>
<body>

  <?php include 'navbar.php'; ?>

<!-- GET STARTED -->
<section id="guide" class="guide-section">
    <div class="guide-container">
        <h1>Get Started</h1>
        <p>
          FireBOT is more than just a machine it's your reliable partner in fire safety. 
          With sensors, mobility, and automated extinguishing power, FireBOT ensures that 
          when danger strikes, you're always prepared.
        </p>
        <div class="guide-image">
            <img src="images/prototype.png" alt="FireBOT">
        </div>
    </div>
</section>

<section class="inquiry-section">
  <h2>Inquiry Process</h2>
  <div class="inquiry-grid">
    <div class="inquiry-box">
      <span class="circle">1</span>
      <p>The user sends an inquiry through the Contact Us form.</p>
    </div>
    <div class="inquiry-box">
      <span class="circle">2</span>
      <p>The system records the inquiry and notifies the administrator.</p>
    </div>
    <div class="inquiry-box">
      <span class="circle">3</span>
      <p>The user waits for confirmation from the admin.</p>
    </div>
    <div class="inquiry-box">
      <span class="circle">4</span>
      <p>The admin responds via email to discuss the details.</p>
    </div>
    <div class="inquiry-box">
      <span class="circle">5</span>
      <p>Further communication is done through email to finalize the transaction.</p>
    </div>
    <div class="inquiry-box">
      <span class="circle">6</span>
      <p>The user receives the unit, along with a unique QR code assigned to it.</p>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-it-works">
    <h2>How It Works</h2>
    
    <div class="steps-indicator">
        <div class="step-circle active" data-step="1">1</div>
        <div class="step-circle" data-step="2">2</div>
        <div class="step-circle" data-step="3">3</div>
    </div>
    
    <div class="how-card">
        <!-- Container for step content -->
        <div class="how-content-container">
            <!-- Step 1 Content -->
            <div class="how-content step-content active" id="step-1">
                <div class="how-text">
                    <h3>Step 1: Download the app</h3>
                    <p>
                        Get the application from the App Store or Google Play Store to your mobile device. This app will serve as your main tool for accessing the service.
                    </p>
                </div>
                <div class="how-image">
                    <img src="images/guide1.png" alt="Step 1 Video Thumbnail">
                </div>
            </div>
            
            <!-- Step 2 Content -->
            <div class="how-content step-content" id="step-2">
                <div class="how-text">
                    <h3>Step 2: Open and Scan the QR Code</h3>
                    <p>
                       Launch the app and scan the QR code provided to you. This links your device to the service securely, allowing personalized access.
                    </p>
                </div>
                <div class="how-image">
                    <img src="images/guide2.png" alt="Step 2 - Control Dashboard">
                </div>
            </div>
            
            <!-- Step 3 Content -->
            <div class="how-content step-content" id="step-3">
                <div class="how-text">
                    <h3>Step 3: Start Using It!</h3>
                    <p>
                       Launch the app and scan the QR code provided to you. This links your device to the service securely, allowing personalized access.
                    </p>
                </div>
                <div class="how-image">
                    <img src="images/guide3.png" alt="Step 3 - Emergency Response">
                </div>
            </div>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="step-navigation">
            <button class="nav-btn prev-btn" id="prev-btn" disabled>
                <i class="fas fa-chevron-left"></i> Previous
            </button>
            
            <div class="step-counter">
                <span id="current-step">1</span> / <span id="total-steps">3</span>
            </div>
            
            <button class="nav-btn next-btn" id="next-btn">
                Next <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const stepContents = document.querySelectorAll('.step-content');
    const stepCircles = document.querySelectorAll('.step-circle');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const currentStepElement = document.getElementById('current-step');
    const totalStepsElement = document.getElementById('total-steps');
    
    // Set total steps
    totalStepsElement.textContent = stepContents.length;
    
    let currentStep = 1;
    
    // Update UI based on current step
    function updateUI() {
        // Update active step content
        stepContents.forEach(content => {
            content.classList.remove('active');
        });
        document.getElementById(`step-${currentStep}`).classList.add('active');
        
        // Update step circles
        stepCircles.forEach(circle => {
            const stepNumber = parseInt(circle.getAttribute('data-step'));
            circle.classList.remove('active', 'completed');
            
            if (stepNumber === currentStep) {
                circle.classList.add('active');
            } else if (stepNumber < currentStep) {
                circle.classList.add('completed');
            }
        });
        
        // Update step counter
        currentStepElement.textContent = currentStep;
        
        // Update button states
        prevBtn.disabled = currentStep === 1;
        nextBtn.disabled = currentStep === stepContents.length;
        
        // Update button text for last step
        if (currentStep === stepContents.length) {
            nextBtn.innerHTML = 'Finish <i class="fas fa-check"></i>';
        } else {
            nextBtn.innerHTML = 'Next <i class="fas fa-chevron-right"></i>';
        }
    }
    
    // Next button click
    nextBtn.addEventListener('click', function() {
        if (currentStep < stepContents.length) {
            currentStep++;
            updateUI();
        } else {
            // If on last step and clicked "Finish"
            alert('Congratulations! You have completed all steps.');
        }
    });
    
    // Previous button click
    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
        }
    });
    
    // Step circle click
    stepCircles.forEach(circle => {
        circle.addEventListener('click', function() {
            const stepNumber = parseInt(this.getAttribute('data-step'));
            if (stepNumber !== currentStep) {
                currentStep = stepNumber;
                updateUI();
            }
        });
    });
    
    // Initialize
    updateUI();
    
    // Keyboard navigation
    document.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowRight' || event.key === ' ') {
            if (currentStep < stepContents.length) {
                currentStep++;
                updateUI();
            }
        } else if (event.key === 'ArrowLeft') {
            if (currentStep > 1) {
                currentStep--;
                updateUI();
            }
        }
    });
});
</script>

<!-- FOOTER -->
<footer id="contact_us" class="footer">
      <div class="footer-nav">
        <a href="index.php">Home</a>
        <a href="about_us.php">About Us</a>
        <img src="images/logo1.png" alt="Logo" class="footer-logo">
        <a href="guide_page.php">Guide</a>
        <a href="index.php#contact-us">Contact Us</a>
    </div>  
  <hr class="footer-divider">

  <div class="footer-social">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fas fa-envelope"></i></a>
  </div>

  <div class="footer-bottom">
    <p>©2025 &nbsp; Privacy Terms</p>
  </div>
</footer>

</body>
</html>