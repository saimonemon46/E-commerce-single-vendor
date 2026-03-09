<?php
// ============================================================
//  ElegantTex — new-collection.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'New Collection';
$active_nav = 'new-collection';
$sort       = $_GET['sort'] ?? 'newest';
$filter_cat = $_GET['cat']  ?? '';
$page       = max(1, (int)($_GET['page'] ?? 1));
$per_page   = 12;

// Mock new arrivals — replace with DB WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
$all_products = [
    ['id'=>13,'name'=>'Blooming Rose Sofa Cover',      'price'=>2800,'compare_price'=>3200,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.9,'reviews'=>12,'emoji'=>'🌹','category'=>'sofa-cover',    'arrival_date'=>'Mar 2025'],
    ['id'=>14,'name'=>'Marble Effect Chair Cover',     'price'=>2400,'compare_price'=>2800,'discount_pct'=>14,'badge'=>'New','badge_type'=>'new','rating'=>4.8,'reviews'=>8, 'emoji'=>'🪑','category'=>'chair-cover',   'arrival_date'=>'Mar 2025'],
    ['id'=>15,'name'=>'3D Peacock Dining Set',         'price'=>3600,'compare_price'=>4200,'discount_pct'=>14,'badge'=>'New','badge_type'=>'new','rating'=>5.0,'reviews'=>6, 'emoji'=>'🦚','category'=>'dining-combo',  'arrival_date'=>'Mar 2025'],
    ['id'=>16,'name'=>'Ombre Sunset Sofa Cover',       'price'=>2600,'compare_price'=>3000,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.7,'reviews'=>9, 'emoji'=>'🌅','category'=>'sofa-cover',    'arrival_date'=>'Feb 2025'],
    ['id'=>17,'name'=>'Bamboo Print Chair Cover',      'price'=>2100,'compare_price'=>2400,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.6,'reviews'=>14,'emoji'=>'🎋','category'=>'chair-cover',   'arrival_date'=>'Feb 2025'],
    ['id'=>18,'name'=>'Persian Garden Carpet',         'price'=>5200,'compare_price'=>6000,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.9,'reviews'=>5, 'emoji'=>'🌺','category'=>'carpet',         'arrival_date'=>'Feb 2025'],
    ['id'=>19,'name'=>'Cloud Print Cushion Set',       'price'=>1400,'compare_price'=>1600,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.5,'reviews'=>18,'emoji'=>'☁️','category'=>'cushion-covers','arrival_date'=>'Jan 2025'],
    ['id'=>20,'name'=>'Abstract Art Sofa Cover',       'price'=>2700,'compare_price'=>3100,'discount_pct'=>13,'badge'=>'New','badge_type'=>'new','rating'=>4.7,'reviews'=>11,'emoji'=>'🎨','category'=>'sofa-cover',    'arrival_date'=>'Jan 2025'],
    ['id'=>21,'name'=>'Smart AC Cover 2.0',            'price'=>900, 'compare_price'=>1100,'discount_pct'=>18,'badge'=>'New','badge_type'=>'new','rating'=>4.4,'reviews'=>7, 'emoji'=>'❄️','category'=>'ac-covers',     'arrival_date'=>'Jan 2025'],
    ['id'=>22,'name'=>'LED Table Runner',              'price'=>1100,'compare_price'=>1300,'discount_pct'=>15,'badge'=>'New','badge_type'=>'new','rating'=>4.6,'reviews'=>3, 'emoji'=>'✨','category'=>'table-covers',  'arrival_date'=>'Jan 2025'],
    ['id'=>23,'name'=>'Mandala Print Sofa Cover',      'price'=>2900,'compare_price'=>3400,'discount_pct'=>15,'badge'=>'New','badge_type'=>'new','rating'=>4.8,'reviews'=>4, 'emoji'=>'🔮','category'=>'sofa-cover',    'arrival_date'=>'Dec 2024'],
    ['id'=>24,'name'=>'Galaxy TV Cover 55"',           'price'=>750, 'compare_price'=>900, 'discount_pct'=>17,'badge'=>'New','badge_type'=>'new','rating'=>4.3,'reviews'=>6, 'emoji'=>'🌌','category'=>'tv-covers',     'arrival_date'=>'Dec 2024'],
];

$cat_tabs = [
    ''               => 'All',
    'sofa-cover'     => 'Sofa Cover',
    'chair-cover'    => 'Chair Cover',
    'dining-combo'   => 'Dining Combo',
    'cushion-covers' => 'Cushion',
    'carpet'         => 'Carpet',
];

