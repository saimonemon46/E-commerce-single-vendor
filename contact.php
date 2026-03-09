<?php
// ============================================================
//  ElegantTex — contact.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Contact Us';
$active_nav = 'contact';

$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']    ?? '');
    $phone   = trim($_POST['phone']   ?? '');
    $email   = trim($_POST['email']   ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$name || !$phone || !$message) {
        $error = 'Please fill in all required fields.';
    } else {
        // TODO: mail(SITE_EMAIL, "Contact: $subject", ...) or DB insert
        $success = 'Your message has been sent successfully! We will get back to you within 24 hours.';
    }
}

$contact_items = [
    ['icon'=>'fa-phone',        'color'=>'var(--primary)', 'title'=>'Phone / Call',      'lines'=>[HELPLINE, 'Sun – Fri: 9am – 9pm']],
    ['icon'=>'fa-brands fa-whatsapp','color'=>'#25D366', 'title'=>'WhatsApp',            'lines'=>[WHATSAPP, 'Fastest response channel']],
    ['icon'=>'fa-envelope',     'color'=>'var(--primary)', 'title'=>'Email',             'lines'=>[SITE_EMAIL, 'Reply within 24 hours']],
    ['icon'=>'fa-location-dot', 'color'=>'var(--primary)', 'title'=>'Office Address',    'lines'=>['House 12, Road 4, Block B', 'Mirpur-1, Dhaka-1216, Bangladesh']],
];

$faq_items = [
    ['q'=>'What is the minimum wholesale order?',                  'a'=>'Minimum order for wholesale pricing is 10 pieces per design.'],
    ['q'=>'Do you deliver outside Dhaka?',                        'a'=>'Yes, we deliver to all 64 districts of Bangladesh via courier.'],
    ['q'=>'How long does delivery take?',                         'a'=>'Dhaka: 1–2 days. Outside Dhaka: 2–4 business days.'],
    ['q'=>'Can I return a product if it doesn\'t fit my sofa?',   'a'=>'Yes, we offer a 7-day return guarantee for size issues.'],
    ['q'=>'Do you offer custom printing or branding?',            'a'=>'Yes, available for wholesale orders of 100+ pieces. Contact us.'],
];

$breadcrumbs = [
    ['label'=>'Home',       'href'=> SITE_URL.'/index.php'],
    ['label'=>'Contact Us'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- Page Hero -->
<div class="page-hero-light">
  <div class="container-fluid px-4 text-center">
    <h1 class="page-hero-title-dark">Get in Touch</h1>
    <p class="page-hero-desc-dark">We're here to help — reach us via phone, WhatsApp, or the form below</p>
  </div>
</div>

<main class="py-5">
  <div class="container-fluid px-4">

    <!-- Contact Info Cards -->
    <div class="row g-3 mb-5">
      <?php foreach ($contact_items as $item): ?>
      <div class="col-6 col-md-3">
        <div class="contact-info-card">
          <div class="contact-info-icon" style="color:<?= $item['color'] ?>;background:<?= $item['color'] ?>18">
            <i class="fa-solid <?= $item['icon'] ?>"></i>
          </div>
          <h6><?= $item['title'] ?></h6>
          <?php foreach ($item['lines'] as $line): ?>
          <p><?= htmlspecialchars($line) ?></p>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Contact Form + Map -->
    <div class="row g-4">

      <!-- Form -->
      <div class="col-lg-7">
        <div class="contact-form-card">
          <h3 class="contact-form-title"><i class="fa-solid fa-paper-plane me-2"></i>Send Us a Message</h3>

          <?php if ($success): ?><div class="alert alert-success mt-3"><?= $success ?></div><?php endif; ?>
          <?php if ($error):   ?><div class="alert alert-danger  mt-3"><?= $error ?></div><?php endif; ?>

          <form method="POST" class="mt-4">
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
                <label class="form-label">Subject</label>
                <select name="subject" class="form-select">
                  <option value="">Select a topic</option>
                  <option value="Order Query"      <?= ($_POST['subject']??'')==='Order Query'?'selected':'' ?>>Order Query</option>
                  <option value="Product Info"     <?= ($_POST['subject']??'')==='Product Info'?'selected':'' ?>>Product Information</option>
                  <option value="Return/Refund"    <?= ($_POST['subject']??'')==='Return/Refund'?'selected':'' ?>>Return / Refund</option>
                  <option value="Wholesale"        <?= ($_POST['subject']??'')==='Wholesale'?'selected':'' ?>>Wholesale Enquiry</option>
                  <option value="Other"            <?= ($_POST['subject']??'')==='Other'?'selected':'' ?>>Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Message <span class="required-star">*</span></label>
                <textarea name="message" class="form-control" rows="5" placeholder="How can we help you?" required><?= htmlspecialchars($_POST['message']??'') ?></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-form-submit">
                  <i class="fa-solid fa-paper-plane me-2"></i>Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Map + quick actions -->
      <div class="col-lg-5">
        <!-- Embedded Map placeholder -->
        <div class="map-placeholder">
          <div class="map-placeholder-inner">
            <i class="fa-solid fa-map-location-dot"></i>
            <p>Mirpur-1, Dhaka, Bangladesh</p>
            <a href="https://maps.google.com?q=Mirpur+Dhaka+Bangladesh" target="_blank" class="map-link">
              <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>Open in Google Maps
            </a>
          </div>
        </div>

        <!-- Quick action buttons -->
        <div class="quick-contact-btns mt-3">
          <a href="tel:<?= preg_replace('/\s+/','',$_ENV['HELPLINE']??HELPLINE) ?>" class="quick-btn quick-btn-call">
            <i class="fa-solid fa-phone"></i> Call Now
          </a>
          <a href="https://wa.me/<?= preg_replace('/\D/','',WHATSAPP) ?>?text=Hi+ElegantTex,+I+need+help" target="_blank" class="quick-btn quick-btn-wa">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp
          </a>
        </div>
      </div>
    </div>

    <!-- FAQ -->
    <div class="mt-5">
      <div class="section-header mb-4">
        <h3 class="section-title">Frequently Asked Questions</h3>
      </div>
      <div class="accordion" id="faqAccordion">
        <?php foreach ($faq_items as $i => $faq): ?>
        <div class="accordion-item faq-item">
          <h2 class="accordion-header">
            <button class="accordion-button faq-btn <?= $i>0?'collapsed':'' ?>" type="button"
                    data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
              <?= htmlspecialchars($faq['q']) ?>
            </button>
          </h2>
          <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i===0?'show':'' ?>" data-bs-parent="#faqAccordion">
            <div class="accordion-body faq-answer"><?= htmlspecialchars($faq['a']) ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php include 'includes/footer.php'; ?>