<?php
// ============================================================
//  ElegantTex — includes/footer.php
//  Shared footer + scripts block
// ============================================================
?>

<!-- ===== FOOTER ===== -->
<footer class="site-footer">
  <div class="container-fluid px-4">
    <div class="row g-4 py-5">

      <!-- Brand Column -->
      <div class="col-lg-3 col-md-6">
        <a href="<?= SITE_URL ?>/index.php" class="brand-logo mb-3 d-inline-flex">
          <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
          <span class="brand-text text-white">Elegant<strong>Tex</strong></span>
        </a>
        <p class="footer-desc">Bangladesh's #1 sofa &amp; furniture cover brand. Premium quality, affordable prices.</p>
        <div class="social-links mt-3">
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://wa.me/<?= preg_replace('/\D/', '', WHATSAPP) ?>" aria-label="WhatsApp" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
          <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h6 class="footer-heading">Quick Links</h6>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/index.php">Home</a></li>
          <li><a href="<?= SITE_URL ?>/best-selling.php">Best Selling</a></li>
          <li><a href="<?= SITE_URL ?>/wholesale.php">Wholesale</a></li>
          <li><a href="<?= SITE_URL ?>/new-collection.php">New Collection</a></li>
          <li><a href="<?= SITE_URL ?>/blog.php">Blog</a></li>
        </ul>
      </div>

      <!-- Categories -->
      <div class="col-lg-2 col-md-6">
        <h6 class="footer-heading">Categories</h6>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/category.php?cat=sofa-cover">Sofa Cover</a></li>
          <li><a href="<?= SITE_URL ?>/category.php?cat=chair-cover">Chair Cover</a></li>
          <li><a href="<?= SITE_URL ?>/category.php?cat=table-covers">Table Covers</a></li>
          <li><a href="<?= SITE_URL ?>/category.php?cat=ac-covers">AC Covers</a></li>
          <li><a href="<?= SITE_URL ?>/category.php?cat=carpet">Carpet</a></li>
        </ul>
      </div>

      <!-- Policy -->
      <div class="col-lg-2 col-md-6">
        <h6 class="footer-heading">Policy</h6>
        <ul class="footer-links">
          <li><a href="<?= SITE_URL ?>/privacy.php">Privacy Policy</a></li>
          <li><a href="<?= SITE_URL ?>/terms.php">Terms &amp; Conditions</a></li>
          <li><a href="<?= SITE_URL ?>/refund.php">Refund Policy</a></li>
          <li><a href="<?= SITE_URL ?>/shipping.php">Shipping Info</a></li>
          <li><a href="<?= SITE_URL ?>/faq.php">FAQs</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-3">
        <h6 class="footer-heading">Contact Us</h6>
        <p><i class="fa-solid fa-phone me-2 text-primary"></i><?= HELPLINE ?></p>
        <p><i class="fa-brands fa-whatsapp me-2 text-success"></i><?= WHATSAPP ?></p>
        <p><i class="fa-solid fa-envelope me-2 text-primary"></i><?= SITE_EMAIL ?></p>
        <p><i class="fa-solid fa-location-dot me-2 text-primary"></i>Dhaka, Bangladesh</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/<?= preg_replace('/\D/', '', WHATSAPP) ?>" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<!-- Cart Toast Notification -->
<div class="cart-toast" id="cartToast">
  <i class="fa-solid fa-check-circle me-2"></i> Added to cart!
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>
</html>