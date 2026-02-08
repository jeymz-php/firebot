<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="images/favicon.png" type="images/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles/about_us.css">
    <link rel="stylesheet" href="styles/navbar.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<!-- About Us Section -->
<section id="about" class="about-section">
    <div class="parallax-bg"></div>
    <div class="about-container">
        <h1>About Us</h1>
        <p>FireBOT is committed to innovating smart fire safety solutions that
           protect lives and property with speed, reliability, and advanced
           technology.</p>
    </div>
</section>

    <!-- Who we are Section -->

<section id="who-we-are" class="section">
    <div class="container">
        <div class="text">
            <h2>Who We Are</h2>
            <p>We are a team of innovators and researchers committed to advancing fire safety through smart technology. Our project, the Sensor-Based Automated Mobile Fire Extinguisher System with Smoke Alarm Functionality, was developed to provide an active solution against fire hazards—moving beyond traditional detectors that only alert without acting.</p>
            <p>Our system combines flame, smoke, and gas sensors with an automated mobile robot that can navigate narrow or obstructed spaces, locate fire sources, and suppress them effectively. Equipped with a camera module for real-time monitoring and an alert system that contacts emergency responders if needed, the robot serves as a reliable first responder in residential environments.</p>
        </div>

     <!-- Image Slider -->
        <div class="image slider">
            <div class="slides">
                <img src="images/kami.png" alt="kami" class="about-img active">
                <img src="images/1.png" alt="1" class="about-img">
                <img src="images/55.jpg" alt="2" class="about-img">
                
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
    </div>
</section>

    <!-- Our Mission Section -->
<section id="mission">
  <h2>Our Mission</h2>
  <p>Our mission is for creating a reliable, and accessible fire safety solution that reduces risks in homes and confined spaces by combining detection, suppression, and alert functions in one automated system.</p>
  
  <div class="mission-grid">
    <div class="mission-card">
      <div class="icon-box">
        <img src="images/sensor.png" alt="Robot Icon">
      </div>
      <p>Develop an <span>automated firefighting robot</span> that can detect flames, smoke, and gas leaks.</p>
    </div>
    
    <div class="mission-card">
      <div class="icon-box">
        <img src="images/ext.png" alt="Extinguisher Icon">
      </div>
      <p>Provide <span>early fire suppression</span> to reduce risks to life and property.</p>
    </div>
    
    <div class="mission-card">
      <div class="icon-box">
        <img src="images/system.png" alt="Monitor Icon">
      </div>
      <p>Integrate <span>alert and monitoring systems</span> for faster emergency response.</p>
    </div>
    
    <div class="mission-card">
      <div class="icon-box">
        <img src="images/shield.png" alt="Shield Icon">
      </div>
      <p>Design a <span>practical and reliable safety solution</span> for residential use.</p>
    </div>
  </div>
</section>


    <!-- Our Vision Section -->
    <section id="vision" class="section">
        <div class="container">
            <h2>Our Vision</h2>
            <p>To lead in the development of affordable, reliable, and scalable fire safety technologies that transform how communities protect themselves against fire hazards.</p>
        </div>
    </section>

<section class="our-values">
    <!-- LEFT SIDE -->
  <div class="values-left">
    <h2 class="values-heading">Our Values</h2>
    <p>
      Our values reflect the principles that guide the development of our automated firefighting system.
      They serve as the foundation of our commitment to building technology that not only solves problems
      but also protects lives and property.
    </p>
  </div>

    <!-- RIGHT SIDE -->
  <div class="values-right">
    <div class="accordion">
     <div class="accordion-item">
  <button class="accordion-header">
    <strong>Innovations</strong> <span class="icon">+</span>
  </button>
  <div class="accordion-body">
    We embrace creativity and technology to design smart solutions for real-world fire safety challenges.
  </div>
</div>

      <div class="accordion-item">
        <button class="accordion-header">
          <strong>Protection</strong> <span class="icon">+</span>
        </button>
        <div class="accordion-body">
          We prioritize saving lives and safeguarding property with every innovation we create.
        </div>
      </div>

      <div class="accordion-item">
        <button class="accordion-header">
          <strong>Reliability</strong> <span class="icon">+</span>
        </button>
        <div class="accordion-body">
          Our systems are built to perform consistently in the most critical situations.
        </div>
      </div>

      <div class="accordion-item">
        <button class="accordion-header">
          <strong>Collaboration</strong> <span class="icon">+</span>
        </button>
        <div class="accordion-body">
          We work closely with communities and experts to develop effective firefighting solutions.
        </div>
      </div>
    </div>
  </div>
