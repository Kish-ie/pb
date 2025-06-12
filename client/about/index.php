<?php
require_once __DIR__ . '/../global_config_utils.php';
require_once __DIR__ . '/../inc/header.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    /* ===== HERO SECTION ===== */
    .about-hero {
        position: relative;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 80px 20px;
        text-align: center;
        margin-bottom: 40px;
    }

    .about-hero h1 {
        font-size: 42px;
        margin-bottom: 20px;
    }

    /* ===== NAVIGATION LINKS ===== */
    .about-nav {
        background: #f8f9fa;
        padding: 20px 0;
        margin-bottom: 40px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .about-nav-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
    }

    .about-nav a {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 20px;
        margin: 0 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .about-nav a:hover {
        background: #e9ecef;
        color: #d60000;
    }

    .about-nav a.active {
        background: #d60000;
        color: white;
    }

    /* ===== CONTENT SECTIONS ===== */
    .about-container {
        max-width: 1200px;
        margin: 0 auto 60px;
        padding: 0 20px;
    }

    .about-section {
        margin-bottom: 60px;
        padding: 30px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .about-section h2 {
        color: #d60000;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }

    .about-section p {
        line-height: 1.8;
        color: #555;
        margin-bottom: 20px;
    }

    /* Partners Section Specific Styles */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .partner-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .partner-card:hover {
        transform: translateY(-5px);
    }

    .partner-logo {
        max-width: 150px;
        max-height: 80px;
        margin: 0 auto 15px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .about-nav-container {
            flex-direction: column;
            align-items: center;
        }
        
        .about-nav a {
            margin: 5px 0;
            width: 80%;
            text-align: center;
        }
        
        .partners-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>

<!-- ===== HERO SECTION ===== -->
<div class="about-hero">
    <h1>About Our Organization</h1>
    <p>Discover who we are, what we stand for, and how we're making a difference</p>
</div>

<!-- ===== NAVIGATION LINKS ===== -->
<div class="about-nav">
    <div class="about-nav-container">
        <a href="#our-story">Our Story</a>
        <a href="#mission">Mission</a>
        <a href="#vision">Vision</a>
        <a href="#partners">Partners</a>
    </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="about-container">
    <!-- Our Story Section -->
    <section id="our-story" class="about-section">
        <h2>Our Story</h2>
        <p>Founded in 2010, our organization began as a small team of passionate professionals dedicated to transforming education through innovative training programs. What started as a local initiative has grown into a nationally recognized institution serving thousands of learners annually.</p>
        <p>Over the years, we've expanded our offerings, developed strategic partnerships, and continuously adapted to the evolving needs of the workforce. Our journey has been marked by milestones of growth, challenges overcome, and countless success stories from our students.</p>
        <p>Today, we stand proud as a leader in professional development, committed to maintaining the same spirit of innovation and excellence that inspired our founding.</p>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="about-section">
        <h2>Our Mission</h2>
        <p>Our mission is to empower individuals and organizations through accessible, high-quality training programs that bridge the gap between education and employment.</p>
        <p>We are committed to:</p>
        <ul>
            <li>Delivering practical, industry-relevant training</li>
            <li>Fostering an inclusive learning environment</li>
            <li>Supporting lifelong learning and career advancement</li>
            <li>Building strong community partnerships</li>
            <li>Continuously improving our programs based on feedback</li>
        </ul>
    </section>

    <!-- Vision Section -->
    <section id="vision" class="about-section">
        <h2>Our Vision</h2>
        <p>We envision a world where every individual has access to the education and training they need to thrive in their chosen career path.</p>
        <p>By 2030, we aim to:</p>
        <ul>
            <li>Expand our program offerings to cover emerging industries</li>
            <li>Develop innovative digital learning platforms</li>
            <li>Establish partnerships with 100+ leading employers</li>
            <li>Double our annual student enrollment while maintaining quality</li>
            <li>Launch scholarship programs to support underprivileged learners</li>
        </ul>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="about-section">
        <h2>Our Partners</h2>
        <p>We're proud to collaborate with industry leaders and educational institutions to deliver exceptional training programs.</p>
        
        <div class="partners-grid">
            <div class="partner-card">
                <img src="https://via.placeholder.com/150x80?text=Company+A" alt="Company A" class="partner-logo">
                <h3>Company A</h3>
                <p>Industry Partner since 2015</p>
            </div>
            
            <div class="partner-card">
                <img src="https://via.placeholder.com/150x80?text=Company+B" alt="Company B" class="partner-logo">
                <h3>Company B</h3>
                <p>Technology Partner</p>
            </div>
            
            <div class="partner-card">
                <img src="https://via.placeholder.com/150x80?text=University+X" alt="University X" class="partner-logo">
                <h3>University X</h3>
                <p>Academic Partner</p>
            </div>
            
            <div class="partner-card">
                <img src="https://via.placeholder.com/150x80?text=Org+Y" alt="Organization Y" class="partner-logo">
                <h3>Organization Y</h3>
                <p>Community Partner</p>
            </div>
        </div>
    </section>
</div>

<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('.about-nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth'
            });
            
            // Update active nav item
            document.querySelectorAll('.about-nav a').forEach(link => {
                link.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
    
    // Highlight nav item based on scroll position
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY + 150;
        
        document.querySelectorAll('.about-section').forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                document.querySelectorAll('.about-nav a').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });
</script>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>