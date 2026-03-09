<?php
// ============================================================
//  ElegantTex — cart.php  (Shopping Cart)
// ============================================================
require_once 'includes/config.php';

$page_title = 'Shopping Cart';
$active_nav = '';

// Mock cart items — in real app, read from $_SESSION['cart']
// Each item: id, name, price, qty, color, size, emoji
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [
    ['id'=>4, 'name'=>'Flower Print Sofa Cover',       'price'=>2500, 'qty'=>1, 'color'=>'Floral Pink',  'size'=>'2 Seater', 'emoji'=>'🛋️'],
    ['id'=>2, 'name'=>'Velvet Chair Cover Royal Blue',  'price'=>2200, 'qty'=>2, 'color'=>'Royal Blue',   'size'=>'Standard', 'emoji'=>'🪑'],
];

// Calculate totals
$subtotal = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart_items));
$discount = 0; // Apply coupon logic here later
$total    = $subtotal - $discount + SHIPPING_FEE;

$breadcrumbs = [
    ['label'=>'Home', 'href'=> SITE_URL.'/index.php'],
    ['label'=>'Shopping Cart'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<main class="py-4">
  <div class="container-fluid px-4">
    <h2 class="section-title mb-4">
      <i class="fa-solid fa-cart-shopping me-2" style="color:var(--primary)"></i>Shopping Cart
    </h2>

    <div class="row g-4">

      <!-- Cart Items -->
      <div class="col-lg-8">
        <?php if (empty($cart_items)): ?>
          <div class="cart-empty">
            <i class="fa-solid fa-cart-shopping d-block"></i>
            <h5 class="mt-3">Your cart is empty</h5>
            <p>Add some amazing covers to your cart!</p>
            <a href="<?= SITE_URL ?>/index.php" class="btn btn-primary mt-3">Start Shopping</a>
          </div>
        <?php else: ?>
          <table class="table cart-table">
            <thead>
              <tr>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cart_items as $idx => $item): ?>
              <tr id="cart-row-<?= $idx ?>">
                <td>
                  <div class="cart-product-img"><?= $item['emoji'] ?></div>
                </td>
                <td>
                  <div class="cart-product-name">
                    <a href="<?= SITE_URL ?>/product.php?id=<?= $item['id'] ?>" style="color:inherit;text-decoration:none">
                      <?= htmlspecialchars($item['name']) ?>
                    </a>
                  </div>
                  <div class="cart-product-meta">
                    Size: <?= htmlspecialchars($item['size']) ?> &bull; Color: <?= htmlspecialchars($item['color']) ?>
                  </div>
                </td>
                <td><?= CURRENCY ?><?= number_format($item['price']) ?>.00</td>
                <td>
                  <div class="cart-qty-control">
                    <button class="cart-qty-btn" onclick="changeQty(<?= $idx ?>, -1)">−</button>
                    <input type="number" class="cart-qty-inp" id="qty-<?= $idx ?>"
                           value="<?= $item['qty'] ?>" min="1" readonly/>
                    <button class="cart-qty-btn" onclick="changeQty(<?= $idx ?>, 1)">+</button>
                  </div>
                </td>
                <td>
                  <span class="cart-subtotal" id="sub-<?= $idx ?>">
                    <?= CURRENCY ?><?= number_format($item['price'] * $item['qty']) ?>.00
                  </span>
                </td>
                <td>
                  <button class="cart-remove" onclick="removeItem(<?= $idx ?>)" title="Remove">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <!-- Order Summary -->
      <div class="col-lg-4">
        <div class="order-summary">
          <div class="summary-title">Order Summary</div>

          <!-- Coupon Form -->
          <form method="POST" action="<?= SITE_URL ?>/apply-coupon.php" class="coupon-row">
            <input type="text" name="coupon" class="coupon-input"
                   placeholder="Coupon code (e.g. <?= PROMO_CODE ?>)"
                   value="<?= isset($_SESSION['coupon']) ? htmlspecialchars($_SESSION['coupon']) : '' ?>"/>
            <button type="submit" class="coupon-btn">Apply</button>
          </form>

          <div class="summary-row">
            <span class="label">Subtotal</span>
            <span class="value" id="summarySubtotal"><?= CURRENCY ?><?= number_format($subtotal) ?>.00</span>
          </div>
          <div class="summary-row">
            <span class="label">Discount</span>
            <span class="value" style="color:#28a745">-<?= CURRENCY ?><?= number_format($discount) ?>.00</span>
          </div>
          <div class="summary-row">
            <span class="label">Shipping</span>
            <span class="value"><?= CURRENCY ?><?= SHIPPING_FEE ?>.00</span>
          </div>
          <div class="summary-row total">
            <span class="label">Total</span>
            <span class="value" id="summaryTotal"><?= CURRENCY ?><?= number_format($total) ?>.00</span>
          </div>

          <button class="checkout-btn" onclick="window.location='<?= SITE_URL ?>/checkout.php'">
            <i class="fa-solid fa-lock me-2"></i>Proceed to Checkout
          </button>
          <button class="continue-btn" onclick="window.location='<?= SITE_URL ?>/index.php'">
            <i class="fa-solid fa-arrow-left me-2"></i>Continue Shopping
          </button>

          <div class="payment-icons mt-3">
            <span class="payment-icon">bKash</span>
            <span class="payment-icon">Nagad</span>
            <span class="payment-icon">Rocket</span>
            <span class="payment-icon">COD</span>
            <span class="payment-icon">Card</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<script>
// Cart data from PHP (used for client-side qty update display)
const cartPrices = <?= json_encode(array_column($cart_items, 'price', null)) ?>;
const shippingFee = <?= SHIPPING_FEE ?>;

function changeQty(idx, delta) {
    const inp = document.getElementById('qty-' + idx);
    if (!inp) return;
    const newQty = Math.max(1, parseInt(inp.value) + delta);
    inp.value = newQty;
    const price = <?= json_encode(array_map(fn($i) => $i['price'], $cart_items)) ?>[idx];
    document.getElementById('sub-' + idx).textContent = '<?= CURRENCY ?>' + (price * newQty).toLocaleString() + '.00';
    recalcTotal();
    // TODO: AJAX call to update session: fetch('<?= SITE_URL ?>/api/cart-update.php', {method:'POST', body: JSON.stringify({idx, qty: newQty})});
}

function removeItem(idx) {
    const row = document.getElementById('cart-row-' + idx);
    if (row) row.remove();
    recalcTotal();
    // TODO: AJAX call: fetch('<?= SITE_URL ?>/api/cart-remove.php', {method:'POST', body: JSON.stringify({idx})});
}

function recalcTotal() {
    let sub = 0;
    document.querySelectorAll('.cart-subtotal').forEach(el => {
        sub += parseFloat(el.textContent.replace(/[^0-9.]/g, '')) || 0;
    });
    document.getElementById('summarySubtotal').textContent = '<?= CURRENCY ?>' + sub.toLocaleString() + '.00';
    document.getElementById('summaryTotal').textContent = '<?= CURRENCY ?>' + (sub + shippingFee).toLocaleString() + '.00';
}
</script>

<?php include 'includes/footer.php'; ?>