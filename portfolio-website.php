<?php include ('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GecnoGuru - Portfolio Website Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global styles */
        :root {
            --primary-color: #2563eb;
            --secondary-color: #3b82f6;
            --accent-color: #60a5fa;
            --light-color: #f0f9ff;
            --dark-color: #1e3a8a;
            --text-dark: #1e293b;
            --text-light: #94a3b8;
            --success-color: #10b981;
            --warning-color: #f59e0b;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-heading {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .section-heading h2 {
            font-size: 2.5rem;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .section-heading p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--dark-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        
        .btn-secondary:hover {
            background-color: var(--light-color);
            transform: translateY(-3px);
        }

        /* Hero section styles */
        .hero-section {
            background: linear-gradient(135deg, var(--dark-color), var(--primary-color));
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            font-weight: 800;
        }
        
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.7;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Features section */
        .features-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            padding: 30px;
            border: 1px solid #f1f5f9;
            text-align: center;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-color);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .feature-title {
            font-size: 1.3rem;
            color: var(--dark-color);
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .feature-description {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Portfolio showcase section */
        .showcase-section {
            padding: 80px 0;
            background-color: #f8fafc;
        }
        
        .portfolio-examples {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .portfolio-example {
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
        }
        
        .portfolio-example:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .portfolio-image {
            width: 100%;
            height: 200px;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.2rem;
        }
        
        .portfolio-info {
            padding: 20px;
        }
        
        .portfolio-title {
            font-size: 1.2rem;
            color: var(--dark-color);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .portfolio-description {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .portfolio-tag {
            display: inline-block;
            background-color: var(--light-color);
            color: var(--primary-color);
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        /* Pricing section */
        .pricing-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .pricing-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .pricing-card {
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-color);
        }
        
        .pricing-header {
            padding: 25px 20px;
            border-bottom: 1px solid #f1f5f9;
            background-color: #f8fafc;
            text-align: center;
        }
        
        .pricing-title {
            font-size: 1.5rem;
            color: var(--dark-color);
            margin: 0 0 5px;
            font-weight: 700;
        }
        
        .pricing-price {
            font-size: 2rem;
            color: var(--primary-color);
            margin: 15px 0 0;
            font-weight: 800;
        }
        
        .pricing-period {
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .pricing-features {
            padding: 20px;
            flex-grow: 1;
        }
        
        .pricing-feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .pricing-feature {
            padding: 8px 0;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            font-size: 0.95rem;
        }
        
        .pricing-feature i {
            color: var(--success-color);
            margin-right: 10px;
            font-size: 0.9rem;
        }
        
        .pricing-footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
        }

        /* Process section */
        .process-section {
            padding: 80px 0;
            background-color: #f8fafc;
        }
        
        .process-steps {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
            position: relative;
        }
        
        .process-step {
            flex: 0 0 calc(25% - 40px);
            margin: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        
        .step-title {
            font-size: 1.2rem;
            color: var(--dark-color);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .step-description {
            color: var(--text-light);
            font-size: 0.95rem;
        }
        
        .process-line {
            position: absolute;
            top: 30px;
            left: 10%;
            width: 80%;
            height: 2px;
            background-color: #e2e8f0;
            z-index: 0;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--dark-color), var(--primary-color));
            color: white;
            text-align: center;
        }
        
        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 800;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Coming soon tag */
        .coming-soon-tag {
            background-color: var(--warning-color);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
        }

        /* Responsive styles */
        @media (max-width: 1024px) {
            .process-step {
                flex: 0 0 calc(50% - 40px);
                margin-bottom: 40px;
            }
            
            .process-line {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0 40px;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .section-heading h2 {
                font-size: 1.8rem;
            }
            
            .process-step {
                flex: 0 0 100%;
            }
            
            .cta-section h2 {
                font-size: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 15px;
                max-width: 300px;
                margin: 0 auto;
            }
        }
        
        @media (max-width: 480px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-container">
            <h1>Showcase Your Work with a Professional Portfolio Website</h1>
            <p>Stand out from the crowd with a custom portfolio website that highlights your skills, projects, and achievements.</p>
            <div class="coming-soon-tag">Launching Soon</div>
            <a href="#notify" class="btn btn-primary">Get Notified</a>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="section-heading">
                <h2>Why You Need a Portfolio Website</h2>
                <p>In today's digital world, having an online portfolio is essential for career growth and professional visibility.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="feature-title">24/7 Online Presence</h3>
                    <p class="feature-description">Showcase your work around the clock, allowing potential employers and clients to discover your talents anytime, anywhere.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <h3 class="feature-title">Establish Your Personal Brand</h3>
                    <p class="feature-description">Create a unique digital identity that sets you apart from competitors and leaves a lasting impression on visitors.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="feature-title">Improve Discoverability</h3>
                    <p class="feature-description">Get found by recruiters and clients through search engines with an SEO-optimized portfolio website.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3 class="feature-title">Showcase Your Best Work</h3>
                    <p class="feature-description">Display your projects, achievements, and skills in an organized, visually appealing manner that highlights your expertise.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="feature-title">Build Professional Relationships</h3>
                    <p class="feature-description">Create opportunities for connections with integrated contact forms and social media links.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Track Your Progress</h3>
                    <p class="feature-description">Monitor visitors, engagement, and interaction with built-in analytics to improve your portfolio's effectiveness.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-heading">
                <h2>Our Portfolio Creation Process</h2>
                <p>We make building your professional online presence simple and efficient.</p>
            </div>
            
            <div class="process-steps">
                <div class="process-line"></div>
                
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Discovery Call</h3>
                    <p class="step-description">We'll discuss your goals, target audience, and the specific features you need for your portfolio.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Design Proposal</h3>
                    <p class="step-description">Based on your needs, we'll create a customized design proposal with layout options and features.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Development</h3>
                    <p class="step-description">Our team builds your portfolio website with responsive design and user-friendly interface.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Launch & Support</h3>
                    <p class="step-description">After your approval, we launch your site and provide technical support to ensure everything runs smoothly.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <div class="section-heading">
                <h2>Portfolio Website Packages</h2>
                <p>Choose the package that suits your career needs and budget.</p>
                <div class="coming-soon-tag">Launching Soon</div>
            </div>
            
            <div class="pricing-cards">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Basic Portfolio</h3>
                        <p class="pricing-price">₹3,999</p>
                        <p class="pricing-period">one-time payment</p>
                    </div>
                    <div class="pricing-features">
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature"><i class="fas fa-check"></i> Professional template selection</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Up to 5 portfolio projects</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> About & services pages</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Contact form integration</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Social media links</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Mobile responsive design</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#notify" class="btn btn-primary">Get Notified</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Standard Portfolio</h3>
                        <p class="pricing-price">₹7,999</p>
                        <p class="pricing-period">one-time payment</p>
                    </div>
                    <div class="pricing-features">
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature"><i class="fas fa-check"></i> All Basic features plus:</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Custom domain setup</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Up to 10 portfolio projects</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Blog/news section</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Basic SEO optimization</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Google Analytics integration</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> 1 month technical support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#notify" class="btn btn-primary">Get Notified</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Premium Portfolio</h3>
                        <p class="pricing-price">₹9,999+</p>
                        <p class="pricing-period">one-time payment</p>
                    </div>
                    <div class="pricing-features">
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature"><i class="fas fa-check"></i> All Standard features plus:</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Custom design & development</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Unlimited portfolio projects</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Advanced SEO optimization</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Content management system</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> E-commerce capabilities (if needed)</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> 3 months technical support</li>
                            <li class="pricing-feature"><i class="fas fa-check"></i> Website speed optimization</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#notify" class="btn btn-primary">Get Notified</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Who Needs It Section -->
    <section class="showcase-section">
        <div class="container">
            <div class="section-heading">
                <h2>Who Needs a Portfolio Website?</h2>
                <p>A professional portfolio website is essential for these careers and many more:</p>
            </div>
            
            <div class="portfolio-examples">
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-paint-brush fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Designers</h3>
                        <p class="portfolio-description">Showcase your visual projects, UI/UX work, and creative process to attract potential clients.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Graphic Design</span>
                            <span class="portfolio-tag">UI/UX</span>
                            <span class="portfolio-tag">Branding</span>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-code fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Developers</h3>
                        <p class="portfolio-description">Display your coding projects, applications, and technical skills to impress employers.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Web Dev</span>
                            <span class="portfolio-tag">Mobile Apps</span>
                            <span class="portfolio-tag">Software</span>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-camera fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Photographers</h3>
                        <p class="portfolio-description">Present your photo collections and visual storytelling in high-quality galleries.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Portrait</span>
                            <span class="portfolio-tag">Commercial</span>
                            <span class="portfolio-tag">Event</span>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-pencil-alt fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Writers & Content Creators</h3>
                        <p class="portfolio-description">Share your articles, blogs, and written work to demonstrate your expertise.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Copywriting</span>
                            <span class="portfolio-tag">Journalism</span>
                            <span class="portfolio-tag">Content</span>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-briefcase fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Business Professionals</h3>
                        <p class="portfolio-description">Highlight your career achievements, case studies, and professional journey.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Projects</span>
                            <span class="portfolio-tag">Leadership</span>
                            <span class="portfolio-tag">Resume+</span>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-example">
                    <div class="portfolio-image">
                        <i class="fas fa-graduation-cap fa-3x"></i>
                    </div>
                    <div class="portfolio-info">
                        <h3 class="portfolio-title">Students & Graduates</h3>
                        <p class="portfolio-description">Present your academic projects, internships, and early career highlights.</p>
                        <div class="portfolio-tags">
                            <span class="portfolio-tag">Projects</span>
                            <span class="portfolio-tag">Research</span>
                            <span class="portfolio-tag">Skills</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section" id="notify">
        <div class="cta-container">
            <h2>Be the First to Know When We Launch</h2>
            <p>Our Portfolio Website service is coming soon! Sign up to get early access and special launch pricing.</p>
            <div class="cta-buttons">
                <a href="login.php" class="btn btn-primary">Join Waitlist</a>
                <a href="pricing.php" class="btn btn-secondary">View Other Services</a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer id="footer">
        <?php include('footer.php'); ?>
    </footer>

    <script>
        // Add any JavaScript functionality here if needed
    </script>
</body>
</html>