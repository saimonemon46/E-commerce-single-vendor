<?php
// ============================================================
//  ElegantTex — product.php  (Single Product Detail)
// ============================================================
require_once 'includes/config.php';

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Mock product data — replace with DB query by $product_id
$mock_products = [
    4 => [
        'id'           => 4,
        'name'         => 'Flower Print Sofa Cover',
        'sku'          => 'ET-SF-FP-001',
        'price'        => 2500,
        'compare_price'=> 3000,
        'discount_pct' => 17,
        'badge'        => '-17%',
        'badge_type'   => 'sale',
        'rating'       => 4.9,
        'reviews'      => 76,
        'emoji'        => '🛋️',
        'stock'        => 24,
        'category'     => 'sofa-cover',
        'category_name'=> 'Sofa Cover',
        'material'     => 'Premium Velvet / Jacquard',
        'description'  => 'This beautiful Flower Print Sofa Cover by ElegantTex is crafted from high-quality stretch fabric that fits most standard sofas snugly. The vibrant floral pattern adds an elegant touch to any living room while protecting your sofa from dust, pet hair, and everyday wear.',
        'features'     => ['Machine washable at 30°C', 'Universal stretch fit for 2, 3, or L-shaped sofas', 'Anti-slip bottom coating', 'Fade-resistant dye technology', 'Available in 5 stunning colors'],
        'specs'        => ['Material'=>'Premium Velvet / Jacquard Polyester','Sizes Available'=>'1-Seater, 2-Seater, 3-Seater, L-Shape','Washing'=>'Machine washable, 30°C','Stretchability'=>'High (fits 90-140cm sofa width)','Origin'=>'Bangladesh','Warranty'=>'7 days return guarantee'],
        'colors'       => [['hex'=>'#FF6B8A','name'=>'Floral Pink'],['hex'=>'#6B8AFF','name'=>'Blue Floral'],['hex'=>'#8AFF6B','name'=>'Green Garden'],['hex'=>'#FFD700','name'=>'Golden Sun'],['hex'=>'#9B59B6','name'=>'Lavender']],
        'sizes'        => [['label'=>'1 Seater','available'=>true],['label'=>'2 Seater','available'=>true],['label'=>'3 Seater','available'=>true],['label'=>'L-Shape','available'=>true],['label'=>'5 Seater','available'=>false]],
        'reviews_list' => [
            ['name'=>'Fatima Rahman','date'=>'12 Feb 2025','rating'=>5,'text'=>'Excellent quality! The fabric feels very premium and the floral print is exactly as shown in the photos. Fits my 3-seater sofa perfectly.'],
            ['name'=>'Karim Ahmed',  'date'=>'5 Jan 2025', 'rating'=>4,'text'=>'Very nice product. Delivery was fast and packaging was good. The cover transformed our old sofa completely. Will buy again!'],
        ],
    ],
];

// Fallback to first product if ID not found
$product_data = $mock_products[$product_id] ?? $mock_products[4];

$page_title = $product_data['name'];
$active_nav = '';

