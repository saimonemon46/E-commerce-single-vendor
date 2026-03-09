<?php
// ============================================================
//  ElegantTex — register.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Register';
$active_nav = '';
$error      = '';
$success    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']     ?? '');
    $phone    = trim($_POST['phone']    ?? '');
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm  = trim($_POST['confirm']  ?? '');

    if (empty($name) || empty($phone) || empty($password)) {
        $error = 'Please fill in all required fields.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        // TODO: Check phone/email unique in DB, hash password, INSERT user
        // $hashed = password_hash($password, PASSWORD_BCRYPT);
        // On success: redirect to login
        $success = 'Account created successfully! You can now login.';
    }
}

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
?>

<main class="py-5" style="background:var(--bg-light);min-height:70vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="product-detail-card">
          <div class="text-center mb-4">
            <span class="brand-icon d-inline-flex mb-2"><i class="fa-solid fa-layer-group"></i></span>
            <h3 class="section-title mb-1">Create Account</h3>
            <p style="color:var(--text-muted);font-size:14px">Join <?= SITE_NAME ?> for exclusive deals</p>
          </div>

          <?php if ($error):   ?><div class="alert alert-danger"  style="font-size:13px"><?= htmlspecialchars($error) ?></div><?php endif; ?>
          <?php if ($success): ?><div class="alert alert-success" style="font-size:13px"><?= htmlspecialchars($success) ?></div><?php endif; ?>

          <form method="POST" action="<?= SITE_URL ?>/register.php">
            <div class="row g-3">
              <div class="col-12">
                <label class="form-label">Full Name <span class="required-star">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Your full name"
                       value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number <span class="required-star">*</span></label>
                <input type="tel" name="phone" class="form-control" placeholder="+8801XXXXXXXXX"
                       value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Optional"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Password <span class="required-star">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Min 6 characters" required/>
              </div>
              <div class="col-md-6">
                <label class="form-label">Confirm Password <span class="required-star">*</span></label>
                <input type="password" name="confirm" class="form-control" placeholder="Repeat password" required/>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-add-cart w-100">
                  <i class="fa-solid fa-user-plus me-2"></i>Create Account
                </button>
              </div>
            </div>
          </form>

          <p class="text-center mt-3" style="font-size:13px;color:var(--text-muted)">
            Already have an account?
            <a href="<?= SITE_URL ?>/login.php" style="color:var(--primary);font-weight:700">Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>