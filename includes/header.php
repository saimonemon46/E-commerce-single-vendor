<?php
// ============================================================
//  ElegantTex — includes/header.php
//  Sticky header (logo + search + actions) + main navbar
//  $active_nav — set this before including to highlight link
//    e.g. $active_nav = 'home';
// ============================================================
if (!isset($active_nav)) $active_nav = '';

// Cart count — will come from session/DB later
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;

// Nav links definition
$nav_links = [
    'home'           => ['label' => 'Home',           'href' => SITE_URL . '/index.php'],
    'best-selling'   => ['label' => 'Best Selling',   'href' => SITE_URL . '/best-selling.php'],
    'wholesale'      => ['label' => 'Wholesale',      'href' => SITE_URL . '/wholesale.php'],
    'new-collection' => ['label' => 'New Collection', 'href' => SITE_URL . '/new-collection.php'],
    'contact'        => ['label' => 'Contact',        'href' => SITE_URL . '/contact.php'],
    'blog'           => ['label' => 'Blog',           'href' => SITE_URL . '/blog.php'],
];

// Category links definition
$categories = [
    ['slug' => 'sofa-cover',     'icon' => 'fa-couch',    'label' => 'Sofa Cover'],
    ['slug' => 'chair-cover',    'icon' => 'fa-chair',    'label' => 'Chair Cover'],
    ['slug' => 'table-covers',   'icon' => 'fa-table',    'label' => 'Table Covers'],
    ['slug' => 'dining-combo',   'icon' => 'fa-utensils', 'label' => 'Trendy Dining Combo (3D)'],
    ['slug' => 'ac-covers',      'icon' => 'fa-wind',     'label' => 'AC Covers'],
    ['slug' => 'tv-covers',      'icon' => 'fa-tv',       'label' => 'TV Covers'],
    ['slug' => 'cushion-covers', 'icon' => 'fa-circle',   'label' => 'Cushion Covers'],
    ['slug' => 'carpet',         'icon' => 'fa-rug',      'label' => 'Carpet by ElegantTex'],
];
?>

<div class="sticky-top-wrapper">

  <!-- ===== HEADER ===== -->
  <header class="site-header">
    <div class="container-fluid px-4">
      <div class="row align-items-center py-2 g-2">

        <!-- Logo -->
        <div class="col-auto">
          <a href="<?= SITE_URL ?>/index.php" class="brand-logo">
            <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
            <span class="brand-text">Elegant<strong>Tex</strong></span>
          </a>
        </div>

        <!-- Search -->
        <div class="col">
          <form action="<?= SITE_URL ?>/search.php" method="GET" class="search-wrapper">
            <input type="text" name="q" class="form-control search-input"
                   placeholder="I am shopping for..."
                   value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"/>
            <button type="submit" class="search-btn">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>

        <!-- Header Actions -->
        <div class="col-auto header-actions">
          <span class="helpline">
            <i class="fa-solid fa-phone me-1"></i><?= HELPLINE ?>
          </span>

          <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?= SITE_URL ?>/account.php" class="btn btn-outline-primary btn-sm ms-3">
              <i class="fa-regular fa-user me-1"></i><?= htmlspecialchars($_SESSION['user_name'] ?? 'Account') ?>
            </a>
            <a href="<?= SITE_URL ?>/logout.php" class="btn btn-primary btn-sm ms-2">Logout</a>
          <?php else: ?>
            <a href="<?= SITE_URL ?>/login.php" class="btn btn-outline-primary btn-sm ms-3">
              <i class="fa-regular fa-user me-1"></i>Login
            </a>
            <a href="<?= SITE_URL ?>/register.php" class="btn btn-primary btn-sm ms-2">Register</a>
          <?php endif; ?>

          <a href="<?= SITE_URL ?>/cart.php" class="cart-icon ms-3">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-badge" id="cartBadge"><?= $cart_count ?></span>
          </a>
        </div>

      </div>
    </div>
  </header>

  <!-- ===== NAVBAR ===== -->
  <nav class="main-nav">
    <div class="container-fluid px-4">
      <div class="row g-0 align-items-stretch">

        <!-- Category Dropdown -->
        <div class="col-auto position-relative">
          <div class="category-toggle" id="categoryToggle">
            <i class="fa-solid fa-bars me-2"></i> Categories
            <span class="see-all">(See All)</span>
            <i class="fa-solid fa-chevron-down ms-2 small"></i>
          </div>
          <div class="category-dropdown" id="categoryDropdown">
            <?php foreach ($categories as $cat): ?>
            <a href="<?= htmlspecialchars(SITE_URL . '/category.php?cat=' . urlencode($cat['slug'])) ?>">
              <i class="fa-solid <?= $cat['icon'] ?> me-2"></i><?= $cat['label'] ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Nav Links -->
        <div class="col nav-links-wrapper">
          <ul class="nav-links">
            <?php foreach ($nav_links as $key => $link): ?>
            <li>
              <a href="<?= $link['href'] ?>" <?= ($active_nav === $key) ? 'class="active"' : '' ?>>
                <?= $link['label'] ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>
    </div>
  </nav>

</div><!-- end .sticky-top-wrapper -->