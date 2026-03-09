<?php
// ============================================================
//  ElegantTex — checkout.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Checkout';
$active_nav = '';

// Mock order items — in real app, pull from $_SESSION['cart']
$order_items = [
    ['name'=>'Flower Print Sofa Cover',      'size'=>'2 Seater', 'qty'=>1, 'price'=>2500, 'emoji'=>'🛋️'],
    ['name'=>'Velvet Chair Cover Royal Blue', 'size'=>'Standard', 'qty'=>2, 'price'=>2200, 'emoji'=>'🪑'],
];
$subtotal  = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $order_items));
$discount  = 0;
$total     = $subtotal - $discount + SHIPPING_FEE;

// Divisions list
$divisions = ['Dhaka','Chittagong','Sylhet','Rajshahi','Khulna','Barisal','Rangpur','Mymensingh'];

$breadcrumbs = [
    ['label'=>'Home',  'href'=> SITE_URL.'/index.php'],
    ['label'=>'Cart',  'href'=> SITE_URL.'/cart.php'],
    ['label'=>'Checkout'],
];

include 'includes/head.php';
include 'includes/announcement.php';
?>

<!-- Slim header for checkout (no full nav) -->
<div class="sticky-top-wrapper">
  <header class="site-header">
    <div class="container-fluid px-4">
      <div class="row align-items-center py-2">
        <div class="col-auto">
          <a href="<?= SITE_URL ?>/index.php" class="brand-logo">
            <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
            <span class="brand-text">Elegant<strong>Tex</strong></span>
          </a>
        </div>
        <div class="col text-center">
          <span style="font-size:14px;color:var(--text-muted)">
            <i class="fa-solid fa-lock me-1" style="color:var(--primary)"></i> Secure Checkout
          </span>
        </div>
        <div class="col-auto">
          <a href="<?= SITE_URL ?>/cart.php" style="color:var(--text-muted);font-size:13px;font-weight:700;">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Cart
          </a>
        </div>
      </div>
    </div>
  </header>
</div>

<?php include 'includes/breadcrumb.php'; ?>

