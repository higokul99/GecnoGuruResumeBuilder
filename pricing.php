<?php include ('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GecnoGuru - Pricing</title>
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

        /* Pricing Cards */
        .pricing-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .pricing-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .pricing-grid {
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
            position: relative;
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
        }
        
        .pricing-title {
            font-size: 1.3rem;
            color: var(--dark-color);
            margin: 0 0 5px;
            font-weight: 700;
        }
        
        .pricing-subtitle {
            font-size: 0.9rem;
            color: var(--text-light);
            margin: 0;
        }
        
        .pricing-price {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin: 15px 0 0;
            font-weight: 800;
        }
        
        .price-range {
            font-size: 1rem;
            color: var(--text-dark);
        }
        
        .pricing-features {
            padding: 20px;
            flex-grow: 1;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .feature-item {
            padding: 8px 0;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            font-size: 0.95rem;
        }
        
        .feature-item i {
            color: var(--success-color);
            margin-right: 10px;
            font-size: 0.9rem;
        }
        
        .pricing-footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
        }
        
        .pricing-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .pricing-btn:hover {
            background-color: var(--dark-color);
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background-color: #f8fafc;
        }
        
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .faq-item {
            margin-bottom: 20px;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
        }
        
        .faq-question {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-weight: 600;
            color: var(--dark-color);
            transition: all 0.3s ease;
        }
        
        .faq-question:hover {
            background-color: #f8fafc;
        }
        
        .faq-question i {
            margin-left: 10px;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        
        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }
        
        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            color: var(--text-light);
        }
        
        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 500px;
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

        /* Featured Pricing */
        .featured-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--warning-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .most-popular {
            border: 2px solid var(--primary-color);
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .pricing-grid {
                padding: 0 20px;
            }
        }
        
        @media (max-width: 768px) {
            /* Hero section adjustments */
            .hero-section {
                padding: 60px 0 40px;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            /* Pricing grid adjustments */
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }
            
            /* CTA section */
            .cta-section h2 {
                font-size: 2rem;
            }
            
            .cta-section p {
                font-size: 1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 15px;
                max-width: 300px;
                margin: 0 auto;
            }
            
            .btn {
                padding: 10px 20px;
                width: 100%;
            }
            
            /* Section padding reduction */
            .pricing-section,
            .faq-section,
            .cta-section {
                padding: 60px 0;
            }
            
            /* Section headings */
            .section-heading h2 {
                font-size: 1.8rem;
            }
            
            .section-heading p {
                font-size: 1rem;
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
            <h1>Simple, Transparent Pricing</h1>
            <p>Invest in your future with our professional career development services. Choose the services that best fit your needs and budget.</p>
        </div>
    </section>
    
    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <div class="section-heading">
                <h2>Individual Service Pricing</h2>
                <p>One-time payment for each service. No hidden fees.</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Pro Plan</h3>
                        <p class="pricing-subtitle">Unlock all premium features</p>
                        <p class="pricing-price"><span class="price-range">₹10</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Access to all resume templates</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Unlimited resume downloads</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Cover letter builder</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Priority support</li>
                            <li class="feature-item"><i class="fas fa-check"></i> No watermarks</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="subscribe.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card most-popular">
                    <!-- <span class="featured-tag">Most Popular</span> -->
                    <div class="pricing-header">
                        <h3 class="pricing-title">LinkedIn Profile Optimization</h3>
                        <p class="pricing-subtitle">Stand out to recruiters</p>
                        <p class="pricing-price"><span class="price-range">₹499 – ₹4,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Profile headline optimization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Keyword-rich summary</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Experience section enhancement</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Skill endorsement strategy</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Profile photo consultation</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Banner design recommendations</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Cover Letter Writing</h3>
                        <p class="pricing-subtitle">Compelling introductions</p>
                        <p class="pricing-price"><span class="price-range">₹199 – ₹1,499</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Tailored to specific job</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Compelling introduction</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Skill-to-job matching</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Professional formatting</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Multiple revisions</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                    
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">ATS Resume Review & Fixing</h3>
                        <p class="pricing-subtitle">Beat the screening software</p>
                        <p class="pricing-price"><span class="price-range">₹1,499</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> ATS compatibility test</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Format optimization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Keyword analysis</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Section restructuring</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Final ATS passing score</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Naukri & Indeed Profile Setup</h3>
                        <p class="pricing-subtitle">Maximized job portal visibility</p>
                        <p class="pricing-price"><span class="price-range">₹999 – ₹2,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Profile headline optimization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Searchable resume setup</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Job preferences configuration</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Skills & keywords optimization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Job alerts setup</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Portfolio Website Setup (Basic)</h3>
                        <p class="pricing-subtitle">Showcase your work online</p>
                        <p class="pricing-price"><span class="price-range">₹3,999 – ₹7,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Professional template selection</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Up to 5 portfolio projects</li>
                            <li class="feature-item"><i class="fas fa-check"></i> About & services pages</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Contact form integration</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Social media links</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Mobile responsiveness</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Portfolio Website (Custom)</h3>
                        <p class="pricing-subtitle">Fully customized web presence</p>
                        <p class="pricing-price"><span class="price-range">₹9,999+</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Custom design & development</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Unlimited portfolio projects</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Custom domain setup</li>
                            <li class="feature-item"><i class="fas fa-check"></i> SEO optimization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Analytics integration</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Content management system</li>
                            <li class="feature-item"><i class="fas fa-check"></i> 1 month of technical support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">GitHub Profile Setup & Optimization</h3>
                        <p class="pricing-subtitle">Showcase your coding journey</p>
                        <p class="pricing-price"><span class="price-range">₹999 – ₹3,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Profile README design</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Repository organization</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Project documentation</li>
                            <li class="feature-item"><i class="fas fa-check"></i> GitHub stats integration</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Contribution graph enhancement</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">LinkedIn Networking & Referrals Guide</h3>
                        <p class="pricing-subtitle">Strategic connections</p>
                        <p class="pricing-price"><span class="price-range">₹1,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Personalized networking strategy</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Targeted connection requests</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Message templates</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Referral request approach</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Engagement strategy</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div>
                
                <!-- <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Mock Interview (HR + Technical)</h3>
                        <p class="pricing-subtitle">Practice makes perfect</p>
                        <p class="pricing-price"><span class="price-range">₹2,499 – ₹4,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Industry-specific questions</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Role-tailored scenarios</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Real-time feedback</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Body language assessment</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Recorded session</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Follow-up improvement plan</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div> -->
                
                <!-- <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="pricing-title">System Design Interview Coaching</h3>
                        <p class="pricing-subtitle">For senior tech roles</p>
                        <p class="pricing-price"><span class="price-range">₹4,999 – ₹7,999</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li class="feature-item"><i class="fas fa-check"></i> Practice system design interviews</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Architecture best practices</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Scalability principles</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Whiteboarding techniques</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Common pitfalls review</li>
                            <li class="feature-item"><i class="fas fa-check"></i> Company-specific preparation</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="login.php" class="pricing-btn">Get Started</a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <!-- <section class="faq-section">
        <div class="container">
            <div class="section-heading">
                <h2>Frequently Asked Questions</h2>
                <p>Have questions about our services? Find answers below.</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I determine which pricing tier is right for me?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The pricing varies based on your experience level, industry complexity, and desired level of customization. Entry-level positions typically fall in the lower range, while executive and specialized roles require more expertise and customization, placing them in the higher range. During your free consultation, we'll assess your needs and recommend the appropriate tier.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How long does each service typically take to complete?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Service completion times vary based on complexity and revisions needed. Resume building typically takes 2-4 business days, LinkedIn optimization 3-5 days, portfolio websites 1-2 weeks, and mock interviews can be scheduled within a week of booking. We'll provide a specific timeline during your initial consultation.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer any package discounts for multiple services?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer bundled packages with discounts of 10-20% when you combine multiple services. Our most popular combinations include Resume + LinkedIn Profile, Resume + Cover Letter + Mock Interview, and the Complete Career Package which includes all essential services. Contact us for custom package pricing.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What payment methods do you accept?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept all major credit/debit cards, UPI payments, net banking, and digital wallets including PayTM, Google Pay, and PhonePe. For certain services, we offer installment payment options. All transactions are securely processed and protected.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What if I'm not satisfied with the service?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We stand behind our work with a satisfaction guarantee. If you're not completely satisfied, we offer unlimited revisions within 14 days of delivery. If we can't meet your expectations after revisions, we provide partial or full refunds depending on the service. Your career success is our priority.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- CTA Section -->
    <!-- <section class="cta-section">
        <div class="cta-container">
            <h2>Ready to Launch Your Career?</h2>
            <p>Create your professional resume in minutes and take the first step toward your dream job.</p>
            <div class="cta-buttons">
                <a href="login.php" class="btn btn-primary">Get Started Now</a>
                <a href="#features" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section> -->
    
    <!-- Footer -->
    <footer id="footer">
        <?php include('footer.php'); ?>
    </footer>

    <!-- JavaScript for template slider -->
    <script>
        // Template slider functionality
        const templatesContainer = document.querySelector('.templates-container');
        const scrollLeftBtn = document.querySelector('.scroll-left');
        const scrollRightBtn = document.querySelector('.scroll-right');
        const indicators = document.querySelectorAll('.indicator');
        let currentIndex = 0;
        
        scrollLeftBtn.addEventListener('click', () => {
            currentIndex = Math.max(currentIndex - 1, 0);
            updateSlider();
        });
        
        scrollRightBtn.addEventListener('click', () => {
            currentIndex = Math.min(currentIndex + 1, 2);
            updateSlider();
        });
        
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                updateSlider();
            });
        });
        
        function updateSlider() {
            const scrollAmount = templatesContainer.clientWidth * currentIndex;
            templatesContainer.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
            
            indicators.forEach((indicator, index) => {
                if (index === currentIndex) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>