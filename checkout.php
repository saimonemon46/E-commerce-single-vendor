<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout – ElegantTex</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css"/>
  <style>
    .page-breadcrumb { background:var(--bg-light); padding:12px 0; border-bottom:1px solid var(--border); font-size:13px; }
    .page-breadcrumb a { color:var(--primary); font-weight:600; }
    .page-breadcrumb span { color:var(--text-muted); margin:0 6px; }

    /* Progress Steps */
    .checkout-steps { display:flex; align-items:center; justify-content:center; margin-bottom:32px; gap:0; }
    .step { display:flex; align-items:center; gap:8px; }
    .step-num {
      width:36px; height:36px;
      border-radius:50%;
      background:var(--border);
      color:var(--text-muted);
      display:flex; align-items:center; justify-content:center;
      font-weight:800; font-size:14px;
      transition:var(--transition);
    }
    .step.active .step-num { background:var(--primary); color:#fff; }
    .step.done .step-num { background:#28a745; color:#fff; }
    .step-label { font-size:13px; font-weight:700; color:var(--text-muted); }
    .step.active .step-label { color:var(--primary); }
    .step.done .step-label { color:#28a745; }
    .step-line { width:60px; height:2px; background:var(--border); margin:0 8px; }
    .step-line.done { background:var(--primary); }

    /* Form Sections */
    .checkout-section {
      background:var(--white);
      border:1px solid var(--border);
      border-radius:var(--radius);
      padding:24px;
      box-shadow:var(--shadow);
      margin-bottom:20px;
    }
    .checkout-section-title {
      font-family:'Playfair Display', serif;
      font-size:18px; font-weight:700;
      color:var(--dark);
      margin-bottom:20px;
      padding-bottom:10px;
      border-bottom:2px solid var(--primary);
      display:flex; align-items:center; gap:10px;
    }
    .checkout-section-title i { color:var(--primary); }
    .form-label { font-weight:700; font-size:13px; color:var(--dark); }
    .form-control, .form-select {
      border:1px solid var(--border);
      border-radius:8px;
      padding:10px 14px;
      font-size:14px;
      font-family:'Nunito', sans-serif;
      transition:var(--transition);
    }
    .form-control:focus, .form-select:focus {
      border-color:var(--primary);
      box-shadow:0 0 0 3px var(--primary-light);
    }
    .required-star { color:var(--primary); }

    /* Payment Methods */
    .payment-method {
      border:2px solid var(--border);
      border-radius:8px;
      padding:14px 16px;
      cursor:pointer;
      transition:var(--transition);
      display:flex; align-items:center; gap:12px;
      margin-bottom:10px;
    }
    .payment-method:hover { border-color:var(--primary); }
    .payment-method.selected { border-color:var(--primary); background:var(--primary-light); }
    .payment-method input[type="radio"] { accent-color:var(--primary); width:16px; height:16px; }
    .payment-method-label { font-weight:700; color:var(--dark); font-size:14px; }
    .payment-method-desc { font-size:12px; color:var(--text-muted); }
    .payment-logo { font-size:24px; }

    /* Order Summary Sidebar */
    .order-summary-side {
      background:var(--white);
      border:1px solid var(--border);
      border-radius:var(--radius);
      overflow:hidden;
      box-shadow:var(--shadow);
      position:sticky; top:90px;
    }
    .order-summary-header {
      background:var(--primary);
      color:#fff;
      padding:16px 20px;
      font-weight:800;
      font-size:16px;
    }
    .order-summary-body { padding:16px 20px; }
    .order-item { display:flex; gap:12px; padding:10px 0; border-bottom:1px solid #f5f5f5; }
    .order-item-img { width:52px; height:52px; background:var(--bg-light); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; }
    .order-item-name { font-weight:700; font-size:13px; }
    .order-item-qty { font-size:12px; color:var(--text-muted); }
    .order-item-price { font-weight:900; color:var(--primary); font-size:14px; margin-left:auto; flex-shrink:0; }
    .summary-row-side { display:flex; justify-content:space-between; font-size:14px; padding:8px 0; }
    .summary-total-side { font-weight:900; font-size:18px; color:var(--dark); border-top:2px solid var(--border); padding-top:14px; margin-top:4px; }
    .summary-total-side .value { color:var(--primary); }
    .place-order-btn {
      width:100%; background:var(--primary); color:#fff; border:none; border-radius:8px;
      padding:14px; font-size:16px; font-weight:900; cursor:pointer;
      transition:var(--transition); margin-top:16px;
    }
    .place-order-btn:hover { background:var(--primary-dark); transform:translateY(-2px); box-shadow:0 8px 20px rgba(255,4,158,0.3); }
    .secure-note { font-size:12px; color:var(--text-muted); text-align:center; margin-top:10px; }
    .secure-note i { color:#28a745; }
  </style>
</head>
<body>

<div class="announcement-bar">
  <div class="announcement-inner">
    <i class="fa-solid fa-couch me-2"></i>
    GET UPTO 17% DISCOUNT &nbsp;|&nbsp; CODE: <strong>ELEGANT17</strong>
  </div>
</div>

<header class="site-header">
  <div class="container-fluid px-4">
    <div class="row align-items-center py-2">
      <div class="col-auto">
        <a href="index.html" class="brand-logo">
          <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
          <span class="brand-text">Elegant<strong>Tex</strong></span>
        </a>
      </div>
      <div class="col text-center">
        <span style="font-size:14px; color:var(--text-muted);">
          <i class="fa-solid fa-lock me-1" style="color:var(--primary)"></i>
          Secure Checkout
        </span>
      </div>
      <div class="col-auto">
        <a href="cart.html" style="color:var(--text-muted); font-size:13px; font-weight:700;">
          <i class="fa-solid fa-arrow-left me-1"></i> Back to Cart
        </a>
      </div>
    </div>
  </div>
</header>

<div class="page-breadcrumb">
  <div class="container-fluid px-4">
    <a href="index.html">Home</a><span>›</span>
    <a href="cart.html">Cart</a><span>›</span>
    <span>Checkout</span>
  </div>
</div>

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

    <div class="row g-4">
      <!-- Checkout Form -->
      <div class="col-lg-8">

        <!-- Contact Info -->
        <div class="checkout-section">
          <div class="checkout-section-title">
            <i class="fa-solid fa-user"></i> Contact Information
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">First Name <span class="required-star">*</span></label>
              <input type="text" class="form-control" placeholder="e.g. Fatima" id="firstName"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name <span class="required-star">*</span></label>
              <input type="text" class="form-control" placeholder="e.g. Rahman" id="lastName"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number <span class="required-star">*</span></label>
              <input type="tel" class="form-control" placeholder="+8801XXXXXXXXX" id="phone"/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="email@example.com" id="email"/>
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
              <input type="text" class="form-control" placeholder="House/Road/Area" id="address"/>
            </div>
            <div class="col-md-4">
              <label class="form-label">Division <span class="required-star">*</span></label>
              <select class="form-select" id="division">
                <option value="">Select Division</option>
                <option>Dhaka</option>
                <option>Chittagong</option>
                <option>Sylhet</option>
                <option>Rajshahi</option>
                <option>Khulna</option>
                <option>Barisal</option>
                <option>Rangpur</option>
                <option>Mymensingh</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">District <span class="required-star">*</span></label>
              <input type="text" class="form-control" placeholder="e.g. Dhaka" id="district"/>
            </div>
            <div class="col-md-4">
              <label class="form-label">Postal Code</label>
              <input type="text" class="form-control" placeholder="e.g. 1207" id="postal"/>
            </div>
            <div class="col-12">
              <label class="form-label">Order Notes (Optional)</label>
              <textarea class="form-control" rows="2" placeholder="Any special instructions..."></textarea>
            </div>
          </div>
        </div>

        <!-- Payment Method -->
        <div class="checkout-section">
          <div class="checkout-section-title">
            <i class="fa-solid fa-credit-card"></i> Payment Method
          </div>

          <div class="payment-method selected" onclick="selectPayment(this, 'cod')">
            <input type="radio" name="payment" checked/>
            <span class="payment-logo">💵</span>
            <div>
              <div class="payment-method-label">Cash on Delivery (COD)</div>
              <div class="payment-method-desc">Pay when you receive your order</div>
            </div>
          </div>

          <div class="payment-method" onclick="selectPayment(this, 'bkash')">
            <input type="radio" name="payment"/>
            <span class="payment-logo">📱</span>
            <div>
              <div class="payment-method-label">bKash</div>
              <div class="payment-method-desc">Send money to 01896224057 (Personal)</div>
            </div>
          </div>

          <div class="payment-method" onclick="selectPayment(this, 'nagad')">
            <input type="radio" name="payment"/>
            <span class="payment-logo">💳</span>
            <div>
              <div class="payment-method-label">Nagad</div>
              <div class="payment-method-desc">Send money to 01896224057 (Personal)</div>
            </div>
          </div>

          <div class="payment-method" onclick="selectPayment(this, 'rocket')">
            <input type="radio" name="payment"/>
            <span class="payment-logo">🚀</span>
            <div>
              <div class="payment-method-label">Rocket (DBBL)</div>
              <div class="payment-method-desc">Send money to your agent</div>
            </div>
          </div>

          <!-- bKash details (hidden by default) -->
          <div id="bkashDetails" style="display:none" class="mt-3 p-3 bg-light rounded">
            <p style="font-size:13px; font-weight:700;">Send payment to: <span style="color:var(--primary)">01896224057 (Personal)</span></p>
            <label class="form-label">bKash Transaction ID <span class="required-star">*</span></label>
            <input type="text" class="form-control" placeholder="Enter transaction ID after payment"/>
          </div>
        </div>

      </div>

      <!-- Order Summary -->
      <div class="col-lg-4">
        <div class="order-summary-side">
          <div class="order-summary-header">
            <i class="fa-solid fa-receipt me-2"></i> Order Summary
          </div>
          <div class="order-summary-body">
            <!-- Demo items -->
            <div class="order-item">
              <div class="order-item-img">🛋️</div>
              <div>
                <div class="order-item-name">Flower Print Sofa Cover</div>
                <div class="order-item-qty">2-Seater × 1</div>
              </div>
              <div class="order-item-price">৳2,500</div>
            </div>
            <div class="order-item">
              <div class="order-item-img">🪑</div>
              <div>
                <div class="order-item-name">Velvet Chair Cover Royal Blue</div>
                <div class="order-item-qty">Standard × 2</div>
              </div>
              <div class="order-item-price">৳4,400</div>
            </div>

            <div style="border-top:1px solid var(--border); margin-top:12px; padding-top:12px;">
              <div class="summary-row-side"><span style="color:var(--text-muted)">Subtotal</span><span style="font-weight:700">৳6,900</span></div>
              <div class="summary-row-side"><span style="color:var(--text-muted)">Discount (17%)</span><span style="color:#28a745; font-weight:700">-৳1,170</span></div>
              <div class="summary-row-side"><span style="color:var(--text-muted)">Shipping</span><span style="font-weight:700">৳60</span></div>
              <div class="summary-row-side summary-total-side"><span>Total</span><span class="value">৳5,790</span></div>
            </div>

            <button class="place-order-btn" onclick="placeOrder()">
              <i class="fa-solid fa-check-circle me-2"></i>Place Order
            </button>
            <p class="secure-note"><i class="fa-solid fa-shield-halved me-1"></i>Your information is 100% secure</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<a href="https://wa.me/8801896224057" class="whatsapp-float" target="_blank">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
<script>
  function selectPayment(el, method) {
    document.querySelectorAll('.payment-method').forEach(p => p.classList.remove('selected'));
    el.classList.add('selected');
    el.querySelector('input[type="radio"]').checked = true;
    document.getElementById('bkashDetails').style.display = (method === 'bkash' || method === 'nagad' || method === 'rocket') ? 'block' : 'none';
  }

  function placeOrder() {
    const first = document.getElementById('firstName').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();
    const division = document.getElementById('division').value;

    if (!first || !phone || !address || !division) {
      alert('Please fill in all required fields marked with *');
      return;
    }

    // In real implementation: AJAX POST to place_order.php
    alert('Order placed successfully! We will contact you at ' + phone + ' shortly. Thank you!');
    sessionStorage.removeItem('et_cart');
    window.location.href = 'index.html';
  }

  document.addEventListener('DOMContentLoaded', updateCartBadge);
</script>
</body>
</html>