</section>

   <!-- Our Partners Section -->
<section id="partners" class="partners-section">
  <h2>Our Partners</h2>
  <div class="partners-slider">
    <div class="partners-track">
      <div class="partner-item">
        <div class="partner-logo"><img src="images/00.jpg" alt="Company 1"></div>
        Company Name  
      </div>
      <div class="partner-item">
        <div class="partner-logo"><img src="images/00.jpg" alt="Company 2"></div>
        Company Name  
      </div>
      <div class="partner-item">
        <div class="partner-logo"><img src="images/00.jpg" alt="Company 3"></div>
        Company Name  
      </div>
    </div>
  </div>
</section>

    <!-- Our Team Section -->

<section class="our-team">
  <h2 class="team-heading">Meet Our Team</h2>

  <div class="team-grid">
    <div class="team-card">
      <div class="team-img">
        <img src="images/beans.png" alt="Team Member">
      </div>
      <h3>Vince Iverson Baena</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/peyt.png" alt="Team Member">
      </div>
      <h3>Faith Keisha Caballero</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/wena.png" alt="Team Member">
      </div>
      <h3>Arwena Competente</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/llorca.png" alt="Team Member">
      </div>
      <h3>Bernadeth Llorca</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/greg.png" alt="Team Member">
      </div>
      <h3>James Ryan Gregorio</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/punla.png" alt="Team Member">
      </div>
      <h3>Joyce Anne Punla</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/louis.png" alt="Team Member">
      </div>
      <h3>Mark Louis Santiago</h3>
      <p>Developer</p>
    </div>
    <div class="team-card">
      <div class="team-img">
        <img src="images/ureta.png" alt="Team Member">
      </div>
      <h3>Jan Ermaine Ureta</h3>
      <p>Developer</p>
    </div>
  </div>
</section>

    <!-- Footer  -->

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

<!-- Lightbox Gallery -->
<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <button class="lightbox-prev">&#10094;</button>
    <img class="lightbox-img" src="">
    <button class="lightbox-next">&#10095;</button>
</div>



<!----------------------------SCRIPTTT---------------------------->

    <script src="about_us.js"></script>


<!--  ABOUT US -->

<script>
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;
  const parallax = document.querySelector(".parallax-bg");

  // adjust multiplier para sa bilis (0.4 = mas mabagal kaysa scroll)
  parallax.style.transform = `translateY(${scrollY * 0.4}px)`;
});
</script>

    <script>
const elements = document.querySelectorAll('.about-section h1, .about-section p');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Remove and re-add the class to retrigger animation
      entry.target.classList.remove('show');
      void entry.target.offsetWidth; // trigger reflow
      entry.target.classList.add('show');
    }
  });
}, {
  threshold: 0.1 // trigger when 10% of the element is visible
});

elements.forEach(el => observer.observe(el));
</script>

<!--  WHO WE ARE  -->

    <script>
    const slides = document.querySelectorAll("#who-we-are .about-img");
    const prevBtn = document.querySelector("#who-we-are .prev");
    const nextBtn = document.querySelector("#who-we-are .next");

    let index = 0;

    function showSlide(i) {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[i].classList.add("active");
    }

    prevBtn.addEventListener("click", () => {
        index = (index - 1 + slides.length) % slides.length;
        showSlide(index);
    });

    nextBtn.addEventListener("click", () => {
        index = (index + 1) % slides.length;
        showSlide(index);
    });

 let autoSlide = false; // change to true if you want auto-slide
if (autoSlide) {
    setInterval(() => {
        index = (index + 1) % slides.length;
        showSlide(index);
    }, 5000);
}

</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const whoWeAre = document.querySelector("#who-we-are");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        whoWeAre.classList.add("show");
      } else {
        whoWeAre.classList.remove("show");
      }
    });
  }, { threshold: 0.2 });

  observer.observe(whoWeAre);
});
</script>

<!--  OUR MISSION  -->


