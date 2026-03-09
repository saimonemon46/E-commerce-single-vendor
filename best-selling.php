<?php
// ============================================================
//  ElegantTex — best-selling.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Best Selling';
$active_nav = 'best-selling';
$sort       = $_GET['sort'] ?? 'default';
$page       = max(1, (int)($_GET['page'] ?? 1));
$per_page   = 12;

// Mock data — replace with DB query WHERE is_best_seller=1 ORDER BY sales_count DESC
$all_products = [
    ['id'=>4,  'name'=>'Flower Print Sofa Cover',        'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'#1 Best', 'badge_type'=>'sale','rating'=>4.9,'reviews'=>76, 'emoji'=>'🛋️','sold'=>312],
    ['id'=>2,  'name'=>'Velvet Chair Cover Royal Blue',  'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'Top Pick','badge_type'=>'sale','rating'=>4.8,'reviews'=>48, 'emoji'=>'🪑', 'sold'=>289],
    ['id'=>7,  'name'=>'3D Dining Table Cover Set',      'price'=>3200,'compare_price'=>4000,'discount_pct'=>20,'badge'=>'🔥 Hot',  'badge_type'=>'sale','rating'=>4.9,'reviews'=>89, 'emoji'=>'🍽️','sold'=>274],
    ['id'=>5,  'name'=>'White Pint Sofa Cover',          'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%',    'badge_type'=>'sale','rating'=>4.7,'reviews'=>54, 'emoji'=>'🛋️','sold'=>241],
    ['id'=>10, 'name'=>'Geometric Carpet 5x7ft',         'price'=>4500,'compare_price'=>5500,'discount_pct'=>18,'badge'=>'-18%',    'badge_type'=>'sale','rating'=>4.8,'reviews'=>37, 'emoji'=>'🏡', 'sold'=>198],
    ['id'=>6,  'name'=>'Blue Pint Sofa Cover',           'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%',    'badge_type'=>'sale','rating'=>4.8,'reviews'=>63, 'emoji'=>'🛋️','sold'=>183],
    ['id'=>8,  'name'=>'Floral Cushion Cover (Set 4)',   'price'=>1200,'compare_price'=>1500,'discount_pct'=>20,'badge'=>'-20%',    'badge_type'=>'sale','rating'=>4.6,'reviews'=>44, 'emoji'=>'🛏️','sold'=>172],
    ['id'=>1,  'name'=>'Velvet Chair Cover Coffee',      'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%',    'badge_type'=>'sale','rating'=>4.5,'reviews'=>32, 'emoji'=>'🪑', 'sold'=>161],
    ['id'=>3,  'name'=>'Velvet Chair Cover Deep Purple', 'price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%',    'badge_type'=>'sale','rating'=>4.6,'reviews'=>21, 'emoji'=>'🪑', 'sold'=>144],
    ['id'=>9,  'name'=>'AC Cover Dust Guard',            'price'=>800, 'compare_price'=>1000,'discount_pct'=>20,'badge'=>'-20%',    'badge_type'=>'sale','rating'=>4.4,'reviews'=>28, 'emoji'=>'❄️', 'sold'=>129],
    ['id'=>12, 'name'=>'Table Runner Embroidered',       'price'=>950, 'compare_price'=>1100,'discount_pct'=>14,'badge'=>'New',     'badge_type'=>'new', 'rating'=>4.5,'reviews'=>31, 'emoji'=>'🎨', 'sold'=>118],
    ['id'=>11, 'name'=>'TV Cover Dust Protector 43"',   'price'=>600, 'compare_price'=>750, 'discount_pct'=>20,'badge'=>'-20%',    'badge_type'=>'sale','rating'=>4.3,'reviews'=>19, 'emoji'=>'📺', 'sold'=>97],
];

$sort_opts = ['default'=>'Best Selling','price_asc'=>'Price: Low→High','price_desc'=>'Price: High→Low','rating'=>'Best Rated'];
usort($all_products, function($a,$b) use ($sort) {
    return match($sort) {
        'price_asc'  => $a['price']  <=> $b['price'],
        'price_desc' => $b['price']  <=> $a['price'],
        'rating'     => $b['rating'] <=> $a['rating'],
        default      => $b['sold']   <=> $a['sold'],
    };
});

$top3           = array_slice($all_products, 0, 3);
$total_products = count($all_products);
$total_pages    = max(1, ceil($total_products / $per_page));
$products       = array_slice($all_products, ($page-1)*$per_page, $per_page);

$breadcrumbs = [
    ['label'=>'Home',        'href'=> SITE_URL.'/index.php'],
    ['label'=>'Best Selling'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- Page Hero -->
<div class="page-hero-dark">
  <div class="container-fluid px-4">
    <div class="text-center text-white">
      <p class="page-hero-sub">Loved by thousands</p>
      <h1 class="page-hero-title">🏆 Best Selling Products</h1>
      <p class="page-hero-desc">Our most popular covers — trusted by 4,800+ happy customers across Bangladesh</p>
    </div>
  </div>
</div>

<!-- Top 3 Podium -->
<section class="py-5" style="background:var(--bg-light)">
  <div class="container-fluid px-4">
    <div class="section-header mb-4">
      <h3 class="section-title">Top 3 This Month</h3>
    </div>
    <div class="row g-4 justify-content-center">
      <?php
      $medals = ['🥇','🥈','🥉'];
      $medal_colors = ['#FFD700','#C0C0C0','#CD7F32'];
      foreach ($top3 as $rank => $p):
      ?>
      <div class="col-md-4">
        <div class="podium-card" style="--medal-color:<?= $medal_colors[$rank] ?>">
          <div class="podium-rank"><?= $medals[$rank] ?> #<?= $rank+1 ?> Best Seller</div>
          <div class="podium-emoji"><?= $p['emoji'] ?></div>
          <p class="podium-name"><?= htmlspecialchars($p['name']) ?></p>
          <div class="product-rating" style="justify-content:center;display:flex;margin-bottom:6px">
            <?php for($s=1;$s<=5;$s++) echo $p['rating']>=$s?'<i class="fa-solid fa-star"></i>':'<i class="fa-regular fa-star"></i>'; ?>
            <span>(<?= $p['reviews'] ?>)</span>
          </div>
          <p class="podium-sold"><i class="fa-solid fa-bag-shopping me-1"></i><?= number_format($p['sold']) ?> sold</p>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px">
            <div>
              <span class="price-new"><?= CURRENCY ?><?= number_format($p['price']) ?></span>
              <span class="price-old"><?= CURRENCY ?><?= number_format($p['compare_price']) ?></span>
            </div>
            <button class="add-to-cart-btn" onclick="addToCart(<?= $p['id'] ?>)">
              <i class="fa-solid fa-cart-plus me-1"></i>Add
            </button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- All Best Sellers -->
<main class="py-4">
  <div class="container-fluid px-4">
    <div class="products-header">
      <div>
        <h5 class="section-title mb-0">All Best Sellers</h5>
        <p class="products-count mt-1"><strong><?= $total_products ?></strong> products</p>
      </div>
      <div class="d-flex align-items-center gap-2">
        <select class="sort-select" onchange="window.location.href=this.value">
          <?php foreach ($sort_opts as $val => $lbl):
            $url = SITE_URL.'/best-selling.php?'.http_build_query(array_merge($_GET,['sort'=>$val,'page'=>1]));
          ?>
          <option value="<?= $url ?>" <?= $sort===$val?'selected':'' ?>><?= $lbl ?></option>
          <?php endforeach; ?>
        </select>
        <div class="view-toggle">
          <button class="view-btn active" id="gridView"><i class="fa-solid fa-grip"></i></button>
          <button class="view-btn" id="listView"><i class="fa-solid fa-list"></i></button>
        </div>
      </div>
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
</main>

<script>
document.getElementById('gridView').addEventListener('click',function(){this.classList.add('active');document.getElementById('listView').classList.remove('active');document.getElementById('productsGrid').className='row g-3';});
document.getElementById('listView').addEventListener('click',function(){this.classList.add('active');document.getElementById('gridView').classList.remove('active');document.getElementById('productsGrid').className='row g-3 list-view';});
</script>

<?php include 'includes/footer.php'; ?>