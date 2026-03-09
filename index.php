<?php
// ============================================================
//  ElegantTex — index.php  (Homepage)
// ============================================================
require_once 'includes/config.php';

$page_title = 'Home – Premium Sofa & Furniture Covers';
$active_nav = 'home';

// Mock hero banners — replace with DB query
$banners = [
    ['badge' => '17% OFF', 'heading' => "Feel the Ocean\nOn Your Sofa",   'sub' => 'Premium sofa covers that transform your living space',        'link' => SITE_URL.'/category.php?cat=sofa-cover',   'class' => 'banner-slide-1'],
    ['badge' => '12% OFF', 'heading' => "Velvet Chair\nCovers",           'sub' => 'Luxurious velvet covers for your dining chairs',               'link' => SITE_URL.'/category.php?cat=chair-cover',  'class' => 'banner-slide-2'],
    ['badge' => 'New',     'heading' => "3D Dining\nCombo Sets",          'sub' => 'Complete table & chair cover sets in stunning 3D prints',      'link' => SITE_URL.'/category.php?cat=dining-combo', 'class' => 'banner-slide-3'],
];

// Mock Today's Deals — replace with DB query
$today_deals = [
    ['id'=>2, 'name'=>'Velvet Chair Cover Royal Blue',  'price'=>2200, 'compare_price'=>2500, 'emoji'=>'🪑'],
    ['id'=>4, 'name'=>'Flower Print Sofa Cover',        'price'=>2500, 'compare_price'=>3000, 'emoji'=>'🛋️'],
    ['id'=>5, 'name'=>'White Pint Sofa Cover',          'price'=>2500, 'compare_price'=>3000, 'emoji'=>'🛋️'],
    ['id'=>6, 'name'=>'Blue Pint Sofa Cover',           'price'=>2500, 'compare_price'=>3000, 'emoji'=>'🛋️'],
];