<script>
document.addEventListener("DOMContentLoaded", () => {
  const h2 = document.querySelector("#mission h2");
  const p = document.querySelector("#mission > p");
  const cards = document.querySelectorAll(".mission-card");

  // lahat ng elements in order (top → bottom)
  const allItems = [h2, p, ...cards];

  // hidden lahat sa umpisa
  allItems.forEach(item => item.classList.add("hidden"));

  let lastScrollY = window.scrollY;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const goingDown = window.scrollY > lastScrollY;

        // order depende sa scroll direction
        const items = goingDown ? allItems : [...allItems].reverse();

        // sequence show
        items.forEach((item, i) => {
          setTimeout(() => {
            item.classList.remove("hidden", "fade-left", "fade-right", "show");

            if (item === h2 || item === p) {
              // 👉 h2 at p animation: left pababa, right pataas
              item.classList.add(goingDown ? "fade-left" : "fade-right", "show");
            } else {
              // 👉 cards animation: bounce
              void item.offsetWidth; // restart trick
              item.classList.add("show");
            }
          }, i * 250);
        });

      } else {
        // reset kapag nawala sa viewport
        allItems.forEach(item => {
          item.classList.remove("fade-left", "fade-right", "show");
          item.classList.add("hidden");
        });
      }
    });

    lastScrollY = window.scrollY;
  }, { threshold: 0.3 });

  observer.observe(document.querySelector("#mission"));
});
</script>


<!--  OUR VISION  -->

<script>
document.addEventListener("DOMContentLoaded", () => {
  const visionContainer = document.querySelector("#vision");
  const visionItems = [
    visionContainer,
    document.querySelector("#vision h2"),
    document.querySelector("#vision p")
  ];

  // Start hidden
  visionItems.forEach(item => item.classList.remove("show"));

  let lastScrollY = window.scrollY;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const goingDown = window.scrollY > lastScrollY;
        const items = goingDown ? visionItems : [...visionItems].reverse();

        // Sequential animation
        items.forEach((item, i) => {
          setTimeout(() => {
            item.classList.add("show");
          }, i * 200);
        });
      } else {
        // Reset para gumana ulit pag balik
        visionItems.forEach(item => {
          item.classList.remove("show");
        });
      }
    });

    lastScrollY = window.scrollY;
  }, { threshold: 0.3 });

  observer.observe(visionContainer);
});
</script>


<!--  OUR VALUES  -->

<script>
document.querySelectorAll(".accordion-header").forEach(btn => {
  btn.addEventListener("click", () => {
    const item = btn.parentElement;
    const body = item.querySelector(".accordion-body");
    const allItems = document.querySelectorAll(".accordion-item");

    // Close others
    allItems.forEach(i => {
      if (i !== item) {
        i.classList.remove("active");
        i.querySelector(".icon").textContent = "+";
        i.querySelector(".accordion-body").style.maxHeight = null;
      }
    });

    // Toggle current
    item.classList.toggle("active");
    const icon = btn.querySelector(".icon");
    if (item.classList.contains("active")) {
      icon.textContent = "✕";
      body.style.maxHeight = body.scrollHeight + "px"; // auto height
    } else {
      icon.textContent = "+";
      body.style.maxHeight = null;
    }
  });
});

</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector(".our-values");
  const items = [
    section.querySelector(".values-left h2"),
    section.querySelector(".values-left p"),
    ...section.querySelectorAll(".accordion-item")
  ];

  // hidden lahat sa umpisa
  items.forEach(item => item.classList.add("hidden"));

  let lastScrollY = window.scrollY;
  let hasPlayed = false; // ✅ flag para hindi ulit-ulit habang nasa loob

  document.addEventListener("scroll", () => {
    const rect = section.getBoundingClientRect();
    const goingDown = window.scrollY > lastScrollY;

    if (rect.top < window.innerHeight - 100 && rect.bottom > 0) {
      if (!hasPlayed) {
        const ordered = goingDown ? items : [...items].reverse();

        ordered.forEach((item, i) => {
          setTimeout(() => {
            item.classList.remove("hidden", "fade-left", "fade-right", "show");
            item.classList.add(goingDown ? "fade-left" : "fade-right", "show");
          }, i * 150);
        });

        hasPlayed = true; // ✅ para isang play lang habang visible
      }
    } else {
      // reset kapag totally labas ng viewport
      items.forEach(item => {
        item.classList.remove("fade-left", "fade-right", "show");
        item.classList.add("hidden");
      });
      hasPlayed = false; // pwede ulit mag-trigger next time
    }

    lastScrollY = window.scrollY <= 0 ? 0 : window.scrollY;
  });
});
</script>

<!--  OUR PARTNERS  -->

