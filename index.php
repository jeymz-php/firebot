<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - FIREBOT</title>
    <link rel="icon" href="images/favicon.png" type="images/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">

</head>

<body>
    <?php include 'navbar.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hamburger = document.querySelector(".hamburger");
            const navMenu = document.querySelector(".nav-menu");

            if (!hamburger || !navMenu) return;

            hamburger.addEventListener("click", () => {
                hamburger.classList.toggle("active");
                navMenu.classList.toggle("active");
            });

            document.querySelectorAll(".nav-link").forEach(n =>
                n.addEventListener("click", () => {
                    hamburger.classList.remove("active");
                    navMenu.classList.remove("active");
                })
            );

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 70,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>

    <section class="hero-container">
        <div class="hero">
            <div class="hero-content">
                <h4>Fire Incident Response and Extinguishing BOT</h4>
                <h1 class="hero-title">
                    FireB
                    <span class="logo-inline">
                        <img src="images/logo.png" alt="O Logo">
                    </span>
                    T
                </h1>

                <p>
                    Welcome FireBOT is your intelligent fire incident response and
                    extinguishing robot designed for indoor safety. With heat-resistant
                    materials, multi-sensor detection, rapid mobility, and smart alerts,
                    it provides early fire suppression and protection when you need it most.
                </p>
                <div class="buttons">
                    <a href="#" class="btn-primary">Get Started</a>
                    <a href="#contact-us" class="btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="hero-image">
            <img src="images/prototypev1.png" alt="FireBOT">
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const heroContent = document.querySelector(".hero-content");
            const heroImage = document.querySelector(".hero-image");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        heroContent.classList.add("show");
                        heroImage.classList.add("show");
                    } else {
                        heroContent.classList.remove("show");
                        heroImage.classList.remove("show");
                    }
                });
            }, {
                threshold: 0.3
            });

            const heroSection = document.querySelector(".hero-container");
            if (heroSection) observer.observe(heroSection);
        });
    </script>



    <!-- key features -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Key Features</h2>
            <p class="section-subtitle">
                FireBOT is built with advanced technology to ensure reliable, efficient, and automated fire safety. Each feature is designed to detect, respond, and protect with maximum effectiveness, giving you peace of mind in any environment.
            </p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="icon">
                        <img src="images/magnifying.png" alt="Smart Fire Detection">
                    </div>
                    <h3>Smart Fire Detection</h3>
                    <p>
                        Equipped with a flame sensor, smoke sensor, and LPG gas leak detector for accurate early detection.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="icon">
                        <img src="images/alert.png" alt="Real-Time Alerts">
                    </div>
                    <h3>Real-Time Alerts</h3>
                    <p>
                        Notifies you instantly during fire emergencies for quick awareness.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="icon">
                        <img src="images/camera.png" alt="Camera Monitoring">
                    </div>
                    <h3>Camera Monitoring</h3>
                    <p>
                        Integrated camera module provides live visual feedback, assisting in fire source identification and situational awareness.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="icon">
                        <img src="images/emergency.png" alt="Emergency Alert System">
                    </div>
                    <h3>Emergency Alert System</h3>
                    <p>
                        If the fire grows beyond control, FireBOT automatically sends an alert to the nearest fire station or designated emergency contacts.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cards = document.querySelectorAll(".feature-card");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        cards.forEach((card, i) => {
                            setTimeout(() => {
                                card.classList.add("show");
                            }, i * 200);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            const section = document.querySelector(".features-section");
            if (section) observer.observe(section);
        });
    </script>



    <!-- why choose us -->
    <section class="why-choose-us">
        <div class="why-container">
            <div class="why-choose-us-header">
                <h2>Why Choose Our Product</h2>
                <div class="nav-buttons">
                    <button aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
                    <button aria-label="Next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="why-choose-us-content">
                <div class="features-why">
                    <div class="feature">
                        <p class="feature-number">01</p>
                        <p class="feature-title">Early Fire Detection & Rapid Response</p>
                        <p class="feature-text">FireBOT instantly detects and suppresses fire hazards before they grow out of control.</p>
                    </div>
                    <div class="feature">
                        <p class="feature-number">02</p>
                        <p class="feature-title">Safety in Hard-to-Reach Areas</p>
                        <p class="feature-text">Built to withstand heat, FireBOT navigates narrow and risky spaces where humans can’t easily go.</p>
                    </div>
                    <div class="feature">
                        <p class="feature-number">03</p>
                        <p class="feature-title">Sends Emergency Alerts in Near Fire Stations</p>
                        <p class="feature-text">If the fire is too strong, FireBOT automatically alerts the nearest fire station for backup.</p>
                    </div>
                    <div class="feature">
                        <p class="feature-number">04</p>
                        <p class="feature-title">Comprehensive Multi-Sensor Protection</p>
                        <p class="feature-text">With flame, smoke, gas sensors, and a live camera, FireBOT ensures all-around safety for your home.</p>
                    </div>
                </div>

                <div class="image-box">
                    <div class="image-frame">
                        <img src="images/early-fire-detection.webp" class="active" />
                        <img src="images/a-sign-flammable.webp" />
                        <img src="images/fire-alert.webp" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const images = document.querySelectorAll('.image-frame img');
        const prevBtn = document.querySelector('.nav-buttons button[aria-label="Previous"]');
        const nextBtn = document.querySelector('.nav-buttons button[aria-label="Next"]');

        let currentIndex = 0;

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.toggle('active', i === index);
            });
        }

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const whySection = document.querySelector(".why-choose-us");
            const whyFeatures = document.querySelectorAll(".feature");

            if (!whySection) return;

            const observerWhy = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        whySection.classList.add("show");
                        whyFeatures.forEach((item, i) => {
                            setTimeout(() => item.classList.add("show"), i * 200);
                        });
                    } else {
                        whySection.classList.remove("show");
                        whyFeatures.forEach(item => item.classList.remove("show"));
                    }
                });
            }, {
                threshold: 0.2
            });

            observerWhy.observe(whySection);
        });
    </script>




    <!-- benefits -->
    <section class="benefits">
        <h2>Benefits Of Using Our Product</h2>
        <p class="description">
            <strong>FireBOT</strong> is a smart fire-fighting robot that detects hazards, suppresses fires, and keeps you protected with instant response and real-time alerts.
        </p>
        <div class="b-cards">
            <article class="b-card">
                <div class="b-icon">
                    <img src="images/lightning.png" alt="Lightning Icon">
                </div>
                <h3>Fast Fire Suppression</h3>
                <p>
                    Stop fires before they spread. FireBOT detects and extinguishes hazards instantly, giving you peace of mind every second.
                </p>
            </article>

            <article class="b-card">
                <div class="b-icon">
                    <img src="images/safety.png" alt="Safety Icon">
                </div>
                <h3>Safety Without Risk</h3>
                <p>
                    Keep your loved ones and firefighters out of danger as FireBOT navigates tight, hazardous spaces you can’t reach.
                </p>
            </article>

            <article class="b-card">
                <div class="b-icon">
                    <img src="images/megaphone.png" alt="Megaphone Icon">
                </div>
                <h3>Smart Alerts, Zero Delay</h3>
                <p>
                    Even when you’re away, FireBOT keeps you protected by sending automatic alerts to emergency responders for fast backup.
                </p>
            </article>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const benefitsSection = document.querySelector(".benefits");
            const benefitCards = document.querySelectorAll(".benefits .b-card");

            if (!benefitsSection) return;

            const observerBenefits = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        benefitsSection.classList.add("show");
                        benefitCards.forEach((item, i) => {
                            setTimeout(() => item.classList.add("show"), i * 200);
                        });
                    } else {
                        benefitsSection.classList.remove("show");
                        benefitCards.forEach(item => item.classList.remove("show"));
                    }
                });
            }, {
                threshold: 0.2
            });

            observerBenefits.observe(benefitsSection);
        });
    </script>

    <!-- contact us -->
    <section id="contact-us" class="contact-us">
        <div class="contact-container">
            <h1>Contact Us</h1>
            <hr>
            <form autocomplete="off">
                <div class="left-panel">
                    <div class="contact-logo">
                        <h2>FireB
                            <img src="images/logo1.png" class="logo-w" alt="Fire icon">
                            <span class="logoW-t">T</span>
                        </h2>
                        <div class="contact-info">
                            <div><i class="fas fa-phone-alt"></i><span>+1012 3456 789</span></div>
                            <div><i class="fas fa-envelope"></i><span>demo@gmail.com</span></div>
                            <div><i class="fas fa-map-marker-alt" style="margin-top:3px;"></i><span>132 Batumbakal Street, Diyan lang sa Tabi-Tabi</span></div>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="right-panel">
                    <div>
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" autocomplete="off">
                    </div>
                    <div>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" value="" autocomplete="off">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="off">
                    </div>
                    <div>
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="" autocomplete="off">
                    </div>

                    <div class="span-two">
                        <label class="select">Select Subject?</label>
                        <div class="subject-options">
                            <label><input type="radio" name="subject" value="general1" checked> <span>General Inquiry</span></label>
                            <label><input type="radio" name="subject" value="general2"> <span>General Inquiry</span></label>
                            <label><input type="radio" name="subject" value="general3"> <span>General Inquiry</span></label>
                            <label><input type="radio" name="subject" value="general4"> <span>General Inquiry</span></label>
                        </div>
                    </div>

                    <div class="span-two">
                        <label class="message" for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Write your message.." rows="1"></textarea>
                    </div>

                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const contactSection = document.querySelector(".contact-us");
            const contactPanels = document.querySelectorAll(".contact-us .left-panel, .contact-us .right-panel");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        contactSection.classList.add("show");
                        contactPanels.forEach(panel => panel.classList.add("show"));
                    } else {
                        contactSection.classList.remove("show");
                        contactPanels.forEach(panel => panel.classList.remove("show"));
                    }
                });
            }, {
                threshold: 0.2
            });

            observer.observe(contactSection);
        });
    </script>





    <!-- footer -->
    <footer id="contact_us" class="footer">
        <div class="footer-nav">
            <a href="#">Home</a>
            <a href="#about">About Us</a>
            <img src="images/logo1.png" alt="Logo" class="footer-logo">
            <a href="#">Guide</a>
            <a href="#">Contact Us</a>
        </div>

        <hr class="footer-divider">

        <div class="footer-social">
            <a href="https://www.facebook.com/photo/?fbid=9040457186004104&set=a.125169130866332&__tn__=%3C"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
        </div>

        <div class="footer-bottom">
            <p>©2025 &nbsp; Privacy Terms</p>
        </div>
    </footer>

    <div id="lightbox" class="lightbox">
        <span class="close">&times;</span>
        <button class="lightbox-prev">&#10094;</button>
        <img class="lightbox-img" src="">
        <button class="lightbox-next">&#10095;</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const footer = document.querySelector(".footer");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        footer.classList.add("show");
                    }
                });
            }, {
                threshold: 0.3
            });

            if (footer) observer.observe(footer);
        });
    </script>

</body>

</html>