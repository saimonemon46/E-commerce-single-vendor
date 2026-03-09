<?php
// ============================================================
//  ElegantTex — includes/product_card.php
//  Reusable product card partial.
//  Pass $product array with keys:
//    id, name, price, compare_price, discount_pct,
//    badge, badge_type ('sale'|'new'), rating, reviews, emoji
//
//  Usage:
//    foreach ($products as $product) {
//        include 'includes/product_card.php';
//    }
// ============================================================

// Safely extract values with fallbacks
$p_id       = $product['id']            ?? 0;
$p_name     = $product['name']          ?? 'Product';
$p_price    = $product['price']         ?? 0;
$p_old      = $product['compare_price'] ?? 0;
$p_discount = $product['discount_pct']  ?? 0;
$p_badge    = $product['badge']         ?? '';
$p_btype    = $product['badge_type']    ?? 'sale';
$p_rating   = $product['rating']        ?? 0;
$p_reviews  = $product['reviews']       ?? 0;
$p_emoji    = $product['emoji']         ?? '🛋️';
$p_image    = $product['image']         ?? '';

$badge_class = ($p_btype === 'new') ? 'badge-new' : 'badge-sale';

// Build star HTML
if (!function_exists('render_stars')) {
    function render_stars(float $rating): string {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($rating >= $i)         $html .= '<i class="fa-solid fa-star"></i>';
            elseif ($rating >= $i-0.5) $html .= '<i class="fa-solid fa-star-half-stroke"></i>';
            else                       $html .= '<i class="fa-regular fa-star"></i>';
        }
        return $html;
    }
}
?>
<div class="col-6 col-md-4 col-lg-3">
  <div class="product-card" onclick="window.location='<?= SITE_URL ?>/product.php?id=<?= $p_id ?>'">

    <div class="product-img-wrap">
      <?php if ($p_image): ?>
        <img src="<?= htmlspecialchars($p_image) ?>" alt="<?= htmlspecialchars($p_name) ?>" loading="lazy"/>
      <?php else: ?>
        <span class="product-emoji"><?= $p_emoji ?></span>
      <?php endif; ?>

      <?php if ($p_badge): ?>
        <span class="product-badge <?= $badge_class ?>"><?= htmlspecialchars($p_badge) ?></span>
      <?php endif; ?>

      <div class="product-actions">
        <button class="product-action-btn" title="Add to Wishlist"
                onclick="event.stopPropagation(); addToWishlist(<?= $p_id ?>)">
          <i class="fa-regular fa-heart"></i>
        </button>
        <button class="product-action-btn" title="Quick View"
                onclick="event.stopPropagation(); quickView(<?= $p_id ?>)">
          <i class="fa-regular fa-eye"></i>
        </button>
      </div>
    </div>

    <div class="product-info">
      <p class="product-name" title="<?= htmlspecialchars($p_name) ?>"><?= htmlspecialchars($p_name) ?></p>

      <div class="product-rating">
        <?= render_stars((float)$p_rating) ?>
        <span>(<?= (int)$p_reviews ?>)</span>
      </div>

      <div class="product-price-row">
        <div>
          <span class="price-new"><?= CURRENCY ?><?= number_format($p_price, 2) ?></span>
          <?php if ($p_old > 0): ?>
            <span class="price-old"><?= CURRENCY ?><?= number_format($p_old, 2) ?></span>
          <?php endif; ?>
        </div>
        <button class="add-to-cart-btn"
                onclick="event.stopPropagation(); addToCart(<?= $p_id ?>)">
          <i class="fa-solid fa-cart-plus me-1"></i>Add
        </button>
      </div>
    </div>

  </div>
</div>