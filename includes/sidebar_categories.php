<?php
// ============================================================
//  ElegantTex — includes/sidebar_categories.php
//  Left sidebar category list used on homepage hero section
// ============================================================
$sidebar_cats = [
    ['slug' => 'sofa-cover',     'icon' => 'fa-couch',    'label' => 'Sofa Cover'],
    ['slug' => 'chair-cover',    'icon' => 'fa-chair',    'label' => 'Chair Cover'],
    ['slug' => 'table-covers',   'icon' => 'fa-table',    'label' => 'Table Covers'],
    ['slug' => 'dining-combo',   'icon' => 'fa-utensils', 'label' => 'Dining Combo (3D)'],
    ['slug' => 'ac-covers',      'icon' => 'fa-wind',     'label' => 'AC Covers'],
    ['slug' => 'tv-covers',      'icon' => 'fa-tv',       'label' => 'TV Covers'],
    ['slug' => 'cushion-covers', 'icon' => 'fa-circle',   'label' => 'Cushion Covers'],
    ['slug' => 'carpet',         'icon' => 'fa-rug',      'label' => 'Carpet'],
];
?>
<div class="sidebar-categories">
  <?php foreach ($sidebar_cats as $cat): ?>
  <a href="<?= SITE_URL ?>/category.php?cat=<?= $cat['slug'] ?>" class="sidebar-cat-item">
    <i class="fa-solid <?= $cat['icon'] ?>"></i> <?= $cat['label'] ?>
  </a>
  <?php endforeach; ?>
</div>