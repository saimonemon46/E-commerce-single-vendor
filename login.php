<?php
// ============================================================
//  ElegantTex — login.php
// ============================================================
require_once 'includes/config.php';

$page_title = 'Login';
$active_nav = '';
$error      = '';

// Handle POST — replace with real DB auth
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone    = trim($_POST['phone']    ?? '');
    $password = trim($_POST['password'] ?? '');
    if (empty($phone) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        // TODO: Query DB, verify password_verify($password, $hashed)
        // On success: $_SESSION['user_id'] = $user['id']; $_SESSION['user_name'] = $user['name'];
        // header('Location: '.SITE_URL.'/index.php'); exit;
        $error = 'Invalid phone or password. (Backend not connected yet)';
    }
}

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
?>

<main class="py-5" style="background:var(--bg-light);min-height:70vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="product-detail-card">
          <div class="text-center mb-4">
            <span class="brand-icon d-inline-flex mb-2">
              <i class="fa-solid fa-layer-group"></i>
            </span>
            <h3 class="section-title mb-1">Welcome Back</h3>
            <p style="color:var(--text-muted);font-size:14px">Login to your <?= SITE_NAME ?> account</p>
          </div>

          <?php if ($error): ?>
          <div class="alert alert-danger" style="font-size:13px;"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>

          <form method="POST" action="<?= SITE_URL ?>/login.php">
            <div class="mb-3">
              <label class="form-label">Phone Number <span class="required-star">*</span></label>
              <input type="tel" name="phone" class="form-control"
                     placeholder="+8801XXXXXXXXX"
                     value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required/>
            </div>
            <div class="mb-3">
              <label class="form-label">Password <span class="required-star">*</span></label>
              <input type="password" name="password" class="form-control" placeholder="••••••••" required/>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3" style="font-size:13px">
              <label><input type="checkbox" name="remember"> Remember me</label>
              <a href="<?= SITE_URL ?>/forgot-password.php" style="color:var(--primary)">Forgot password?</a>
            </div>
            <button type="submit" class="btn-add-cart w-100">
              <i class="fa-solid fa-right-to-bracket me-2"></i>Login
            </button>
          </form>

          <p class="text-center mt-3" style="font-size:13px;color:var(--text-muted)">
            Don't have an account?
            <a href="<?= SITE_URL ?>/register.php" style="color:var(--primary);font-weight:700">Register</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>