<main class="py-4">
  <div class="container-fluid px-4">

    <!-- Progress Steps -->
    <div class="checkout-steps">
      <div class="step done">
        <div class="step-num"><i class="fa-solid fa-check"></i></div>
        <span class="step-label">Cart</span>
      </div>
      <div class="step-line done"></div>
      <div class="step active">
        <div class="step-num">2</div>
        <span class="step-label">Details</span>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-num">3</div>
        <span class="step-label">Payment</span>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-num">4</div>
        <span class="step-label">Confirm</span>
      </div>
    </div>

    <form method="POST" action="<?= SITE_URL ?>/place-order.php" id="checkoutForm">
    <div class="row g-4">

      <!-- Left: Checkout Sections -->
      <div class="col-lg-8">

        <!-- Contact Info -->
        <div class="checkout-section">
          <div class="checkout-section-title">
            <i class="fa-solid fa-user"></i> Contact Information
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">First Name <span class="required-star">*</span></label>
              <input type="text" name="first_name" class="form-control" placeholder="e.g. Fatima" required/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name <span class="required-star">*</span></label>
              <input type="text" name="last_name" class="form-control" placeholder="e.g. Rahman" required/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number <span class="required-star">*</span></label>
              <input type="tel" name="phone" class="form-control" placeholder="+8801XXXXXXXXX" required/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="email@example.com"/>
            </div>
          </div>
        </div>

        <!-- Shipping Address -->
        <div class="checkout-section">
          <div class="checkout-section-title">
            <i class="fa-solid fa-location-dot"></i> Shipping Address
          </div>
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Full Address <span class="required-star">*</span></label>
              <input type="text" name="address" class="form-control" placeholder="House / Road / Area" required/>
            </div>
            <div class="col-md-4">
              <label class="form-label">Division <span class="required-star">*</span></label>
              <select name="division" class="form-select" required>
                <option value="">Select Division</option>
                <?php foreach ($divisions as $div): ?>
                <option value="<?= $div ?>"><?= $div ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">District <span class="required-star">*</span></label>
              <input type="text" name="district" class="form-control" placeholder="e.g. Dhaka" required/>
            </div>
            <div class="col-md-4">
              <label class="form-label">Postal Code</label>
              <input type="text" name="postal_code" class="form-control" placeholder="e.g. 1207"/>
            </div>
            <div class="col-12">
              <label class="form-label">Order Notes (Optional)</label>
              <textarea name="notes" class="form-control" rows="2" placeholder="Any special instructions..."></textarea>
            </div>
          </div>
        </div>

        <!-- Payment Method -->
        <div class="checkout-section">
          <div class="checkout-section-title">
            <i class="fa-solid fa-credit-card"></i> Payment Method
          </div>

          <label class="payment-method selected" onclick="selectPayment(this, 'cod')">
            <input type="radio" name="payment_method" value="cod" checked/>
            <span class="payment-logo">💵</span>
            <div>
              <div class="payment-method-label">Cash on Delivery (COD)</div>
              <div class="payment-method-desc">Pay when you receive your order</div>
            </div>
          </label>

          <label class="payment-method" onclick="selectPayment(this, 'bkash')">
            <input type="radio" name="payment_method" value="bkash"/>
            <span class="payment-logo">📱</span>
            <div>
              <div class="payment-method-label">bKash</div>
              <div class="payment-method-desc">Send to <?= HELPLINE ?> (Personal)</div>
            </div>
          </label>

          <label class="payment-method" onclick="selectPayment(this, 'nagad')">
            <input type="radio" name="payment_method" value="nagad"/>
            <span class="payment-logo">💳</span>
            <div>
              <div class="payment-method-label">Nagad</div>
              <div class="payment-method-desc">Send to <?= HELPLINE ?> (Personal)</div>
            </div>
          </label>

          <label class="payment-method" onclick="selectPayment(this, 'rocket')">
            <input type="radio" name="payment_method" value="rocket"/>
            <span class="payment-logo">🚀</span>
            <div>
              <div class="payment-method-label">Rocket (DBBL)</div>
              <div class="payment-method-desc">Send to your nearest agent</div>
            </div>
          </label>

          <!-- Mobile payment transaction ID field -->
          <div id="txnIdBox" style="display:none" class="mt-3 p-3 rounded" style="background:var(--bg-light)">
            <label class="form-label">Transaction ID <span class="required-star">*</span></label>
            <input type="text" name="payment_ref" class="form-control"
                   placeholder="Enter transaction ID after payment" id="txnIdInput"/>
          </div>

        </div>

      </div><!-- /col-lg-8 -->

      <!-- Right: Order Summary -->
      <div class="col-lg-4">
        <div class="order-summary-side">
          <div class="order-summary-header">
            <i class="fa-solid fa-receipt me-2"></i>Order Summary
          </div>
          <div class="order-summary-body">

            <?php foreach ($order_items as $item): ?>
            <div class="order-item">
              <div class="order-item-img"><?= $item['emoji'] ?></div>
              <div>
                <div class="order-item-name"><?= htmlspecialchars($item['name']) ?></div>
                <div class="order-item-qty"><?= htmlspecialchars($item['size']) ?> × <?= $item['qty'] ?></div>
              </div>
              <div class="order-item-price">
                <?= CURRENCY ?><?= number_format($item['price'] * $item['qty']) ?>
              </div>
            </div>
            <?php endforeach; ?>

            <div style="border-top:1px solid var(--border);margin-top:12px;padding-top:12px;">
              <div class="summary-row-side">
                <span style="color:var(--text-muted)">Subtotal</span>
                <span style="font-weight:700"><?= CURRENCY ?><?= number_format($subtotal) ?></span>
              </div>
              <?php if ($discount > 0): ?>
              <div class="summary-row-side">
                <span style="color:var(--text-muted)">Discount</span>
                <span style="font-weight:700;color:#28a745">-<?= CURRENCY ?><?= number_format($discount) ?></span>
              </div>
              <?php endif; ?>
              <div class="summary-row-side">
                <span style="color:var(--text-muted)">Shipping</span>
                <span style="font-weight:700"><?= CURRENCY ?><?= SHIPPING_FEE ?></span>
              </div>
              <div class="summary-row-side summary-total-side">
                <span>Total</span>
                <span class="value"><?= CURRENCY ?><?= number_format($total) ?></span>
              </div>
            </div>

            <button type="submit" class="place-order-btn">
              <i class="fa-solid fa-check-circle me-2"></i>Place Order
            </button>
            <p class="secure-note">
              <i class="fa-solid fa-shield-halved me-1"></i>Your information is 100% secure
            </p>

          </div>
        </div>
      </div>

    </div>
    </form>
  </div>
</main>

<script>
function selectPayment(el, method) {
    document.querySelectorAll('.payment-method').forEach(p => p.classList.remove('selected'));
    el.classList.add('selected');
    el.querySelector('input[type="radio"]').checked = true;
    const txnBox  = document.getElementById('txnIdBox');
    const txnInput = document.getElementById('txnIdInput');
    if (['bkash','nagad','rocket'].includes(method)) {
        txnBox.style.display = 'block';
        txnInput.required = true;
    } else {
        txnBox.style.display = 'none';
        txnInput.required = false;
    }
}

document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    const phone = this.querySelector('[name="phone"]').value.trim();
    if (!phone) { e.preventDefault(); alert('Phone number is required.'); return; }
    // Additional client-side validation here before POST
});
</script>

<?php include 'includes/footer.php'; ?>