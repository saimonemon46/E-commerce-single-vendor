    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
      <div class="container-fluid px-4">
        <div class="row g-4 py-5">
          <div class="col-lg-3 col-md-6">
            <a href="index.html" class="brand-logo mb-3 d-inline-flex">
              <span class="brand-icon"
                ><i class="fa-solid fa-layer-group"></i
              ></span>
              <span class="brand-text text-white">Elegant<strong>Tex</strong></span>
            </a>
            <p class="footer-desc">
              Bangladesh's #1 sofa & furniture cover brand. Premium quality,
              affordable prices.
            </p>
            <div class="social-links mt-3">
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <h6 class="footer-heading">Quick Links</h6>
            <ul class="footer-links">
              <li><a href="index.html">Home</a></li>
              <li><a href="best-selling.html">Best Selling</a></li>
              <li><a href="wholesale.html">Wholesale</a></li>
              <li><a href="new-collection.html">New Collection</a></li>
              <li><a href="blog.html">Blog</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6">
            <h6 class="footer-heading">Categories</h6>
            <ul class="footer-links">
              <li><a href="category.html?cat=sofa-cover">Sofa Cover</a></li>
              <li><a href="category.html?cat=chair-cover">Chair Cover</a></li>
              <li><a href="category.html?cat=table-covers">Table Covers</a></li>
              <li><a href="category.html?cat=ac-covers">AC Covers</a></li>
              <li><a href="category.html?cat=carpet">Carpet</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6">
            <h6 class="footer-heading">Policy</h6>
            <ul class="footer-links">
              <li><a href="privacy.html">Privacy Policy</a></li>
              <li><a href="terms.html">Terms & Conditions</a></li>
              <li><a href="refund.html">Refund Policy</a></li>
              <li><a href="shipping.html">Shipping Info</a></li>
              <li><a href="faq.html">FAQs</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h6 class="footer-heading">Contact Us</h6>
            <p><i class="fa-solid fa-phone me-2 text-primary"></i>+8801896224057</p>
            <p>
              <i class="fa-brands fa-whatsapp me-2 text-success"></i>+8801896224057
            </p>
            <p>
              <i class="fa-solid fa-envelope me-2 text-primary"></i
              >info@eleganttex.com.bd
            </p>
            <p>
              <i class="fa-solid fa-location-dot me-2 text-primary"></i>Dhaka,
              Bangladesh
            </p>
          </div>
        </div>
        <div class="footer-bottom">
          <p>
            &copy; 2025 ElegantTex. All rights reserved. Developed by
            <a href="#">WebDev BD</a>
          </p>
        </div>
      </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/8801622015799" class="whatsapp-float" target="_blank">
      <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Cart Toast -->
    <div class="cart-toast" id="cartToast">
      <i class="fa-solid fa-check-circle me-2"></i> Added to cart!
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        // Render all products in category page
        const container = document.getElementById('categoryProducts');
        if (container) {
          container.innerHTML = PRODUCTS.map(buildProductCard).join('');
        }
        // View toggle
        document.getElementById('gridView').addEventListener('click', function() {
          this.classList.add('active');
          document.getElementById('listView').classList.remove('active');
        });
        document.getElementById('listView').addEventListener('click', function() {
          this.classList.add('active');
          document.getElementById('gridView').classList.remove('active');
        });
        // Sort
        document.getElementById('sortSelect').addEventListener('change', function() {
          // Placeholder for sort logic / AJAX call
          console.log('Sort by:', this.value);
        });
      });
  </script>
  </body>
</html>
