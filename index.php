<?php
session_start();

// Initialize session variable if not set
if (!isset($_SESSION['user_logged_in'])) {
    $_SESSION['user_logged_in'] = false; // Default to not logged in
}

// Handle login simulation (for testing purposes)
if (isset($_GET['login'])) {
    $_SESSION['user_logged_in'] = true; // CHANGED TO TRUE - This was the problem!
    header("Location: index.php"); // Redirect to avoid re-triggering login
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to the homepage
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragrance Fusion</title>
    <meta name="description" content="Fragrance Fusion - Unique, memorable scents that tell stories">
    <!-- Bootstrap 5.0.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <a href="index.php" class="logo">FRAGRANCE FUSION</a>
                <nav class="main-nav">
                    <a href="html/collections.html" class="nav-link">Collections</a>
                    <a href="html/AboutUs.php" class="nav-link">About</a>
                    <a href="html/ContactForm.html" class="nav-link">Contact</a>
                    <a href="html/FAQ.php" class="nav-link">FAQ</a>
                </nav>
            </div>
            <div class="header-right">
                <?php if ($_SESSION['user_logged_in']): ?>
                    <span class="me-3" style="display: inline-flex; align-items: center;">
                        Hello, <strong class="ms-1"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?></strong>
                    </span>
                    <a href="?logout=true" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="html/login.php" class="nav-link">Sign In</a>
                    <a href="html/signup.php" class="signup-btn">Sign Up</a>
                <?php endif; ?>
                <a href="html/cart.php" class="cart-link">
                    <img src="https://cdn.builder.io/api/v1/image/assets/ce8c66c9a0c34d0f9a6ae9ddc010af6e/5e0645d417ccc7b0f84ef323887e2f0a37abc5a3?placeholderIfAbsent=true" alt="Shopping cart" class="cart-icon">
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 class="hero-title">Discover the Art of Fragrance</h1>
                <p class="hero-subtitle">
                    Immerse yourself in a world of handcrafted scents that tell stories, evoke emotions, and create lasting memories.
                </p>
                <div class="hero-buttons">
                    <a href="html/collections.html" class="hero-btn primary-btn">Explore Collections</a>
                    <a href="html/AboutUs.php" class="hero-btn secondary-btn">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Perfume Categories -->
    <section class="perfume-categories-section">
        <div class="container">
            <h2 class="section-title">Explore Our Perfume Categories</h2>
            <div class="perfume-categories-grid">
                <div class="perfume-category-row">
                    <div class="category-image-wrapper">
                        <img src="assets/EAUDE2.jpg" alt="Eau De Cologne" class="category-image">
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">Eau De Cologne</h3>
                        <p class="category-description">Fresh and light fragrances for every occasion.</p>
                        <a href="html/eaudecologneseasons.php" class="category-link">Learn More</a>
                    </div>
                </div>
                <div class="perfume-category-row">
                    <div class="category-image-wrapper">
                        <img src="assets/EAUDEPARFUM.jpg" alt="Eau De Parfum" class="category-image">
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">Eau De Parfum</h3>
                        <p class="category-description">Long-lasting scents with a touch of elegance.</p>
                        <a href="html/eaudeparfumseasons.php" class="category-link">Learn More</a>
                    </div>
                </div>
                <div class="perfume-category-row">
                    <div class="category-image-wrapper">
                        <img src="assets/EAUDETOILETTE.jpg" alt="Eau De Toilette" class="category-image">
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">Eau De Toilette</h3>
                        <p class="category-description">Perfect for daily wear with a subtle charm.</p>
                        <a href="html/eaudetoilette.php" class="category-link">Learn More</a>
                    </div>
                </div>
                <div class="perfume-category-row">
                    <div class="category-image-wrapper">
                        <img src="assets/EAUDEFRAICHE.jpg" alt="Eau De Fraiche" class="category-image">
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">Eau De Fraiche</h3>
                        <p class="category-description">Light and refreshing fragrances for a breezy feel.</p>
                        <a href="html/eaudefraiche.php" class="category-link">Learn More</a>
                    </div>
                </div>
                <div class="perfume-category-row">
                    <div class="category-image-wrapper">
                        <img src="assets/PARFUMEXTRAIT.jpg" alt="Parfum Extrait" class="category-image">
                    </div>
                    <div class="category-info">
                        <h3 class="category-title">Parfum Extrait</h3>
                        <p class="category-description">Intense and luxurious scents for special moments.</p>
                        <a href="html/parfumextraitseasons.php" class="category-link">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-container">
            <h2 class="newsletter-title">Subscribe to Our Newsletter</h2>
            <p class="newsletter-text">
                Stay updated with our latest collections and exclusive offers
            </p>
            <div id="newsletter-form-container">
                <form id="newsletter-form" class="newsletter-form">
                    <input
                        type="email"
                        id="email"
                        placeholder="Enter your email"
                        required
                        class="newsletter-input"
                        aria-label="Email address"
                    />
                    <button type="submit" class="newsletter-btn">Subscribe Now</button>
                </form>
            </div>
            <div id="thank-you-message" class="thank-you hidden">
                Thank you for subscribing!
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" style="width: 100%; background-color: #f9f9f9;">
        <div class="footer-content" style="max-width: 1280px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div class="footer-column">
                <div class="footer-section">
                    <h3 class="footer-heading">About Us</h3>
                    <p class="footer-text">
                        Crafting unique fragrances that tell stories and create memories.
                    </p>
                </div>
                <div class="footer-section">
                    <h3 class="footer-heading">Quick Links</h3>
                    <nav class="footer-nav">
                        <a href="html/collections.html" class="footer-link">Collections</a>
                        <a href="html/ContactForm.html" class="footer-link">Contact Us</a>
                    </nav>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-section">
                    <h3 class="footer-heading">Customer Care</h3>
                    <nav class="footer-nav">
                        <a href="#" class="footer-link">Shipping Info</a>
                        <a href="#" class="footer-link">Returns</a>
                        <a href="html/FAQ.php" class="footer-link">FAQ</a>
                    </nav>
                </div>
                <div class="footer-section">
                    <h3 class="footer-heading">Follow Us</h3>
                    <div class="social-links">
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-link">
                            <img src="assets/facebook.png" alt="Facebook" class="social-icon">
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-link">
                            <img src="assets/instagram.png" alt="Instagram" class="social-icon">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/home.js"></script>
</body>
</html>