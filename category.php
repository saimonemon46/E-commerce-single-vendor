<?php
// ============================================================
//  ElegantTex — category.php  (Product Listing / Shop Page)
// ============================================================
require_once 'includes/config.php';

// Get current category slug from URL
$cat_slug  = isset($_GET['cat']) ? trim($_GET['cat']) : '';
$sort      = isset($_GET['sort']) ? $_GET['sort'] : 'default';
$price_min = isset($_GET['price_min']) ? (int)$_GET['price_min'] : 0;
$price_max = isset($_GET['price_max']) ? (int)$_GET['price_max'] : 99999;
$page      = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$per_page  = 12;

// Category meta map — replace with DB query
$cat_meta = [
    'sofa-cover'     => ['label' => 'Sofa Cover',               'count' => 24],
    'chair-cover'    => ['label' => 'Chair Cover',              'count' => 18],
    'table-covers'   => ['label' => 'Table Covers',             'count' => 12],
    'dining-combo'   => ['label' => 'Trendy Dining Combo (3D)', 'count' => 8],
    'ac-covers'      => ['label' => 'AC Covers',                'count' => 6],
    'tv-covers'      => ['label' => 'TV Covers',                'count' => 9],
    'cushion-covers' => ['label' => 'Cushion Covers',           'count' => 15],
    'carpet'         => ['label' => 'Carpet',                   'count' => 11],
];
$current_cat   = $cat_meta[$cat_slug] ?? ['label' => 'All Products', 'count' => 0];
$page_title    = $current_cat['label'];
$active_nav    = '';

