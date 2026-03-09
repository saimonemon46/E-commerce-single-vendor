<?php include 'includes/header.php'; ?>

    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
      <div class="container-fluid px-4">
        <a href="index.html">Home</a>
        <span>›</span>
        <span id="breadcrumbCat">Category Name</span>
      </div>
    </div>

    <!-- Main Content -->
    <main class="py-4">
      <div class="container-fluid px-4">
        <div class="row g-3">
          <!-- Sidebar Filter -->
          <?php include 'includes/sidebar.php'; ?>

          <!-- Products Area -->
          <div class="col-lg-10">
            <!-- Products Header -->
            <div class="products-header">
              <div>
                <h5 class="section-title mb-0" id="catTitle">Category Name</h5>
                <p class="products-count mt-1"><strong id="productCountDisplay">0</strong> products found</p>
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
              <!-- Populated by JS -->
            </div>

            <!-- Products Grid -->
            <div class="row g-3" id="categoryProducts">
              <!-- Populated by JS -->
            </div>

            <!-- Pagination -->
            <nav>
              <ul class="pagination" id="pagination">
                <!-- Populated by JS -->
              </ul>
            </nav>

<!-- Announcement Bar -->
<?php include 'includes/announce.php'; ?>

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
    <a href="index.php">Home</a>
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

<?php include 'includes/footer.php'; ?>
