<?php
// Start session for user data persistence
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php include ('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover Letter Builder</title>
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-container">
            <h1>Build Your Professional Cover Letter</h1>
            <p>Get a compelling cover letter that makes you stand out from the competition.</p>
            <a href="#notify" class="btn btn-primary">Get Notified</a>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <h2>Why Choose Our Cover Letter Builder?</h2>
            <ul>
                <li><i class="fas fa-check-circle"></i> <strong>Tailored to Your Job Role:</strong> Each cover letter is customized to match your skills, experience, and the job you’re applying for.</li>
                <li><i class="fas fa-check-circle"></i> <strong>Time-Saving & Hassle-Free:</strong> Avoid the stress of writing from scratch and let our tool handle the hard work for you.</li>
                <li><i class="fas fa-check-circle"></i> <strong>Expertly Written Content:</strong> Professionally crafted cover letters designed to grab the attention of hiring managers.</li>
                <li><i class="fas fa-check-circle"></i> <strong>Industry-Specific Optimization:</strong> Receive expert recommendations and wording suited for your desired job sector.</li>
                <li><i class="fas fa-check-circle"></i> <strong>Boost Your Chances of Success:</strong> Impress recruiters with a well-structured, engaging, and polished letter.</li>
                <li><i class="fas fa-check-circle"></i> <strong>Affordable & High-Quality:</strong> Get a top-notch cover letter without breaking the bank.</li>
            </ul>
        </div>
    </section>
    
    <!-- Footer -->
    <footer id="footer">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