// Mock products — replace with DB query + filters
$all_products = [
    ['id'=>1,  'name'=>'Velvet Chair Cover Coffee',       'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.5,'reviews'=>32, 'emoji'=>'🪑','category'=>'chair-cover'],
    ['id'=>2,  'name'=>'Velvet Chair Cover Royal Blue',   'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.8,'reviews'=>48, 'emoji'=>'🪑','category'=>'chair-cover'],
    ['id'=>3,  'name'=>'Velvet Chair Cover Deep Purple',  'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.6,'reviews'=>21, 'emoji'=>'🪑','category'=>'chair-cover'],
    ['id'=>4,  'name'=>'Flower Print Sofa Cover',         'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.9,'reviews'=>76, 'emoji'=>'🛋️','category'=>'sofa-cover'],
    ['id'=>5,  'name'=>'White Pint Sofa Cover',           'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.7,'reviews'=>54, 'emoji'=>'🛋️','category'=>'sofa-cover'],
    ['id'=>6,  'name'=>'Blue Pint Sofa Cover',            'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.8,'reviews'=>63, 'emoji'=>'🛋️','category'=>'sofa-cover'],
    ['id'=>7,  'name'=>'3D Dining Table Cover Set',       'price'=>3200,'compare_price'=>4000,'discount_pct'=>20,'badge'=>'New', 'badge_type'=>'new', 'rating'=>4.9,'reviews'=>89, 'emoji'=>'🍽️','category'=>'dining-combo'],
    ['id'=>8,  'name'=>'Floral Cushion Cover (Set 4)',    'price'=>1200,'compare_price'=>1500,'discount_pct'=>20,'badge'=>'-20%','badge_type'=>'sale','rating'=>4.6,'reviews'=>44, 'emoji'=>'🛏️','category'=>'cushion-covers'],
    ['id'=>9,  'name'=>'AC Cover Dust Guard',             'price'=>800, 'compare_price'=>1000,'discount_pct'=>20,'badge'=>'-20%','badge_type'=>'sale','rating'=>4.4,'reviews'=>28, 'emoji'=>'❄️','category'=>'ac-covers'],
    ['id'=>10, 'name'=>'Geometric Carpet 5x7ft',          'price'=>4500,'compare_price'=>5500,'discount_pct'=>18,'badge'=>'-18%','badge_type'=>'sale','rating'=>4.8,'reviews'=>37, 'emoji'=>'🏡','category'=>'carpet'],
    ['id'=>11, 'name'=>'TV Cover Dust Protector 43"',     'price'=>600, 'compare_price'=>750, 'discount_pct'=>20,'badge'=>'-20%','badge_type'=>'sale','rating'=>4.3,'reviews'=>19, 'emoji'=>'📺','category'=>'tv-covers'],
    ['id'=>12, 'name'=>'Table Runner Embroidered',        'price'=>950, 'compare_price'=>1100,'discount_pct'=>14,'badge'=>'New', 'badge_type'=>'new', 'rating'=>4.5,'reviews'=>31, 'emoji'=>'🎨','category'=>'table-covers'],
];

// Filter by category
$products = $cat_slug
    ? array_values(array_filter($all_products, fn($p) => $p['category'] === $cat_slug))
    : $all_products;

// Filter by price
$products = array_values(array_filter($products, fn($p) => $p['price'] >= $price_min && $p['price'] <= $price_max));

// Sort
usort($products, function($a, $b) use ($sort) {
    return match($sort) {
        'price_asc'  => $a['price'] <=> $b['price'],
        'price_desc' => $b['price'] <=> $a['price'],
        'discount'   => $b['discount_pct'] <=> $a['discount_pct'],
        'rating'     => $b['rating'] <=> $a['rating'],
        default      => 0,
    };
});

$total_products = count($products);
$total_pages    = max(1, ceil($total_products / $per_page));
$products       = array_slice($products, ($page - 1) * $per_page, $per_page);

$breadcrumbs = [
    ['label' => 'Home',                  'href' => SITE_URL.'/index.php'],
    ['label' => $current_cat['label']],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<main class="py-4">
  <div class="container-fluid px-4">
    <div class="row g-3">

      <!-- Filter Sidebar -->
      <div class="col-lg-2 d-none d-lg-block">
        <form method="GET" action="<?= SITE_URL ?>/category.php" id="filterForm">
          <input type="hidden" name="cat" value="<?= htmlspecialchars($cat_slug) ?>">
          <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">
          <div class="filter-sidebar">
            <div class="filter-title"><i class="fa-solid fa-sliders me-2"></i>Filters</div>

            <!-- Category -->
            <div class="filter-group">
              <div class="filter-group-label">Category <i class="fa-solid fa-chevron-down"></i></div>
              <?php foreach ($cat_meta as $slug => $meta): ?>
              <label class="filter-option">
                <input type="radio" name="cat" value="<?= $slug ?>"
                       <?= $cat_slug === $slug ? 'checked' : '' ?>
                       onchange="document.getElementById('filterForm').submit()">
                <?= $meta['label'] ?>
                <span class="filter-count"><?= $meta['count'] ?></span>
              </label>
              <?php endforeach; ?>
            </div>

            <!-- Price Range -->
            <div class="filter-group">
              <div class="filter-group-label">Price Range <i class="fa-solid fa-chevron-down"></i></div>
              <div class="price-range-inputs">
                <input type="number" name="price_min" placeholder="Min ৳" value="<?= $price_min ?: '' ?>"/>
                <span>–</span>
                <input type="number" name="price_max" placeholder="Max ৳" value="<?= $price_max < 99999 ? $price_max : '' ?>"/>
              </div>
            </div>

            <!-- Sort (mirrored in sidebar) -->
            <div class="filter-group">
              <div class="filter-group-label">Sort By <i class="fa-solid fa-chevron-down"></i></div>
              <?php $sort_opts = ['default'=>'Default','price_asc'=>'Price: Low→High','price_desc'=>'Price: High→Low','discount'=>'Highest Discount','rating'=>'Best Rated']; ?>
              <?php foreach ($sort_opts as $val => $label): ?>
              <label class="filter-option">
                <input type="radio" name="sort" value="<?= $val ?>" <?= $sort === $val ? 'checked' : '' ?>
                       onchange="document.getElementById('filterForm').submit()">
                <?= $label ?>
              </label>
              <?php endforeach; ?>
            </div>

            <button type="submit" class="apply-filter-btn">Apply Filters</button>
            <a href="<?= SITE_URL ?>/category.php<?= $cat_slug ? '?cat='.$cat_slug : '' ?>" class="d-block text-center mt-2" style="font-size:12px;color:var(--text-muted)">
              Clear Filters
            </a>
          </div>
        </form>
      </div>

      <!-- Products Area -->
      <div class="col-lg-10">

        <!-- Products Header -->
        <div class="products-header">
          <div>
            <h5 class="section-title mb-0"><?= htmlspecialchars($current_cat['label']) ?></h5>
            <p class="products-count mt-1"><strong><?= $total_products ?></strong> products found</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <select class="sort-select" onchange="window.location.href=this.value">
              <?php foreach ($sort_opts as $val => $label):
                $url = SITE_URL.'/category.php?'.http_build_query(array_merge($_GET, ['sort'=>$val, 'page'=>1]));
              ?>
              <option value="<?= $url ?>" <?= $sort === $val ? 'selected' : '' ?>><?= $label ?></option>
              <?php endforeach; ?>
            </select>
            <div class="view-toggle">
              <button class="view-btn active" id="gridView" title="Grid View"><i class="fa-solid fa-grip"></i></button>
              <button class="view-btn" id="listView" title="List View"><i class="fa-solid fa-list"></i></button>
            </div>
          </div>
        </div>

        <!-- Products Grid -->
        <?php if (empty($products)): ?>
          <div class="text-center py-5 text-muted">
            <i class="fa-solid fa-box-open fa-3x mb-3 d-block"></i>
            <h5>No products found</h5>
            <p>Try adjusting your filters.</p>
            <a href="<?= SITE_URL ?>/category.php" class="btn btn-primary mt-2">View All Products</a>
          </div>
        <?php else: ?>
        <div class="row g-3" id="productsGrid">
          <?php foreach ($products as $product): ?>
            <?php include 'includes/product_card.php'; ?>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <nav class="mt-4">
          <ul class="pagination">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
              <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page'=>$page-1])) ?>">‹</a>
            </li>
            <?php for ($p = 1; $p <= $total_pages; $p++): ?>
            <li class="page-item <?= $p === $page ? 'active' : '' ?>">
              <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page'=>$p])) ?>"><?= $p ?></a>
            </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
              <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page'=>$page+1])) ?>">›</a>
            </li>
          </ul>
        </nav>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>

<script>
document.getElementById('gridView').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('listView').classList.remove('active');
    document.getElementById('productsGrid').className = 'row g-3';
});
document.getElementById('listView').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('gridView').classList.remove('active');
    document.getElementById('productsGrid').className = 'row g-3 list-view';
});
</script>

<?php include 'includes/footer.php'; ?>