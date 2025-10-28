<footer class="site-footer text-white pt-5 pb-3 bg-dark">
    <div class="container">
        <div class="row align-items-center mb-4">
            <!-- Branding -->
            <div class="col-lg-4 text-center text-lg-start mb-4 mb-lg-0">
                <h4 class="fw-bold text-uppercase mb-2"><?php bloginfo('name'); ?></h4>
                <p class="small text-secondary mb-0">
                    Your trusted online store for premium products.
                </p>
            </div>

            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                <h5 class="fw-semibold mb-3">Subscribe to our Newsletter</h5>
                <form id="newsletter-form"
                    class="newsletter-form d-flex flex-column flex-sm-row justify-content-center gap-2">
                    <input type="email" id="newsletter-email" class="form-control rounded-pill"
                        placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Subscribe</button>
                </form>
                <div id="newsletter-message" class="mt-2 small"></div>
            </div>


            <!-- Social Icons -->
            <div class="col-lg-4 text-center text-lg-end">
                <h6 class="fw-semibold mb-3">Follow Us</h6>
                <div class="d-flex justify-content-center justify-content-lg-end gap-3">
                    <a href="#" class="social-link text-white fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-link text-white fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-link text-white fs-4"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="social-link text-white fs-4"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary">

        <div class="text-center small text-secondary">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — All Rights Reserved.
        </div>
    </div>
</footer>


<!-- AOS (Animate On Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
        mirror: false,
    });
</script>



<?php wp_footer(); ?>
</body>

</html>