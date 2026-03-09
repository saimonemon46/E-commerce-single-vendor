<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Category – ElegantTex</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css"/>
  <style>
    /* ---- Category Page Extras ---- */
    .page-breadcrumb {
      background: var(--bg-light);
      padding: 12px 0;
      border-bottom: 1px solid var(--border);
      font-size: 13px;
    }
    .page-breadcrumb a { color: var(--primary); font-weight: 600; }
    .page-breadcrumb span { color: var(--text-muted); margin: 0 6px; }

    .filter-sidebar {
      background: var(--white);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 20px;
      box-shadow: var(--shadow);
      position: sticky;
      top: 80px;
    }
    .filter-title {
      font-family: 'Playfair Display', serif;
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 16px;
      padding-bottom: 8px;
      border-bottom: 2px solid var(--primary);
      color: var(--dark);
    }
    .filter-group { margin-bottom: 20px; }
    .filter-group-label {
      font-weight: 800;
      font-size: 13px;
      color: var(--dark);
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
    }
    .filter-group-label i { font-size: 11px; color: var(--text-muted); }
    .filter-option {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 8px;
      font-size: 13px;
      cursor: pointer;
      color: var(--text);
      transition: var(--transition);
    }
    .filter-option:hover { color: var(--primary); }
    .filter-option input[type="checkbox"] { accent-color: var(--primary); width: 15px; height: 15px; }
    .filter-count { color: var(--text-muted); font-size: 12px; margin-left: auto; }

    .price-range-inputs { display: flex; gap: 8px; align-items: center; }
    .price-range-inputs input {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 6px 10px;
      font-size: 13px;
      outline: none;
    }
    .price-range-inputs input:focus { border-color: var(--primary); }
    .apply-filter-btn {
      width: 100%;
      background: var(--primary);
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-weight: 800;
      cursor: pointer;
      transition: var(--transition);
      font-size: 14px;
    }
    .apply-filter-btn:hover { background: var(--primary-dark); }

    .products-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
      flex-wrap: wrap;
      gap: 10px;
    }
    .products-count { font-size: 14px; color: var(--text-muted); }
    .products-count strong { color: var(--dark); }
    .sort-select {
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 8px 12px;
      font-size: 13px;
      outline: none;
      font-family: 'Nunito', sans-serif;
      cursor: pointer;
    }
    .sort-select:focus { border-color: var(--primary); }

    .view-toggle { display: flex; gap: 4px; }
    .view-btn {
      width: 34px; height: 34px;
      border: 1px solid var(--border);
      background: var(--white);
      border-radius: 6px;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      color: var(--text-muted);
      transition: var(--transition);
    }
    .view-btn.active,
    .view-btn:hover { background: var(--primary); color: #fff; border-color: var(--primary); }

    /* Pagination */
    .pagination { margin-top: 24px; justify-content: center; }
    .page-link {
      color: var(--primary);
      border-color: var(--border);
      font-weight: 700;
      border-radius: 6px !important;
      margin: 0 2px;
    }
    .page-item.active .page-link { background: var(--primary); border-color: var(--primary); }
    .page-link:hover { background: var(--primary-light); color: var(--primary); }

    /* Active filters */
    .active-filters { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 12px; }
    .active-filter-tag {
      background: var(--primary-light);
      color: var(--primary);
      border: 1px solid rgba(255,4,158,0.2);
      border-radius: 20px;
      padding: 4px 12px;
      font-size: 12px;
      font-weight: 700;
      display: flex; align-items: center; gap: 6px;
    }
    .active-filter-tag i { cursor: pointer; }
    .active-filter-tag i:hover { color: var(--primary-dark); }
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
    <div class="row g-0 align-items-stretch">
      <div class="col-auto">
        <div class="category-toggle" id="categoryToggle">
          <i class="fa-solid fa-bars me-2"></i> Categories
          <i class="fa-solid fa-chevron-down ms-2 small"></i>
        </div>
        <div class="category-dropdown" id="categoryDropdown">
          <a href="category.html?cat=sofa-cover"><i class="fa-solid fa-couch me-2"></i>Sofa Cover</a>
          <a href="category.html?cat=chair-cover"><i class="fa-solid fa-chair me-2"></i>Chair Cover</a>
          <a href="category.html?cat=table-covers"><i class="fa-solid fa-table me-2"></i>Table Covers</a>
          <a href="category.html?cat=dining-combo"><i class="fa-solid fa-utensils me-2"></i>Dining Combo (3D)</a>
          <a href="category.html?cat=ac-covers"><i class="fa-solid fa-wind me-2"></i>AC Covers</a>
          <a href="category.html?cat=tv-covers"><i class="fa-solid fa-tv me-2"></i>TV Covers</a>
          <a href="category.html?cat=cushion-covers"><i class="fa-solid fa-circle me-2"></i>Cushion Covers</a>
          <a href="category.html?cat=carpet"><i class="fa-solid fa-rug me-2"></i>Carpet</a>
        </div>
      </div>
      <div class="col nav-links-wrapper">
        <ul class="nav-links">
          <li><a href="index.html">Home</a></li>
          <li><a href="best-selling.html">Best Selling</a></li>
          <li><a href="wholesale.html">Wholesale</a></li>
          <li><a href="new-collection.html">New Collection</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="blog.html">Blog</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- Breadcrumb -->
<div class="page-breadcrumb">
  <div class="container-fluid px-4">
    <a href="index.html">Home</a>
    <span>›</span>
    <span id="breadcrumbCat">Sofa Cover</span>
  </div>
</div>

<!-- Main Content -->
<main class="py-4">
  <div class="container-fluid px-4">
    <div class="row g-3">

      <!-- Sidebar Filter -->
      <div class="col-lg-2 d-none d-lg-block">
        <div class="filter-sidebar">
          <div class="filter-title"><i class="fa-solid fa-sliders me-2"></i>Filters</div>

          <!-- Category Filter -->
          <div class="filter-group">
            <div class="filter-group-label">Category <i class="fa-solid fa-chevron-down"></i></div>
            <label class="filter-option"><input type="checkbox" checked> Sofa Cover <span class="filter-count">24</span></label>
            <label class="filter-option"><input type="checkbox"> Chair Cover <span class="filter-count">18</span></label>
            <label class="filter-option"><input type="checkbox"> Table Covers <span class="filter-count">12</span></label>
            <label class="filter-option"><input type="checkbox"> Dining Combo <span class="filter-count">8</span></label>
            <label class="filter-option"><input type="checkbox"> AC Covers <span class="filter-count">6</span></label>
          </div>

          <!-- Price Filter -->
          <div class="filter-group">
            <div class="filter-group-label">Price Range <i class="fa-solid fa-chevron-down"></i></div>
            <div class="price-range-inputs">
              <input type="number" placeholder="Min ৳" id="priceMin"/>
              <span>–</span>
              <input type="number" placeholder="Max ৳" id="priceMax"/>
            </div>
          </div>

          <!-- Discount Filter -->
          <div class="filter-group">
            <div class="filter-group-label">Discount <i class="fa-solid fa-chevron-down"></i></div>
            <label class="filter-option"><input type="checkbox"> 10% or more</label>
            <label class="filter-option"><input type="checkbox"> 15% or more</label>
            <label class="filter-option"><input type="checkbox"> 20% or more</label>
          </div>

          <!-- Rating Filter -->
          <div class="filter-group">
            <div class="filter-group-label">Rating <i class="fa-solid fa-chevron-down"></i></div>
            <label class="filter-option"><input type="checkbox"> ⭐⭐⭐⭐⭐ (5)</label>
            <label class="filter-option"><input type="checkbox"> ⭐⭐⭐⭐+ (4+)</label>
            <label class="filter-option"><input type="checkbox"> ⭐⭐⭐+ (3+)</label>
          </div>

          <button class="apply-filter-btn" id="applyFilter">Apply Filters</button>
        </div>
      </div>

      <!-- Products Area -->
      <div class="col-lg-10">
        <!-- Products Header -->
        <div class="products-header">
          <div>
            <h5 class="section-title mb-0" id="catTitle">Sofa Cover</h5>
            <p class="products-count mt-1"><strong id="productCountDisplay">24</strong> products found</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <select class="sort-select" id="sortSelect">
              <option value="default">Default Sorting</option>
              <option value="price_asc">Price: Low to High</option>
              <option value="price_desc">Price: High to Low</option>
              <option value="discount">Highest Discount</option>
              <option value="rating">Best Rated</option>
              <option value="newest">Newest First</option>
            </select>
            <div class="view-toggle">
              <button class="view-btn active" id="gridView" title="Grid View"><i class="fa-solid fa-grip"></i></button>
              <button class="view-btn" id="listView" title="List View"><i class="fa-solid fa-list"></i></button>
            </div>
          </div>
        </div>

        <!-- Active Filters -->
        <div class="active-filters" id="activeFilters">
          <div class="active-filter-tag">Sofa Cover <i class="fa-solid fa-xmark"></i></div>
          <div class="active-filter-tag">15% OFF <i class="fa-solid fa-xmark"></i></div>
        </div>

        <!-- Products Grid -->
        <div class="row g-3" id="categoryProducts">
          <!-- Populated by JS -->
        </div>

        <!-- Pagination -->
        <nav>
          <ul class="pagination" id="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">‹</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">›</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</main>

<!-- WhatsApp Float -->
<a href="https://wa.me/8801896224057" class="whatsapp-float" target="_blank">
  <i class="fa-brands fa-whatsapp"></i>
</a>
<div class="cart-toast" id="cartToast"><i class="fa-solid fa-check-circle me-2"></i>Added to cart!</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
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
