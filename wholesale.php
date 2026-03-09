<?php
// ============================================================
//  ElegantTex — wholesale.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Wholesale';
$active_nav = 'wholesale';

// Wholesale inquiry form handler — replace with DB insert + email
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']    ?? '');
    $phone   = trim($_POST['phone']   ?? '');
    $email   = trim($_POST['email']   ?? '');
    $biz     = trim($_POST['business']?? '');
    $qty     = trim($_POST['qty']     ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$name || !$phone) {
        $error = 'Name and phone number are required.';
    } else {
        // TODO: mail(SITE_EMAIL, "Wholesale Inquiry from $name", ...) or DB insert
        $success = 'Thank you! Your wholesale inquiry has been received. We will contact you within 24 hours.';
    }
}

$tiers = [
    ['qty'=>'10–24 pieces',  'discount'=>'5%',  'icon'=>'fa-box',       'color'=>'#3490f3', 'label'=>'Starter'],
    ['qty'=>'25–49 pieces',  'discount'=>'10%', 'icon'=>'fa-boxes-stacked','color'=>'#28a745','label'=>'Growth'],
    ['qty'=>'50–99 pieces',  'discount'=>'15%', 'icon'=>'fa-warehouse',  'color'=>'var(--warning)', 'label'=>'Business'],
    ['qty'=>'100+ pieces',   'discount'=>'20%', 'icon'=>'fa-building',   'color'=>'var(--primary)', 'label'=>'Enterprise'],
];

$benefits = [
    ['icon'=>'fa-tag',          'title'=>'Up to 20% Off',           'desc'=>'Guaranteed lowest price on bulk orders'],
    ['icon'=>'fa-truck-fast',   'title'=>'Priority Shipping',        'desc'=>'Orders dispatched within 48 hours'],
    ['icon'=>'fa-headset',      'title'=>'Dedicated Account Manager','desc'=>'A single point of contact for all your needs'],
    ['icon'=>'fa-rotate-left',  'title'=>'Easy Returns',             'desc'=>'Hassle-free returns on faulty items'],
    ['icon'=>'fa-file-invoice', 'title'=>'Invoice & GST',            'desc'=>'Proper invoices for your business records'],
    ['icon'=>'fa-palette',      'title'=>'Custom Branding',          'desc'=>'Add your logo/label for orders above 100 pcs'],
];