if ($filter_cat) {
    $all_products = array_values(array_filter($all_products, fn($p) => $p['category'] === $filter_cat));
}

$total_products = count($all_products);
$total_pages    = max(1, ceil($total_products / $per_page));
$products       = array_slice($all_products, ($page-1)*$per_page, $per_page);

// Highlight 2 newest "just arrived" products
$just_arrived   = array_slice($all_products, 0, 2);

$breadcrumbs = [
    ['label'=>'Home',           'href'=> SITE_URL.'/index.php'],
    ['label'=>'New Collection'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- Page Hero -->
<div class="page-hero-gradient">
  <div class="container-fluid px-4">
    <div class="text-center text-white">
      <span class="page-hero-badge">Just Arrived</span>
      <h1 class="page-hero-title mt-2">✨ New Collection</h1>
      <p class="page-hero-desc">Fresh designs added every month. Be the first to own the latest trends in furniture covers.</p>
    </div>
  </div>
</div>

<!-- Just Arrived Spotlight -->
<section class="py-5" style="background:var(--bg-light)">
  <div class="container-fluid px-4">
    <div class="section-header mb-4">
      <h3 class="section-title">🆕 Just Arrived</h3>
    </div>
    <div class="row g-4">
      <?php foreach ($just_arrived as $i => $p): ?>
      <div class="col-md-6">
        <div class="spotlight-card" style="background:<?= $i===0?'linear-gradient(135deg,#1a1a2e,#3d0066)':'linear-gradient(135deg,#003322,#006644)' ?>">
          <div class="spotlight-emoji"><?= $p['emoji'] ?></div>
          <div class="spotlight-info">
            <span class="spotlight-tag">New Arrival – <?= $p['arrival_date'] ?></span>
            <h4 class="spotlight-name"><?= htmlspecialchars($p['name']) ?></h4>
            <div style="display:flex;align-items:center;gap:12px;margin-top:12px">
              <span style="font-size:22px;font-weight:900;color:#fff"><?= CURRENCY ?><?= number_format($p['price']) ?></span>
              <span style="font-size:15px;text-decoration:line-through;opacity:.6;color:#fff"><?= CURRENCY ?><?= number_format($p['compare_price']) ?></span>
            </div>
            <div style="display:flex;gap:10px;margin-top:14px">
              <a href="<?= SITE_URL ?>/product.php?id=<?= $p['id'] ?>" class="btn-hero-cta">View Product</a>
              <button class="btn-hero-cart" onclick="addToCart(<?= $p['id'] ?>)"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Category Filter Tabs -->
<section class="py-4">
  <div class="container-fluid px-4">
    <div class="cat-tabs-wrapper mb-4">
      <?php foreach ($cat_tabs as $slug => $label):
        $url = SITE_URL.'/new-collection.php'.($slug?'?cat='.$slug:'');
      ?>
      <a href="<?= $url ?>" class="cat-tab <?= $filter_cat===$slug?'active':'' ?>"><?= $label ?></a>
      <?php endforeach; ?>
    </div>

    <div class="products-header">
      <p class="products-count"><strong><?= $total_products ?></strong> new products</p>
    </div>

    <div class="row g-3" id="productsGrid">
      <?php foreach ($products as $product): include 'includes/product_card.php'; endforeach; ?>
    </div>

    <?php if ($total_pages > 1): ?>
    <nav class="mt-4"><ul class="pagination">
      <li class="page-item <?= $page<=1?'disabled':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$page-1])) ?>">‹</a></li>
      <?php for($p=1;$p<=$total_pages;$p++): ?>
      <li class="page-item <?= $p===$page?'active':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$p])) ?>"><?= $p ?></a></li>
      <?php endfor; ?>
      <li class="page-item <?= $page>=$total_pages?'disabled':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$page+1])) ?>">›</a></li>
    </ul></nav>
    <?php endif; ?>
  </div>
</section>

<!-- Newsletter Signup -->
<section class="newsletter-section py-5">
  <div class="container-fluid px-4">
    <div class="newsletter-box">
      <div class="text-center">
        <h3 class="newsletter-title">🔔 Never Miss a New Arrival</h3>
        <p class="newsletter-sub">Subscribe and get notified first whenever we drop new designs</p>
        <form class="newsletter-form" method="POST">
          <input type="tel" name="phone" placeholder="Your WhatsApp number" required>
          <button type="submit"><i class="fa-brands fa-whatsapp me-2"></i>Notify Me</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>