// Mock featured products — replace with DB query
$featured_products = [
    ['id'=>1,  'name'=>'Velvet Chair Cover Coffee',        'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.5,'reviews'=>32, 'emoji'=>'🪑'],
    ['id'=>2,  'name'=>'Velvet Chair Cover Royal Blue',    'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.8,'reviews'=>48, 'emoji'=>'🪑'],
    ['id'=>3,  'name'=>'Velvet Chair Cover Deep Purple',   'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.6,'reviews'=>21, 'emoji'=>'🪑'],
    ['id'=>4,  'name'=>'Flower Print Sofa Cover',          'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.9,'reviews'=>76, 'emoji'=>'🛋️'],
    ['id'=>5,  'name'=>'White Pint Sofa Cover',            'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.7,'reviews'=>54, 'emoji'=>'🛋️'],
    ['id'=>6,  'name'=>'Blue Pint Sofa Cover',             'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.8,'reviews'=>63, 'emoji'=>'🛋️'],
    ['id'=>7,  'name'=>'3D Dining Table Cover Set',        'price'=>3200,'compare_price'=>4000,'discount_pct'=>20,'badge'=>'New', 'badge_type'=>'new', 'rating'=>4.9,'reviews'=>89, 'emoji'=>'🍽️'],
    ['id'=>8,  'name'=>'Floral Cushion Cover (Set 4)',     'price'=>1200,'compare_price'=>1500,'discount_pct'=>20,'badge'=>'-20%','badge_type'=>'sale','rating'=>4.6,'reviews'=>44, 'emoji'=>'🛏️'],
];

// Mock best sellers — replace with DB query
$best_sellers = array_filter($featured_products, fn($p) => in_array($p['id'], [2,4,5,7,10]));

// Category pills for scroll row
$cat_pills = [
    ['slug'=>'sofa-cover',     'icon'=>'fa-couch',    'label'=>'Sofa Cover',     'bg'=>'#FF049E22', 'color'=>'#FF049E'],
    ['slug'=>'chair-cover',    'icon'=>'fa-chair',    'label'=>'Chair Cover',    'bg'=>'#3490f322', 'color'=>'#3490f3'],
    ['slug'=>'table-covers',   'icon'=>'fa-table',    'label'=>'Table Covers',   'bg'=>'#ffc51922', 'color'=>'#e6a800'],
    ['slug'=>'dining-combo',   'icon'=>'fa-utensils', 'label'=>'Dining Combo',   'bg'=>'#28a74522', 'color'=>'#28a745'],
    ['slug'=>'ac-covers',      'icon'=>'fa-wind',     'label'=>'AC Covers',      'bg'=>'#17a2b822', 'color'=>'#17a2b8'],
    ['slug'=>'tv-covers',      'icon'=>'fa-tv',       'label'=>'TV Covers',      'bg'=>'#6f42c122', 'color'=>'#6f42c1'],
    ['slug'=>'cushion-covers', 'icon'=>'fa-circle',   'label'=>'Cushion Covers', 'bg'=>'#ef486a22', 'color'=>'#ef486a'],
    ['slug'=>'carpet',         'icon'=>'fa-rug',      'label'=>'Carpet',         'bg'=>'#FF604222', 'color'=>'#FF6042'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
?>

<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
  <div class="container-fluid px-4">
    <div class="row g-3">

      <!-- Sidebar Categories -->
      <div class="col-lg-2 d-none d-lg-block">
        <?php include 'includes/sidebar_categories.php'; ?>
      </div>

      <!-- Hero Banner Slider -->
      <div class="col-lg-7 col-md-8">
        <div id="heroBannerSlider" class="carousel slide hero-slider" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php foreach ($banners as $i => $b): ?>
            <button type="button" data-bs-target="#heroBannerSlider" data-bs-slide-to="<?= $i ?>"
                    <?= $i === 0 ? 'class="active"' : '' ?>></button>
            <?php endforeach; ?>
          </div>

          <div class="carousel-inner rounded-3 overflow-hidden">
            <?php foreach ($banners as $i => $b): ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
              <div class="banner-slide <?= $b['class'] ?>">
                <div class="banner-content">
                  <span class="banner-badge"><?= htmlspecialchars($b['badge']) ?></span>
                  <h2><?= nl2br(htmlspecialchars($b['heading'])) ?></h2>
                  <p><?= htmlspecialchars($b['sub']) ?></p>
                  <a href="<?= $b['link'] ?>" class="btn btn-white-outline">
                    Shop Now <i class="fa-solid fa-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#heroBannerSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#heroBannerSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>

      <!-- Today's Deals -->
      <div class="col-lg-3 col-md-4">
        <div class="todays-deal-box">
          <div class="deal-box-header">
            <span>Today's Deal</span>
            <span class="badge-hot">HOT</span>
          </div>
          <div class="deal-items">
            <?php foreach ($today_deals as $deal): ?>
            <a href="<?= SITE_URL ?>/product.php?id=<?= $deal['id'] ?>" class="deal-item">
              <div class="deal-item-img"><?= $deal['emoji'] ?></div>
              <div class="deal-item-info">
                <p class="deal-item-title"><?= htmlspecialchars($deal['name']) ?></p>
                <span class="deal-price-new"><?= CURRENCY ?><?= number_format($deal['price']) ?></span>
                <span class="deal-price-old"><?= CURRENCY ?><?= number_format($deal['compare_price']) ?></span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CATEGORY SCROLL ROW ===== -->
<section class="category-scroll-section py-4">
  <div class="container-fluid px-4">
    <div class="category-scroll-wrapper">
      <div class="category-scroll" id="categoryScroll">
        <?php foreach ($cat_pills as $pill): ?>
        <a href="<?= SITE_URL ?>/category.php?cat=<?= $pill['slug'] ?>" class="cat-pill">
          <div class="cat-pill-img" style="background:linear-gradient(135deg,<?= $pill['bg'] ?>,<?= $pill['bg'] ?>)">
            <i class="fa-solid <?= $pill['icon'] ?>" style="color:<?= $pill['color'] ?>"></i>
          </div>
          <span><?= $pill['label'] ?></span>
        </a>
        <?php endforeach; ?>
      </div>
      <button class="cat-scroll-arrow cat-scroll-right" id="catScrollRight">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>
</section>

<!-- ===== FEATURED PRODUCTS ===== -->
<section class="products-section py-4">
  <div class="container-fluid px-4">
    <div class="section-header">
      <h3 class="section-title">Featured Products</h3>
      <a href="<?= SITE_URL ?>/category.php" class="section-link">View All <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row g-3">
      <?php foreach ($featured_products as $product): ?>
        <?php include 'includes/product_card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== PROMO BANNERS ===== -->
<section class="promo-banners py-4">
  <div class="container-fluid px-4">
    <div class="row g-3">
      <div class="col-md-4">
        <a href="<?= SITE_URL ?>/category.php?cat=sofa-cover" class="promo-banner promo-banner-1 d-block text-decoration-none">
          <div class="promo-badge"><?= PROMO_PCT ?>%<br>ছাড়া</div>
          <div class="promo-text">
            <p class="promo-sub">সোফায় বসে</p>
            <p class="promo-main">সাগরের ফিল</p>
          </div>
          <span class="promo-cta">ক্লিক করুন</span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?= SITE_URL ?>/category.php?cat=sofa-cover" class="promo-banner promo-banner-2 d-block text-decoration-none">
          <div class="promo-badge"><?= PROMO_PCT ?>%<br>ছাড়া</div>
          <div class="promo-text">
            <p class="promo-sub">পাহাড়ে বসে</p>
            <p class="promo-main">অস্থির ফিল</p>
          </div>
          <span class="promo-cta">ক্লিক করুন</span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?= SITE_URL ?>/category.php?cat=sofa-cover" class="promo-banner promo-banner-3 d-block text-decoration-none">
          <div class="promo-badge"><?= PROMO_PCT ?>%<br>ছাড়া</div>
          <div class="promo-text">
            <p class="promo-sub">হিম শীতল পাহাড়ে</p>
            <p class="promo-main">যদি বসা যায়</p>
          </div>
          <span class="promo-cta">ক্লিক করুন</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===== BEST SELLING ===== -->
<section class="products-section py-4">
  <div class="container-fluid px-4">
    <div class="section-header">
      <h3 class="section-title">Best Selling</h3>
      <a href="<?= SITE_URL ?>/best-selling.php" class="section-link">View All <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row g-3">
      <?php foreach ($best_sellers as $product): ?>
        <?php include 'includes/product_card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== WHY CHOOSE US ===== -->
<section class="features-section py-5">
  <div class="container-fluid px-4">
    <div class="row g-3 text-center">
      <?php
      $features = [
          ['icon'=>'fa-truck-fast',    'title'=>'Fast Delivery',   'desc'=>'Across Bangladesh in 2–3 days'],
          ['icon'=>'fa-rotate-left',   'title'=>'Easy Returns',    'desc'=>'7-day hassle-free return policy'],
          ['icon'=>'fa-shield-halved', 'title'=>'Secure Payment',  'desc'=>'100% secure checkout'],
          ['icon'=>'fa-brands fa-whatsapp', 'title'=>'24/7 Support','desc'=>'WhatsApp & phone support'],
      ];
      foreach ($features as $f): ?>
      <div class="col-6 col-md-3">
        <div class="feature-card">
          <div class="feature-icon"><i class="fa-solid <?= $f['icon'] ?>"></i></div>
          <h6><?= $f['title'] ?></h6>
          <p><?= $f['desc'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>