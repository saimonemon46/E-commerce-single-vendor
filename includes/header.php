<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ElegantTex – Home Covers & More</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- Discount Announcement Bar -->
    <?php include 'includes/announce.php'; ?>

    <!-- ===== HEADER ===== -->
    <header class="site-header">
      <div class="container-fluid px-4">
        <div class="row align-items-center py-2 g-2">
          <!-- Logo -->
          <div class="col-auto">
            <a href="index.html" class="brand-logo">
              <span class="brand-icon"
                ><i class="fa-solid fa-layer-group"></i
              ></span>
              <span class="brand-text">Elegant<strong>Tex</strong></span>
            </a>
          </div>
          <!-- Search -->
          <div class="col">
            <div class="search-wrapper">
              <input
                type="text"
                class="form-control search-input"
                placeholder="I am shopping for..."
              />
              <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </div>
          <!-- Header Actions -->
          <div class="col-auto header-actions">
            <span class="helpline"
              ><i class="fa-solid fa-phone me-1"></i>+8801896224057</span
            >
            <a href="login.html" class="btn btn-outline-primary btn-sm ms-3">
              <i class="fa-regular fa-user me-1"></i>Login
            </a>
            <a href="register.html" class="btn btn-primary btn-sm ms-2"
              >Register</a
            >
            <a href="cart.html" class="cart-icon ms-3">
              <i class="fa-solid fa-cart-shopping"></i>
              <span class="cart-badge">3</span>
            </a>
          </div>
        </div>
      </div>
      <?php include 'includes/nav.php'; ?>
    </header>
    <?php include 'includes/sidebar.php'; ?>