$breadcrumbs = [
    ['label'=>'Home',      'href'=> SITE_URL.'/index.php'],
    ['label'=>'Wholesale'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- Page Hero -->
<div class="page-hero-primary">
  <div class="container-fluid px-4">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 text-white">
        <span class="page-hero-badge">Wholesale Programme</span>
        <h1 class="page-hero-title mt-2">Buy More, Save More</h1>
        <p class="page-hero-desc">Special pricing for retailers, resellers & interior decorators. Get up to 20% off on bulk orders with dedicated support.</p>
        <a href="#inquiry-form" class="btn-hero-cta mt-3 d-inline-block">
          <i class="fa-solid fa-envelope me-2"></i>Send Inquiry
        </a>
      </div>
      <div class="col-lg-5 text-center d-none d-lg-block">
        <div style="font-size:120px;filter:drop-shadow(0 8px 24px rgba(0,0,0,.3))">📦</div>
      </div>
    </div>
  </div>
</div>

<!-- Discount Tiers -->
<section class="py-5">
  <div class="container-fluid px-4">
    <div class="section-header mb-4">
      <h3 class="section-title">Wholesale Discount Tiers</h3>
      <p class="section-sub">The more you order, the more you save — automatically</p>
    </div>
    <div class="row g-3">
      <?php foreach ($tiers as $tier): ?>
      <div class="col-6 col-md-3">
        <div class="tier-card">
          <div class="tier-icon" style="background:<?= $tier['color'] ?>22;color:<?= $tier['color'] ?>">
            <i class="fa-solid <?= $tier['icon'] ?>"></i>
          </div>
          <div class="tier-label"><?= $tier['label'] ?></div>
          <div class="tier-qty"><?= $tier['qty'] ?></div>
          <div class="tier-discount" style="color:<?= $tier['color'] ?>"><?= $tier['discount'] ?> OFF</div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="py-5" style="background:var(--bg-light)">
  <div class="container-fluid px-4">
    <div class="section-header mb-4">
      <h3 class="section-title">Why Buy Wholesale from ElegantTex?</h3>
    </div>
    <div class="row g-3">
      <?php foreach ($benefits as $b): ?>
      <div class="col-md-4 col-sm-6">
        <div class="benefit-card">
          <div class="benefit-icon"><i class="fa-solid <?= $b['icon'] ?>"></i></div>
          <div>
            <h6><?= $b['title'] ?></h6>
            <p><?= $b['desc'] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Featured Wholesale Products -->
<section class="py-5">
  <div class="container-fluid px-4">
    <div class="section-header mb-4">
      <h3 class="section-title">Popular Wholesale Products</h3>
      <a href="<?= SITE_URL ?>/category.php" class="section-link">View All <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row g-3">
      <?php
      $wholesale_products = [
          ['id'=>4, 'name'=>'Flower Print Sofa Cover',       'price'=>2125,'compare_price'=>2500,'discount_pct'=>15,'badge'=>'Bulk -15%','badge_type'=>'sale','rating'=>4.9,'reviews'=>76,'emoji'=>'🛋️'],
          ['id'=>2, 'name'=>'Velvet Chair Cover Royal Blue',  'price'=>1980,'compare_price'=>2200,'discount_pct'=>10,'badge'=>'Bulk -10%','badge_type'=>'sale','rating'=>4.8,'reviews'=>48,'emoji'=>'🪑'],
          ['id'=>7, 'name'=>'3D Dining Table Cover Set',      'price'=>2720,'compare_price'=>3200,'discount_pct'=>15,'badge'=>'Bulk -15%','badge_type'=>'sale','rating'=>4.9,'reviews'=>89,'emoji'=>'🍽️'],
          ['id'=>8, 'name'=>'Floral Cushion Cover (Set 4)',   'price'=>1020,'compare_price'=>1200,'discount_pct'=>15,'badge'=>'Bulk -15%','badge_type'=>'sale','rating'=>4.6,'reviews'=>44,'emoji'=>'🛏️'],
      ];
      foreach ($wholesale_products as $product): include 'includes/product_card.php'; endforeach;
      ?>
    </div>
  </div>
</section>

<!-- Inquiry Form -->
<section class="py-5" style="background:var(--bg-light)" id="inquiry-form">
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="contact-form-card">
          <h3 class="contact-form-title"><i class="fa-solid fa-handshake me-2"></i>Wholesale Inquiry</h3>
          <p style="color:var(--text-muted);font-size:14px;margin-bottom:24px">Fill in your details and we'll send you our full wholesale price list within 24 hours.</p>

          <?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
          <?php if ($error):   ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>

          <form method="POST">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name <span class="required-star">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Your name" value="<?= htmlspecialchars($_POST['name']??'') ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number <span class="required-star">*</span></label>
                <input type="tel" name="phone" class="form-control" placeholder="+8801XXXXXXXXX" value="<?= htmlspecialchars($_POST['phone']??'') ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Optional" value="<?= htmlspecialchars($_POST['email']??'') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Business / Shop Name</label>
                <input type="text" name="business" class="form-control" placeholder="Your business name" value="<?= htmlspecialchars($_POST['business']??'') ?>">
              </div>
              <div class="col-12">
                <label class="form-label">Estimated Monthly Quantity</label>
                <select name="qty" class="form-select">
                  <option value="">Select range</option>
                  <option value="10-24"  <?= ($_POST['qty']??'')==='10-24'?'selected':'' ?>>10–24 pieces</option>
                  <option value="25-49"  <?= ($_POST['qty']??'')==='25-49'?'selected':'' ?>>25–49 pieces</option>
                  <option value="50-99"  <?= ($_POST['qty']??'')==='50-99'?'selected':'' ?>>50–99 pieces</option>
                  <option value="100+"   <?= ($_POST['qty']??'')==='100+'?'selected':'' ?>>100+ pieces</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Message / Product Interest</label>
                <textarea name="message" class="form-control" rows="4" placeholder="Which products are you interested in? Any special requirements?"><?= htmlspecialchars($_POST['message']??'') ?></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-form-submit">
                  <i class="fa-solid fa-paper-plane me-2"></i>Send Wholesale Inquiry
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>