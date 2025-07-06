<?php require_once('./inc/header.php'); ?>

    <!-- Main content -->
    <main id="main-content" role="main">
        <!-- Hero section with improved semantics -->
        <section class="hero" aria-labelledby="hero-heading">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="hero-content">
                    <h1 id="hero-heading">
                        <span class="typewriter" data-text="Courses to Learn"></span>
                        <br>
                        <span class="subheading" style="color: white;">Own your future by learning new skills online</span>
                    </h1>
                    
                    <form class="course-search" role="search" aria-label="Course search" method="GET" action="<?= BASE_URL ?>search/">
    <label for="course-search" class="sr-only">Search courses</label>
    <input type="search" 
           id="course-search" 
           name="q" 
           placeholder="What do you want to learn today?" 
           aria-placeholder="Search courses"
           value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
           required>
    <button type="submit" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>
    </button>
</form>
                    
                    <div class="hero-cards">
                        <div class="card">
                            <h2>About Us</h2>
                            <p><i class="fa-solid fa-book"></i>Discover our mission and values</p>
                            <a href="<?php echo BASE_URL; ?>./about/?page=about" class="btn">Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="card">
                            <h2>Apply Now</h2>
                            <p>Start your learning journey</p>
                            <a href="<?php echo BASE_URL; ?>./courses/?page=courses" class="btn">Apply Now </a>
                        </div>
                        <div class="card">
                            <h2>Certifications</h2>
                            <p>Recognized qualifications</p>
                            <a href="/certifications" class="btn">View Options <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="stats-bar">
                <div class="container">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <i class="fas fa-user-graduate" aria-hidden="true"></i>
                            <div>
                                <span class="count" data-target="20000">0</span>+
                                <span class="stat-label">Students</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-book-open" aria-hidden="true"></i>
                            <div>
                                <span class="count" data-target="200">0</span>+
                                <span class="stat-label">Courses</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-laptop-code" aria-hidden="true"></i>
                            <div>
                                <span class="count" data-target="100000">0</span>+
                                <span class="stat-label">Online Learners</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About section with improved structure -->
        <section class="about-section" aria-labelledby="about-heading">
            <div class="container">
                <div class="about-grid">
                    <div class="about-image" data-aos="fade-right">
                        <picture>
                            <source srcset="assets/images/add-a-heading.jpg" type="image/webp">
                            <img src="assets/images/add-a-heading-2.jpg" alt="Students learning at PBIRT Institute" width="600" height="400" loading="lazy">
                        </picture>
                    </div>
                    <div class="about-content" data-aos="fade-left">
                        <h2 id="about-heading">About PBIRT Institute</h2>
                        <p class="lead">PB Training Institute of Research and Technology is a non-profit institution registered in Kenya committed to promoting excellence and integrity in accounting, technology, and research.</p>
                        <p>Founded in 2016 as Igoz Consultancy and incorporated in January 2024, PB Institute offers computer literacy and KASNEB accountancy courses from our campus in Ongata Rongai, Kajiado County. Quality education is our top priority.</p>
                        
                        <div class="programs-list">
                            <h3>Our Key Programs:</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    Certified Public Accountants (CPA)
                                </li>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    Accounting Technicians Diploma (ATD)
                                </li>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    Certificate in Accounting and Management Skills
                                </li>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    Computer Packages Certification
                                </li>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    Graphic Design Training
                                </li>
                            </ul>
                        </div>
                        
                        <a href="<?php echo BASE_URL; ?>./about/?page=about" class="btn btn-primary">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features banner -->
        <section class="features-banner" aria-label="Institute features">
            <div class="container">
                <h2 class="sr-only">Why Choose PBIRT</h2>
                <div class="features-grid">
                    <div class="feature-item" data-aos="fade-up">
                        <i class="fas fa-award" aria-hidden="true"></i>
                        <h3>Accredited Programs</h3>
                        <p>All our courses are fully accredited by relevant bodies</p>
                    </div>
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                        <h3>Expert Instructors</h3>
                        <p>Learn from industry professionals with real-world experience</p>
                    </div>
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-laptop-house" aria-hidden="true"></i>
                        <h3>Flexible Learning</h3>
                        <p>Choose between in-person or online classes</p>
                    </div>
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                        <h3>Career Support</h3>
                        <p>Get help with job placement after graduation</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses section with improved card design -->
        <section class="courses-section" aria-labelledby="courses-heading">
            <div class="container">
                <div class="section-header">
                    <h2 id="courses-heading">Our Popular Courses</h2>
                    <p>Choose from our wide range of accredited programs</p>
                    <a href="<?php echo BASE_URL; ?>./courses/?page=courses" class="btn-link">View All Courses <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                
                <div class="courses-grid">
                    <!-- Course 1 -->
                    <article class="course-card" data-aos="fade-up">
                        <div class="course-image">
                            <img src="https://images.unsplash.com/photo-1683884361203-69b7f969e9ff?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGNwYXxlbnwwfHwwfHx8MA%3D%3D" alt="CPA Course" loading="lazy" width="400" height="250">
                            <span class="course-category">Accounting</span>
                        </div>
                        <div class="course-content">
                            <div class="course-duration">
                                <i class="fas fa-clock" aria-hidden="true"></i> 3 Years
                                <span class="course-level">Advanced</span>
                            </div>
                            <h3><a href="/courses/cpa">Certified Public Accountants (CPA)</a></h3>
                            <p>CPAs are highly sought after by businesses and organizations for their expertise in tax law, auditing procedures, and financial management.</p>
                            <div class="course-footer">
                                <a href="/courses/cpa" class="btn btn-outline">Learn More</a>
                                <div class="course-rating">
                                    <span class="stars">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                    </span>
                                    <span class="rating-text">4.7 (1,243)</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Course 2 -->
                    <article class="course-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="course-image">
                            <img src="assets/images/about.png" alt="ATD Course" loading="lazy" width="400" height="250">
                            <span class="course-category">Accounting</span>
                        </div>
                        <div class="course-content">
                            <div class="course-duration">
                                <i class="fas fa-clock" aria-hidden="true"></i> 2 Years
                                <span class="course-level">Intermediate</span>
                            </div>
                            <h3><a href="/courses/atd">Accounting Technicians Diploma (ATD)</a></h3>
                            <p>The course imparts knowledge and skills to prepare financial statements and management accounts for small and medium-sized enterprises.</p>
                            <div class="course-footer">
                                <a href="/courses/atd" class="btn btn-outline">Learn More</a>
                                <div class="course-rating">
                                    <span class="stars">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="rating-text">4.9 (892)</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Course 3 -->
                    <article class="course-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="course-image">
                            <img src="assets/images/computer-course.jpg" alt="Computer Packages Course" loading="lazy" width="400" height="250">
                            <span class="course-category">Technology</span>
                        </div>
                        <div class="course-content">
                            <div class="course-duration">
                                <i class="fas fa-clock" aria-hidden="true"></i> 6 Months
                                <span class="course-level">Beginner</span>
                            </div>
                            <h3><a href="/courses/computer">Computer Packages Certification</a></h3>
                            <p>Comprehensive training in essential computer applications including word processing, spreadsheets, presentations, and internet skills.</p>
                            <div class="course-footer">
                                <a href="/courses/computer" class="btn btn-outline">Learn More</a>
                                <div class="course-rating">
                                    <span class="stars">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="rating-text">5.0 (2,145)</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Testimonials section -->
        <section class="testimonials-section" aria-labelledby="testimonials-heading">
    <div class="container">
        <div class="section-header">
            <h2 id="testimonials-heading">What Our Students Say</h2>
            <p class="section-subtitle">Success stories from our alumni community</p>
        </div>
                <div class="testimonials-slider">
                    <div class="testimonial" data-aos="fade-right">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <blockquote>
                                <p>PBIRT Institute gave me the skills and confidence to start my accounting career. The CPA program was comprehensive and the instructors were incredibly supportive.</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="assets/images/testimonial1.jpg" alt="Sarah M." loading="lazy" width="80" height="80">
                                <div>
                                    <h4>Sarah M.</h4>
                                    <span class="author-title">CPA Graduate, Accountant at Deloitte</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial" data-aos="fade-up">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <blockquote>
                                <p>The computer packages course transformed my digital skills. I went from basic knowledge to being proficient in all office applications, which helped me secure my current job.</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="assets/images/testimonial2.jpg" alt="James K." loading="lazy" width="80" height="80">
                                <div>
                                    <h4>James K.</h4>
                                    <span class="author-title">Computer Packages Graduate, Office Administrator</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial" data-aos="fade-left">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <blockquote>
                                <p>As a working professional, the flexible evening classes for ATD were perfect. The practical approach to accounting made complex concepts easy to understand.</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="assets/images/testimonial3.jpg" alt="Grace W." loading="lazy" width="80" height="80">
                                <div>
                                    <h4>Grace W.</h4>
                                    <span class="author-title">ATD Graduate, Accounts Assistant</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" aria-labelledby="cta-heading">
            <div class="container">
                <div class="cta-content" data-aos="zoom-in">
                    <h2 id="cta-heading">Ready to Transform Your Career?</h2>
                    <p>Join over 20,000 students who have advanced their careers with PBIRT Institute</p>
                    <div class="cta-buttons">
                        <a href="/apply" class="btn btn-light">Apply Now</a>
                        <a href="/contact" class="btn btn-outline-light">Contact Admissions</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- News & Events Section -->
       <!-- <section class="news-section" aria-labelledby="news-heading">
            <div class="container">
                <div class="section-header">
                    <h2 id="news-heading">Latest News & Events</h2>
                    <p>Stay updated with what's happening at PBIRT</p>
                    <a href="/news" class="btn-link">View All News <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                
                <div class="news-grid">
                    <article class="news-card" data-aos="fade-up">
                        <div class="news-image">
                            <img src="assets/images/about.png" alt="Graduation Ceremony" loading="lazy" width="400" height="250">
                            <span class="news-date">
                                <span class="day">15</span>
                                <span class="month">Jun</span>
                            </span>
                        </div>
                        <div class="news-content">
                            <span class="news-category">Event</span>
                            <h3><a href="/news/graduation-2023">Annual Graduation Ceremony 2023</a></h3>
                            <p>Join us as we celebrate the achievements of our graduating class of 2023 at our campus in Ongata Rongai.</p>
                            <a href="/news/graduation-2023" class="read-more">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                    
                    <article class="news-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="news-image">
                            <img src="assets/images/news2.jpg" alt="New Computer Lab" loading="lazy" width="400" height="250">
                            <span class="news-date">
                                <span class="day">28</span>
                                <span class="month">May</span>
                            </span>
                        </div>
                        <div class="news-content">
                            <span class="news-category">Announcement</span>
                            <h3><a href="/news/new-computer-lab">New State-of-the-Art Computer Lab</a></h3>
                            <p>We've upgraded our computer lab with the latest technology to enhance our students' learning experience.</p>
                            <a href="/news/new-computer-lab" class="read-more">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                    
                    <article class="news-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="news-image">
                            <img src="assets/images/news3.jpg" alt="Workshop Announcement" loading="lazy" width="400" height="250">
                            <span class="news-date">
                                <span class="day">05</span>
                                <span class="month">Jun</span>
                            </span>
                        </div>
                        <div class="news-content">
                            <span class="news-category">Workshop</span>
                            <h3><a href="/news/tax-workshop">Free Tax Preparation Workshop</a></h3>
                            <p>Learn essential tax preparation skills in our free weekend workshop open to the community.</p>
                            <a href="/news/tax-workshop" class="read-more">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </section>-->

        <!-- Contact Section with improved form -->
        <section class="contact-section" aria-labelledby="contact-heading">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-info" data-aos="fade-right">
                        <h2 id="contact-heading">Contact Information</h2>
                        <p class="contact-intro">Have questions about our programs or want to visit our campus? Reach out to us through any of these channels:</p>
                        
                        <div class="contact-methods">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h3>Our Location</h3>
                                    <address>
                                        PBIRT Institute<br>
                                        Ongata Rongai<br>
                                        Kajiado County, Kenya
                                    </address>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h3>Phone Numbers</h3>
                                    <p>
                                        <a href="tel:+254721214795">+254 721 214 795</a><br>
                                        <a href="tel:+254734567890">+254 734 567 890</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h3>Email Addresses</h3>
                                    <p>
                                        <a href="mailto:info@pbinstituteofresearch.co.ke">info@pbinstituteofresearch.co.ke</a><br>
                                        <a href="mailto:admissions@pbinstituteofresearch.co.ke">admissions@pbinstituteofresearch.co.ke</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-clock" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h3>Working Hours</h3>
                                    <p>
                                        Monday–Friday: 8:00 AM-5:00 PM<br>
                                        Saturday: 9:00 AM-2:00 PM<br>
                                        Sunday: Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <h3>Follow Us On Social Media</h3>
                            <div class="social-icons">
                                <a href="https://facebook.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                </a>
                                <a href="https://twitter.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                    <i class="fab fa-x-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="https://linkedin.com/company/pbirt" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                </a>
                                <a href="https://instagram.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                </a>
                                <a href="https://youtube.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                    <i class="fab fa-youtube" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-form" data-aos="fade-left">
                        <h3>Send Us a Message</h3>
                        <form id="contactForm" novalidate>
                            <div class="form-group">
                                <label for="name">Full Name <span class="required">*</span></label>
                                <input type="text" id="name" name="name" required>
                                <div class="error-message" id="name-error"></div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input type="email" id="email" name="email" required>
                                    <div class="error-message" id="email-error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject <span class="required">*</span></label>
                                <input type="text" id="subject" name="subject" required>
                                <div class="error-message" id="subject-error"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Your Message <span class="required">*</span></label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                                <div class="error-message" id="message-error"></div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <span class="submit-text">Send Message</span>
                                <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Campus Map Section
        <section class="map-section" aria-label="Campus location map">
            <div class="container">
                <h2 class="sr-only">Our Location</h2>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.854345147643!2d36.77321431475399!3d-1.2656358990749605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f19a5e43a4b7d%3A0x4a0c8f0b9b5b0b0b!2sPBIRT%20Institute!5e0!3m2!1sen!2ske!4v1620000000000!5m2!1sen!2ske" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        title="PBIRT Institute Location Map"
                        aria-label="Interactive map showing PBIRT Institute location">
                    </iframe>
                </div>
            </div>
        </section>
    </main>
-->

    <?php require_once('./inc/footer.php'); ?>

    <!-- Back to top button -->
    <button id="backToTop" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    <!-- Loading spinner -->
    <div class="loading-spinner" aria-hidden="true">
        <div class="spinner"></div>
    </div>

    <!-- JavaScript files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/main.min.js" defer></script>
    
    <script>
        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
            
            // Hide loading spinner when page is loaded
            document.querySelector('.loading-spinner').style.display = 'none';
        });
        
        // Lazy load images
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.dataset.src;
            });
        } else {
            // Fallback for browsers that don't support lazy loading
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
            document.body.appendChild(script);
        }
    </script>
</main>
</html>