<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Detail – ElegantTex</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css"/>
  <style>
    .page-breadcrumb { background:var(--bg-light); padding:12px 0; border-bottom:1px solid var(--border); font-size:13px; }
    .page-breadcrumb a { color:var(--primary); font-weight:600; }
    .page-breadcrumb span { color:var(--text-muted); margin:0 6px; }

    /* Product Gallery */
    .product-main-img {
      background: var(--bg-light);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      height: 420px;
      display: flex; align-items: center; justify-content: center;
      font-size: 120px;
      margin-bottom: 12px;
      overflow: hidden;
      position: relative;
    }
    .product-badge-detail {
      position: absolute; top: 16px; left: 16px;
      background: var(--primary); color: #fff;
      font-size: 13px; font-weight: 900;
      padding: 5px 14px; border-radius: 20px;
    }
    .product-thumbs { display: flex; gap: 10px; }
    .product-thumb {
      width: 72px; height: 72px;
      background: var(--bg-light);
      border-radius: 8px;
      border: 2px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      font-size: 30px;
      cursor: pointer;
      transition: var(--transition);
    }
    .product-thumb.active,
    .product-thumb:hover { border-color: var(--primary); }

    /* Product Info */
    .product-detail-card {
      background: var(--white);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 28px;
      box-shadow: var(--shadow);
    }
    .product-detail-name {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      color: var(--dark);
      margin-bottom: 8px;
    }
    .product-detail-rating { color: var(--warning); font-size: 15px; margin-bottom: 12px; }
    .product-detail-rating span { color: var(--text-muted); font-size: 13px; margin-left: 6px; }
    .product-detail-price { margin-bottom: 16px; }
    .detail-price-new { color: var(--primary); font-size: 32px; font-weight: 900; }
    .detail-price-old { color: var(--text-muted); font-size: 18px; text-decoration: line-through; margin-left: 8px; }
    .detail-price-discount {
      background: var(--primary-light);
      color: var(--primary);
      font-size: 13px; font-weight: 800;
      padding: 3px 10px; border-radius: 20px;
      margin-left: 10px;
      display: inline-block;
    }
    .divider { border: none; border-top: 1px solid var(--border); margin: 16px 0; }

    /* Options */
    .option-label { font-weight: 800; font-size: 13px; color: var(--dark); margin-bottom: 8px; }
    .color-options { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 16px; }
    .color-opt {
      width: 36px; height: 36px;
      border-radius: 50%;
      cursor: pointer;
      border: 3px solid transparent;
      transition: var(--transition);
    }
    .color-opt:hover, .color-opt.active { border-color: var(--dark); transform: scale(1.15); }
    .size-options { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
    .size-opt {
      border: 2px solid var(--border);
      border-radius: 6px;
      padding: 7px 16px;
      font-size: 13px; font-weight: 700;
      cursor: pointer;
      color: var(--text);
      transition: var(--transition);
      background: var(--white);
    }
    .size-opt:hover, .size-opt.active { border-color: var(--primary); color: var(--primary); background: var(--primary-light); }
    .size-opt.disabled { opacity: 0.4; cursor: not-allowed; text-decoration: line-through; }

    /* Quantity */
    .qty-wrapper { display: flex; align-items: center; gap: 0; }
    .qty-btn {
      width: 38px; height: 42px;
      background: var(--bg-light);
      border: 1px solid var(--border);
      font-size: 18px; font-weight: 700;
      cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      transition: var(--transition);
    }
    .qty-btn:first-child { border-radius: 8px 0 0 8px; }
    .qty-btn:last-child { border-radius: 0 8px 8px 0; }
    .qty-btn:hover { background: var(--primary); color: #fff; border-color: var(--primary); }
    .qty-input {
      width: 60px; height: 42px;
      border: 1px solid var(--border);
      border-left: none; border-right: none;
      text-align: center;
      font-size: 16px; font-weight: 700;
      outline: none;
      font-family: 'Nunito', sans-serif;
    }

    /* CTA Buttons */
    .cta-buttons { display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
    .btn-add-cart {
      flex: 1; min-width: 160px;
      background: var(--primary); color: #fff;
      border: none; border-radius: 8px;
      padding: 13px 20px;
      font-size: 15px; font-weight: 800;
      cursor: pointer;
      transition: var(--transition);
    }
    .btn-add-cart:hover { background: var(--primary-dark); transform: translateY(-2px); }
    .btn-buy-now {
      flex: 1; min-width: 160px;
      background: var(--dark); color: #fff;
      border: none; border-radius: 8px;
      padding: 13px 20px;
      font-size: 15px; font-weight: 800;
      cursor: pointer;
      transition: var(--transition);
    }
    .btn-buy-now:hover { background: #333; }
    .btn-wishlist {
      width: 48px; height: 48px;
      border: 2px solid var(--border);
      background: var(--white);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; color: var(--text-muted);
      cursor: pointer;
      transition: var(--transition);
    }
    .btn-wishlist:hover { border-color: #ef486a; color: #ef486a; }

    /* Meta info */
    .product-meta { font-size: 13px; color: var(--text-muted); }
    .product-meta span { color: var(--dark); font-weight: 700; }

    /* Stock indicator */
    .stock-badge {
      display: inline-flex; align-items: center; gap: 6px;
      font-size: 13px; font-weight: 700;
      margin-bottom: 16px;
    }
    .stock-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: #28a745;
      animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
    .stock-badge.in-stock { color: #28a745; }
    .stock-badge.low-stock .stock-dot { background: var(--warning); }
    .stock-badge.low-stock { color: #e6a800; }

    /* Tabs */
    .product-tabs { margin-top: 32px; }
    .nav-tabs .nav-link {
      color: var(--text-muted);
      font-weight: 700;
      border: none;
      border-bottom: 3px solid transparent;
      padding: 12px 20px;
      border-radius: 0;
    }
    .nav-tabs .nav-link.active {
      color: var(--primary);
      border-bottom-color: var(--primary);
      background: none;
    }
    .tab-content { padding: 24px 0; }
    .tab-content p { color: var(--text-muted); line-height: 1.8; }

    /* Reviews */
    .review-card {
      background: var(--bg-light);
      border-radius: var(--radius);
      padding: 16px;
      margin-bottom: 12px;
    }
    .reviewer-name { font-weight: 800; color: var(--dark); }
    .review-date { font-size: 12px; color: var(--text-muted); }
    .review-text { font-size: 13px; color: var(--text); margin-top: 6px; }
    .review-stars { color: var(--warning); font-size: 13px; }
  </style>
</head>
<body>

<!-- Announcement Bar -->
<div class="announcement-bar">
  <div class="announcement-inner">
    <i class="fa-solid fa-couch me-2"></i>
    GET UPTO 17% DISCOUNT RIGHT NOW &nbsp;|&nbsp; USE CODE: <strong>ELEGANT17</strong>
    <i class="fa-solid fa-couch ms-2"></i>
  </div>
</div>

<!-- Header -->
<header class="site-header">
  <div class="container-fluid px-4">
    <div class="row align-items-center py-2 g-2">
      <div class="col-auto">
        <a href="index.html" class="brand-logo">
          <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
          <span class="brand-text">Elegant<strong>Tex</strong></span>
        </a>
      </div>
      <div class="col">
        <div class="search-wrapper">
          <input type="text" class="form-control search-input" placeholder="I am shopping for..."/>
          <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
      <div class="col-auto header-actions">
        <a href="login.html" class="btn btn-outline-primary btn-sm ms-3"><i class="fa-regular fa-user me-1"></i>Login</a>
        <a href="register.html" class="btn btn-primary btn-sm ms-2">Register</a>
        <a href="cart.html" class="cart-icon ms-3">
          <i class="fa-solid fa-cart-shopping"></i>
          <span class="cart-badge">0</span>
        </a>
      </div>
    </div>
  </div>
</header>

<!-- Navbar -->
<nav class="main-nav">
  <div class="container-fluid px-4">
    <ul class="nav-links py-0" style="padding-left:8px">
      <li><a href="index.html">Home</a></li>
      <li><a href="best-selling.html">Best Selling</a></li>
      <li><a href="wholesale.html">Wholesale</a></li>
      <li><a href="new-collection.html">New Collection</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </div>
</nav>

<!-- Breadcrumb -->
<div class="page-breadcrumb">
  <div class="container-fluid px-4">
    <a href="index.html">Home</a><span>›</span>
    <a href="category.html?cat=sofa-cover">Sofa Cover</a><span>›</span>
    <span>Flower Print Sofa Cover</span>
  </div>
</div>

<!-- Product Detail -->
<main class="py-4">
  <div class="container-fluid px-4">
    <div class="row g-4">
      <!-- Gallery -->
      <div class="col-lg-5">
        <div class="product-main-img">
          <span>🛋️</span>
          <span class="product-badge-detail">-17%</span>
        </div>
        <div class="product-thumbs">
          <div class="product-thumb active">🛋️</div>
          <div class="product-thumb">🌸</div>
          <div class="product-thumb">🎨</div>
          <div class="product-thumb">🏠</div>
        </div>
      </div>

      <!-- Product Info -->
      <div class="col-lg-7">
        <div class="product-detail-card">
          <h1 class="product-detail-name">Flower Print Sofa Cover</h1>
          <div class="product-detail-rating">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <span>4.9 (76 reviews)</span>
          </div>
          <div class="stock-badge in-stock">
            <span class="stock-dot"></span> In Stock (24 units)
          </div>
          <div class="product-detail-price">
            <span class="detail-price-new">৳2,500.00</span>
            <span class="detail-price-old">৳3,000.00</span>
            <span class="detail-price-discount">Save 17%</span>
          </div>
          <hr class="divider"/>

          <!-- Color Options -->
          <div class="option-label">Color: <strong>Floral Pink</strong></div>
          <div class="color-options">
            <div class="color-opt active" style="background:#FF6B8A" title="Floral Pink"></div>
            <div class="color-opt" style="background:#6B8AFF" title="Blue Floral"></div>
            <div class="color-opt" style="background:#8AFF6B" title="Green Garden"></div>
            <div class="color-opt" style="background:#FFD700" title="Golden Sun"></div>
            <div class="color-opt" style="background:#9B59B6" title="Lavender"></div>
          </div>

          <!-- Size Options -->
          <div class="option-label">Size:</div>
          <div class="size-options">
            <div class="size-opt">1 Seater</div>
            <div class="size-opt active">2 Seater</div>
            <div class="size-opt">3 Seater</div>
            <div class="size-opt">L-Shape</div>
            <div class="size-opt disabled">5 Seater</div>
          </div>

          <hr class="divider"/>

          <!-- Quantity -->
          <div class="option-label">Quantity:</div>
          <div class="qty-wrapper mb-3">
            <button class="qty-btn" id="qtyMinus">−</button>
            <input type="number" class="qty-input" value="1" min="1" max="99" id="qtyInput" readonly/>
            <button class="qty-btn" id="qtyPlus">+</button>
          </div>

          <!-- CTA Buttons -->
          <div class="cta-buttons">
            <button class="btn-add-cart" onclick="addToCart(4)">
              <i class="fa-solid fa-cart-plus me-2"></i>Add to Cart
            </button>
            <button class="btn-buy-now" onclick="window.location='checkout.html'">
              <i class="fa-solid fa-bolt me-2"></i>Buy Now
            </button>
            <button class="btn-wishlist"><i class="fa-regular fa-heart"></i></button>
          </div>

          <hr class="divider"/>

          <!-- Meta -->
          <div class="product-meta">
            <p>SKU: <span>ET-SF-FP-001</span></p>
            <p>Category: <span><a href="category.html?cat=sofa-cover" style="color:var(--primary)">Sofa Cover</a></span></p>
            <p>Material: <span>Premium Velvet / Jacquard</span></p>
            <p class="mt-2">
              <i class="fa-solid fa-share-nodes me-1" style="color:var(--primary)"></i>
              Share:
              <a href="#" class="ms-2" style="color:#1877f2"><i class="fa-brands fa-facebook"></i></a>
              <a href="#" class="ms-2" style="color:#e1306c"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="ms-2" style="color:#25D366"><i class="fa-brands fa-whatsapp"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Tabs -->
    <div class="product-tabs mt-4">
      <ul class="nav nav-tabs" id="productTabs">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabDesc">Description</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabSpec">Specifications</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabReviews">Reviews (76)</button></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tabDesc">
          <p>This beautiful <strong>Flower Print Sofa Cover</strong> by ElegantTex is crafted from high-quality stretch fabric that fits most standard sofas snugly. The vibrant floral pattern adds an elegant touch to any living room while protecting your sofa from dust, pet hair, and everyday wear.</p>
          <ul style="color:var(--text-muted);line-height:2">
            <li>Machine washable at 30°C</li>
            <li>Universal stretch fit for 2, 3, or L-shaped sofas</li>
            <li>Anti-slip bottom coating</li>
            <li>Fade-resistant dye technology</li>
            <li>Available in 5 stunning colors</li>
          </ul>
        </div>
        <div class="tab-pane fade" id="tabSpec">
          <table class="table table-bordered" style="font-size:14px">
            <tbody>
              <tr><td style="font-weight:700;width:35%">Material</td><td>Premium Velvet / Jacquard Polyester</td></tr>
              <tr><td style="font-weight:700">Sizes Available</td><td>1-Seater, 2-Seater, 3-Seater, L-Shape</td></tr>
              <tr><td style="font-weight:700">Washing</td><td>Machine washable, 30°C</td></tr>
              <tr><td style="font-weight:700">Stretchability</td><td>High (fits 90-140cm sofa width)</td></tr>
              <tr><td style="font-weight:700">Origin</td><td>Bangladesh</td></tr>
              <tr><td style="font-weight:700">Warranty</td><td>7 days return guarantee</td></tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="tabReviews">
          <div class="review-card">
            <div class="d-flex justify-content-between">
              <span class="reviewer-name">Fatima Rahman</span>
              <span class="review-date">12 Feb 2025</span>
            </div>
            <div class="review-stars">⭐⭐⭐⭐⭐</div>
            <p class="review-text">Excellent quality! The fabric feels very premium and the floral print is exactly as shown in the photos. Fits my 3-seater sofa perfectly. Highly recommend!</p>
          </div>
          <div class="review-card">
            <div class="d-flex justify-content-between">
              <span class="reviewer-name">Karim Ahmed</span>
              <span class="review-date">5 Jan 2025</span>
            </div>
            <div class="review-stars">⭐⭐⭐⭐</div>
            <p class="review-text">Very nice product. Delivery was fast and packaging was good. The cover transformed our old sofa completely. Will buy again!</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="section-header mt-4">
      <h3 class="section-title">Related Products</h3>
      <a href="category.html?cat=sofa-cover" class="section-link">View All</a>
    </div>
    <div class="row g-3" id="relatedProducts"></div>
  </div>
</main>

<a href="https://wa.me/8801896224057" class="whatsapp-float" target="_blank">
  <i class="fa-brands fa-whatsapp"></i>
</a>
<div class="cart-toast" id="cartToast"><i class="fa-solid fa-check-circle me-2"></i>Added to cart!</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Quantity
    const qtyInput = document.getElementById('qtyInput');
    document.getElementById('qtyMinus').addEventListener('click', () => {
      if (qtyInput.value > 1) qtyInput.value--;
    });
    document.getElementById('qtyPlus').addEventListener('click', () => {
      if (qtyInput.value < 99) qtyInput.value++;
    });
    // Color options
    document.querySelectorAll('.color-opt').forEach(c => {
      c.addEventListener('click', () => {
        document.querySelectorAll('.color-opt').forEach(x => x.classList.remove('active'));
        c.classList.add('active');
      });
    });
    // Size options
    document.querySelectorAll('.size-opt:not(.disabled)').forEach(s => {
      s.addEventListener('click', () => {
        document.querySelectorAll('.size-opt').forEach(x => x.classList.remove('active'));
        s.classList.add('active');
      });
    });
    // Thumbnails
    document.querySelectorAll('.product-thumb').forEach(t => {
      t.addEventListener('click', () => {
        document.querySelectorAll('.product-thumb').forEach(x => x.classList.remove('active'));
        t.classList.add('active');
      });
    });
    // Related products
    const related = document.getElementById('relatedProducts');
    if (related) {
      related.innerHTML = PRODUCTS.filter(p => p.category === 'sofa-cover').slice(0, 4).map(buildProductCard).join('');
    }
  });
</script>
</body>
</html>