<script>
document.addEventListener("DOMContentLoaded", () => {
  const track = document.querySelector(".partners-track");
  const items = Array.from(track.children);

  // ulit-ulitin hanggang mapuno ng logos yung linya
  while (track.scrollWidth < window.innerWidth * 2) {
    items.forEach(item => {
      const clone = item.cloneNode(true);
      track.appendChild(clone);
    });
  }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const partnersSection = document.querySelector(".partners-section");
  partnersSection.classList.add("hidden");

  let lastScrollY = window.scrollY;

  const partnersObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const goingDown = window.scrollY > lastScrollY;

        partnersSection.classList.remove("hidden", "fade-left", "fade-right", "show");
        void partnersSection.offsetWidth; // reset trick para mag-retrigger animation

        // Scroll direction animation
        partnersSection.classList.add(goingDown ? "fade-left" : "fade-right", "show");
      } else {
        partnersSection.classList.remove("fade-left", "fade-right", "show");
        partnersSection.classList.add("hidden");
      }
    });

    lastScrollY = window.scrollY;
  }, { threshold: 0.3 });

  partnersObserver.observe(partnersSection);
});
</script>


<!--  OUR TEAM  -->

<script>
document.addEventListener("DOMContentLoaded", () => {
  const teamSection = document.querySelector(".our-team");
  const teamHeading = teamSection.querySelector(".team-heading");
  const teamCards = teamSection.querySelectorAll(".team-card");

  // Combine heading + cards into an ordered array
  const allTeamItems = [teamHeading, ...teamCards];

  // Hide everything initially
  allTeamItems.forEach(item => item.classList.add("hidden"));

  let lastScrollY = window.scrollY;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const goingDown = window.scrollY > lastScrollY;
        const items = goingDown ? allTeamItems : [...allTeamItems].reverse();

        items.forEach((item, i) => {
          setTimeout(() => {
            item.classList.remove("hidden", "show", "fade-left", "fade-right");

            if (item === teamHeading) {
              // heading slides from left or right
              item.classList.add(goingDown ? "fade-left" : "fade-right", "show");
            } else {
              // team cards bounce
              void item.offsetWidth; // restart animation
              item.classList.add("show");
            }
          }, i * 200);
        });
      } else {
        // reset when out of viewport
        allTeamItems.forEach(item => {
          item.classList.remove("show", "fade-left", "fade-right");
          item.classList.add("hidden");
        });
      }
    });

    lastScrollY = window.scrollY;
  }, { threshold: 0.3 });

  observer.observe(teamSection);
});
</script>


<!-- FOOTER  -->

<script>
document.addEventListener("DOMContentLoaded", () => {
  const footer = document.querySelector(".footer");

  function revealFooter() {
    const windowHeight = window.innerHeight;
    const footerTop = footer.getBoundingClientRect().top;
    const footerBottom = footer.getBoundingClientRect().bottom;

    // Check if any part of footer is in view
    if (footerTop < windowHeight && footerBottom > 0) { 
      footer.classList.add("show");
    } else {
      footer.classList.remove("show"); // remove class when out of view
    }
  }

  window.addEventListener("scroll", revealFooter);
  revealFooter(); // initial check
});

  </script>


<!-- VIEWER NANG PEKCHUR  -->

<script>
// Lightbox with next/prev
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.querySelector(".lightbox-img");
const closeBtn = document.querySelector(".lightbox .close");
const lbPrev = document.querySelector(".lightbox-prev");
const lbNext = document.querySelector(".lightbox-next");

let lbIndex = 0;

// Open lightbox
function openLightbox(i) {
    lbIndex = i;
    lightbox.style.display = "flex";
    updateLightbox();
}

// Update image and buttons
function updateLightbox() {
    lightboxImg.src = slides[lbIndex].src;

    // Show/hide prev/next buttons
    lbPrev.style.display = lbIndex === 0 ? "none" : "block";
    lbNext.style.display = lbIndex === slides.length - 1 ? "none" : "block";
}

// Open lightbox on image click
slides.forEach((slide, i) => {
    slide.addEventListener("click", () => openLightbox(i));
});

// Close lightbox
closeBtn.addEventListener("click", () => lightbox.style.display = "none");

// Click outside image closes lightbox
lightbox.addEventListener("click", e => {
    if (e.target === lightbox) lightbox.style.display = "none";
});

// Navigate lightbox images
lbPrev.addEventListener("click", () => {
    if (lbIndex > 0) {
        lbIndex--;
        updateLightbox();
    }
});

lbNext.addEventListener("click", () => {
    if (lbIndex < slides.length - 1) {
        lbIndex++;
        updateLightbox();
    }
});

// Optional: arrow keys support
document.addEventListener("keydown", e => {
    if (lightbox.style.display === "flex") {
        if (e.key === "ArrowLeft" && lbIndex > 0) lbPrev.click();
        if (e.key === "ArrowRight" && lbIndex < slides.length - 1) lbNext.click();
        if (e.key === "Escape") closeBtn.click();
    }
});
</script>

</body>
</html>