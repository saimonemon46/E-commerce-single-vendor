<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cart – ElegantTex</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css"/>
  <style>
    .page-breadcrumb { background:var(--bg-light); padding:12px 0; border-bottom:1px solid var(--border); font-size:13px; }
    .page-breadcrumb a { color:var(--primary); font-weight:600; }
    .page-breadcrumb span { color:var(--text-muted); margin:0 6px; }

    /* Cart Table */
    .cart-table { background:var(--white); border-radius:var(--radius); box-shadow:var(--shadow); overflow:hidden; border:1px solid var(--border); }
    .cart-table thead th { background:var(--bg-light); font-weight:800; color:var(--dark); padding:14px 20px; border:none; font-size:13px; }
    .cart-table tbody td { padding:16px 20px; vertical-align:middle; border-bottom:1px solid var(--border); }
    .cart-product-img { width:70px; height:70px; background:var(--bg-light); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:30px; }
    .cart-product-name { font-weight:700; color:var(--dark); font-size:14px; }
    .cart-product-meta { font-size:12px; color:var(--text-muted); margin-top:2px; }
    .cart-qty-control { display:flex; align-items:center; gap:0; width:fit-content; }
    .cart-qty-btn { width:32px; height:34px; background:var(--bg-light); border:1px solid var(--border); font-size:16px; font-weight:700; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:var(--transition); }
    .cart-qty-btn:first-child { border-radius:6px 0 0 6px; }
    .cart-qty-btn:last-child { border-radius:0 6px 6px 0; }
    .cart-qty-btn:hover { background:var(--primary); color:#fff; border-color:var(--primary); }
    .cart-qty-inp { width:42px; height:34px; border:1px solid var(--border); border-left:none; border-right:none; text-align:center; font-size:14px; font-weight:700; outline:none; font-family:'Nunito',sans-serif; }
    .cart-remove { color:#ef486a; background:none; border:none; font-size:18px; cursor:pointer; transition:var(--transition); }
    .cart-remove:hover { color:#c0392b; transform:scale(1.2); }
    .cart-subtotal { font-weight:900; color:var(--primary); font-size:16px; }
    .cart-empty { text-align:center; padding:60px 20px; color:var(--text-muted); }
    .cart-empty i { font-size:64px; margin-bottom:16px; color:var(--border); }

    /* Order Summary */
    .order-summary {
      background:var(--white);
      border-radius:var(--radius);
      border:1px solid var(--border);
      padding:24px;
      box-shadow:var(--shadow);
      position:sticky; top:90px;
    }
    .summary-title { font-family:'Playfair Display',serif; font-size:18px; font-weight:700; color:var(--dark); margin-bottom:16px; }
    .summary-row { display:flex; justify-content:space-between; font-size:14px; padding:10px 0; border-bottom:1px solid #f5f5f5; }
    .summary-row:last-of-type { border-bottom:none; }
    .summary-row.total { font-weight:900; font-size:18px; color:var(--dark); border-top:2px solid var(--border); padding-top:14px; margin-top:4px; }
    .summary-row .label { color:var(--text-muted); }
    .summary-row .value { font-weight:700; }
    .summary-row.total .value { color:var(--primary); }
    .coupon-row { display:flex; gap:8px; margin-bottom:16px; }
    .coupon-input { flex:1; border:1px solid var(--border); border-radius:8px; padding:10px 14px; font-size:14px; outline:none; font-family:'Nunito',sans-serif; }
    .coupon-input:focus { border-color:var(--primary); }
    .coupon-btn { background:var(--primary); color:#fff; border:none; border-radius:8px; padding:10px 18px; font-weight:800; cursor:pointer; transition:var(--transition); }
    .coupon-btn:hover { background:var(--primary-dark); }
    .checkout-btn { width:100%; background:var(--primary); color:#fff; border:none; border-radius:8px; padding:14px; font-size:16px; font-weight:900; cursor:pointer; transition:var(--transition); margin-top:16px; }
    .checkout-btn:hover { background:var(--primary-dark); transform:translateY(-2px); box-shadow:0 8px 20px rgba(255,4,158,0.3); }
    .continue-btn { width:100%; background:var(--white); color:var(--dark); border:2px solid var(--border); border-radius:8px; padding:12px; font-size:14px; font-weight:700; cursor:pointer; transition:var(--transition); margin-top:8px; }
    .continue-btn:hover { border-color:var(--dark); }
    .payment-icons { display:flex; gap:8px; margin-top:12px; flex-wrap:wrap; }
    .payment-icon { background:var(--bg-light); border:1px solid var(--border); border-radius:6px; padding:4px 10px; font-size:12px; font-weight:700; color:var(--text-muted); }
  </style>
</head>
<body>

<!-- Announcement Bar -->
<div class="announcement-bar">
  <div class="announcement-inner">
    <i class="fa-solid fa-couch me-2"></i>
    GET UPTO 17% DISCOUNT RIGHT NOW &nbsp;|&nbsp; USE CODE: <strong>ELEGANT17</strong>
  </div>
</div>

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
        <a href="login.html" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-user me-1"></i>Login</a>
        <a href="register.html" class="btn btn-primary btn-sm ms-2">Register</a>
        <a href="cart.html" class="cart-icon ms-3">
          <i class="fa-solid fa-cart-shopping"></i>
          <span class="cart-badge">0</span>
        </a>
      </div>
    </div>
  </div>
</header>

<!-- Breadcrumb -->
<div class="page-breadcrumb">
  <div class="container-fluid px-4">
    <a href="index.html">Home</a><span>›</span><span>Shopping Cart</span>
  </div>
</div>

<!-- Cart -->
<main class="py-4">
  <div class="container-fluid px-4">
    <h2 class="section-title mb-4"><i class="fa-solid fa-cart-shopping me-2" style="color:var(--primary)"></i>Shopping Cart</h2>

    <div class="row g-4">
      <!-- Cart Items -->
      <div class="col-lg-8">
        <div id="cartContent">
          <!-- Populated by JS -->
        </div>
      </div>

      <!-- Order Summary -->
      <div class="col-lg-4">
        <div class="order-summary">
          <div class="summary-title">Order Summary</div>

          <div class="coupon-row">
            <input type="text" class="coupon-input" placeholder="Coupon code (e.g. ELEGANT17)"/>
            <button class="coupon-btn">Apply</button>
          </div>

          <div class="summary-row"><span class="label">Subtotal</span><span class="value" id="summarySubtotal">৳0.00</span></div>
          <div class="summary-row"><span class="label">Discount</span><span class="value" style="color:#28a745">-৳0.00</span></div>
          <div class="summary-row"><span class="label">Shipping</span><span class="value">৳60.00</span></div>
          <div class="summary-row total"><span class="label">Total</span><span class="value" id="summaryTotal">৳60.00</span></div>

          <button class="checkout-btn" onclick="window.location='checkout.html'">
            <i class="fa-solid fa-lock me-2"></i>Proceed to Checkout
          </button>
          <button class="continue-btn" onclick="window.location='index.html'">
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

<a href="https://wa.me/8801896224057" class="whatsapp-float" target="_blank">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
<script>
  function renderCart() {
    const container = document.getElementById('cartContent');
    const subtotalEl = document.getElementById('summarySubtotal');
    const totalEl = document.getElementById('summaryTotal');
    updateCartBadge();

    if (!cart.length) {
      container.innerHTML = `
        <div class="cart-empty">
          <i class="fa-solid fa-cart-shopping"></i>
          <h5>Your cart is empty</h5>
          <p>Add some amazing covers to your cart!</p>
          <a href="index.html" class="btn btn-primary mt-3">Start Shopping</a>
        </div>`;
      return;
    }

    const rows = cart.map((item, idx) => `
      <tr>
        <td><div class="cart-product-img">🛋️</div></td>
        <td>
          <div class="cart-product-name">${item.name}</div>
          <div class="cart-product-meta">Size: 2-Seater &bull; Color: Floral Pink</div>
        </td>
        <td>৳${item.price.toLocaleString()}.00</td>
        <td>
          <div class="cart-qty-control">
            <button class="cart-qty-btn" onclick="changeQty(${idx}, -1)">−</button>
            <input type="number" class="cart-qty-inp" value="${item.qty}" min="1" readonly/>
            <button class="cart-qty-btn" onclick="changeQty(${idx}, 1)">+</button>
          </div>
        </td>
        <td><span class="cart-subtotal">৳${(item.price * item.qty).toLocaleString()}.00</span></td>
        <td><button class="cart-remove" onclick="removeItem(${idx})"><i class="fa-solid fa-trash-can"></i></button></td>
      </tr>
    `).join('');

    container.innerHTML = `
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
        <tbody>${rows}</tbody>
      </table>`;

    const sub = cart.reduce((s, i) => s + i.price * i.qty, 0);
    subtotalEl.textContent = '৳' + sub.toLocaleString() + '.00';
    totalEl.textContent = '৳' + (sub + 60).toLocaleString() + '.00';
  }

  function changeQty(idx, delta) {
    cart[idx].qty = Math.max(1, cart[idx].qty + delta);
    saveCart();
    renderCart();
  }

  function removeItem(idx) {
    cart.splice(idx, 1);
    saveCart();
    renderCart();
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Pre-populate demo cart
    if (!cart.length) {
      cart = [
        { id: 4, name: "Flower Print Sofa Cover", price: 2500, qty: 1 },
        { id: 2, name: "Velvet Chair Cover Royal Blue", price: 2200, qty: 2 },
      ];
      saveCart();
    }
    renderCart();
  });
</script>
</body>
</html>