// Related products mock
$related_products = [
    ['id'=>5,'name'=>'White Pint Sofa Cover','price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.7,'reviews'=>54,'emoji'=>'🛋️'],
    ['id'=>6,'name'=>'Blue Pint Sofa Cover', 'price'=>2500,'compare_price'=>3000,'discount_pct'=>17,'badge'=>'-17%','badge_type'=>'sale','rating'=>4.8,'reviews'=>63,'emoji'=>'🛋️'],
    ['id'=>1,'name'=>'Velvet Chair Cover Coffee','price'=>2200,'compare_price'=>2500,'discount_pct'=>12,'badge'=>'-12%','badge_type'=>'sale','rating'=>4.5,'reviews'=>32,'emoji'=>'🪑'],
    ['id'=>7,'name'=>'3D Dining Table Cover Set','price'=>3200,'compare_price'=>4000,'discount_pct'=>20,'badge'=>'New','badge_type'=>'new','rating'=>4.9,'reviews'=>89,'emoji'=>'🍽️'],
];

$breadcrumbs = [
    ['label'=>'Home',                                           'href'=> SITE_URL.'/index.php'],
    ['label'=>$product_data['category_name'],                   'href'=> SITE_URL.'/category.php?cat='.$product_data['category']],
    ['label'=>$product_data['name']],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<main class="py-4">
  <div class="container-fluid px-4">
    <div class="row g-4">

      <!-- Product Gallery -->
      <div class="col-lg-5">
        <div class="product-main-img" id="mainImg">
          <span id="mainEmoji"><?= $product_data['emoji'] ?></span>
          <span class="product-badge-detail"><?= htmlspecialchars($product_data['badge']) ?></span>
        </div>
        <div class="product-thumbs">
          <div class="product-thumb active" onclick="setThumb(this, '<?= $product_data['emoji'] ?>')">
            <?= $product_data['emoji'] ?>
          </div>
          <div class="product-thumb" onclick="setThumb(this, '🌸')">🌸</div>
          <div class="product-thumb" onclick="setThumb(this, '🎨')">🎨</div>
          <div class="product-thumb" onclick="setThumb(this, '🏠')">🏠</div>
        </div>
      </div>

      <!-- Product Info -->
      <div class="col-lg-7">
        <div class="product-detail-card">
          <h1 class="product-detail-name"><?= htmlspecialchars($product_data['name']) ?></h1>

          <!-- Rating -->
          <div class="product-detail-rating">
            <?php for ($s = 1; $s <= 5; $s++): ?>
              <?php if ($product_data['rating'] >= $s): ?>
                <i class="fa-solid fa-star"></i>
              <?php elseif ($product_data['rating'] >= $s - 0.5): ?>
                <i class="fa-solid fa-star-half-stroke"></i>
              <?php else: ?>
                <i class="fa-regular fa-star"></i>
              <?php endif; ?>
            <?php endfor; ?>
            <span><?= $product_data['rating'] ?> (<?= $product_data['reviews'] ?> reviews)</span>
          </div>

          <!-- Stock -->
          <div class="stock-badge <?= $product_data['stock'] > 5 ? 'in-stock' : 'low-stock' ?>">
            <span class="stock-dot"></span>
            <?= $product_data['stock'] > 0 ? 'In Stock ('.$product_data['stock'].' units)' : 'Out of Stock' ?>
          </div>

          <!-- Price -->
          <div class="product-detail-price">
            <span class="detail-price-new"><?= CURRENCY ?><?= number_format($product_data['price']) ?>.00</span>
            <span class="detail-price-old"><?= CURRENCY ?><?= number_format($product_data['compare_price']) ?>.00</span>
            <span class="detail-price-discount">Save <?= $product_data['discount_pct'] ?>%</span>
          </div>
          <hr class="divider"/>

          <!-- Colors -->
          <div class="option-label">Color: <strong id="selectedColor"><?= $product_data['colors'][0]['name'] ?></strong></div>
          <div class="color-options">
            <?php foreach ($product_data['colors'] as $i => $color): ?>
            <div class="color-opt <?= $i === 0 ? 'active' : '' ?>"
                 style="background:<?= $color['hex'] ?>"
                 title="<?= htmlspecialchars($color['name']) ?>"
                 onclick="selectColor(this, '<?= htmlspecialchars($color['name']) ?>')">
            </div>
            <?php endforeach; ?>
          </div>

          <!-- Sizes -->
          <div class="option-label">Size:</div>
          <div class="size-options">
            <?php foreach ($product_data['sizes'] as $i => $size): ?>
            <div class="size-opt <?= !$size['available'] ? 'disabled' : ($i === 1 ? 'active' : '') ?>"
                 <?= $size['available'] ? 'onclick="selectSize(this)"' : '' ?>>
              <?= htmlspecialchars($size['label']) ?>
            </div>
            <?php endforeach; ?>
          </div>
          <hr class="divider"/>

          <!-- Quantity -->
          <div class="option-label">Quantity:</div>
          <div class="qty-wrapper mb-3">
            <button class="qty-btn" id="qtyMinus">−</button>
            <input type="number" class="qty-input" value="1" min="1" max="<?= $product_data['stock'] ?>" id="qtyInput" readonly/>
            <button class="qty-btn" id="qtyPlus">+</button>
          </div>

          <!-- CTA -->
          <div class="cta-buttons">
            <button class="btn-add-cart" onclick="addToCart(<?= $product_data['id'] ?>)">
              <i class="fa-solid fa-cart-plus me-2"></i>Add to Cart
            </button>
            <button class="btn-buy-now" onclick="window.location='<?= SITE_URL ?>/checkout.php'">
              <i class="fa-solid fa-bolt me-2"></i>Buy Now
            </button>
            <button class="btn-wishlist"><i class="fa-regular fa-heart"></i></button>
          </div>
          <hr class="divider"/>

          <!-- Meta -->
          <div class="product-meta">
            <p>SKU: <span><?= htmlspecialchars($product_data['sku']) ?></span></p>
            <p>Category: <span>
              <a href="<?= SITE_URL ?>/category.php?cat=<?= $product_data['category'] ?>" style="color:var(--primary)">
                <?= htmlspecialchars($product_data['category_name']) ?>
              </a>
            </span></p>
            <p>Material: <span><?= htmlspecialchars($product_data['material']) ?></span></p>
            <p class="mt-2">
              <i class="fa-solid fa-share-nodes me-1" style="color:var(--primary)"></i> Share:
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(SITE_URL.'/product.php?id='.$product_data['id']) ?>"
                 class="ms-2" target="_blank" style="color:#1877f2"><i class="fa-brands fa-facebook"></i></a>
              <a href="https://wa.me/?text=<?= urlencode($product_data['name'].' - '.SITE_URL.'/product.php?id='.$product_data['id']) ?>"
                 class="ms-2" target="_blank" style="color:#25D366"><i class="fa-brands fa-whatsapp"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabs: Description / Specs / Reviews -->
    <div class="product-tabs mt-4">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabDesc">Description</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabSpec">Specifications</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabReviews">
            Reviews (<?= count($product_data['reviews_list']) ?>)
          </button>
        </li>
      </ul>
      <div class="tab-content">

        <!-- Description -->
        <div class="tab-pane fade show active" id="tabDesc">
          <p><?= htmlspecialchars($product_data['description']) ?></p>
          <ul style="color:var(--text-muted);line-height:2">
            <?php foreach ($product_data['features'] as $feature): ?>
            <li><?= htmlspecialchars($feature) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Specifications -->
        <div class="tab-pane fade" id="tabSpec">
          <table class="table table-bordered" style="font-size:14px">
            <tbody>
              <?php foreach ($product_data['specs'] as $key => $val): ?>
              <tr>
                <td style="font-weight:700;width:35%"><?= htmlspecialchars($key) ?></td>
                <td><?= htmlspecialchars($val) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Reviews -->
        <div class="tab-pane fade" id="tabReviews">
          <?php foreach ($product_data['reviews_list'] as $review): ?>
          <div class="review-card">
            <div class="d-flex justify-content-between">
              <span class="reviewer-name"><?= htmlspecialchars($review['name']) ?></span>
              <span class="review-date"><?= htmlspecialchars($review['date']) ?></span>
            </div>
            <div class="review-stars"><?= str_repeat('⭐', $review['rating']) ?></div>
            <p class="review-text"><?= htmlspecialchars($review['text']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>

    <!-- Related Products -->
    <div class="section-header mt-4">
      <h3 class="section-title">Related Products</h3>
      <a href="<?= SITE_URL ?>/category.php?cat=<?= $product_data['category'] ?>" class="section-link">View All</a>
    </div>
    <div class="row g-3">
      <?php foreach ($related_products as $product): ?>
        <?php include 'includes/product_card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<script>
function setThumb(el, emoji) {
    document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('mainEmoji').textContent = emoji;
}
function selectColor(el, name) {
    document.querySelectorAll('.color-opt').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('selectedColor').textContent = name;
}
function selectSize(el) {
    document.querySelectorAll('.size-opt:not(.disabled)').forEach(s => s.classList.remove('active'));
    el.classList.add('active');
}
const qtyInput = document.getElementById('qtyInput');
document.getElementById('qtyMinus').addEventListener('click', () => { if (qtyInput.value > 1) qtyInput.value--; });
document.getElementById('qtyPlus').addEventListener('click',  () => { if (qtyInput.value < <?= $product_data['stock'] ?>) qtyInput.value++; });
</script>

<?php include 'includes/footer.php'; ?>