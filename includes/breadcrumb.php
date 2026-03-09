<?php
// ============================================================
//  ElegantTex — includes/breadcrumb.php
//  Usage: set $breadcrumbs array before including, e.g.:
//  $breadcrumbs = [
//      ['label' => 'Home',       'href' => SITE_URL.'/index.php'],
//      ['label' => 'Sofa Cover', 'href' => SITE_URL.'/category.php?cat=sofa-cover'],
//      ['label' => 'Product Name'], // last item — no href, no arrow
//  ];
// ============================================================
if (!isset($breadcrumbs) || empty($breadcrumbs)) {
    $breadcrumbs = [['label' => 'Home', 'href' => SITE_URL . '/index.php']];
}
$total = count($breadcrumbs);
?>
<div class="page-breadcrumb">
  <div class="container-fluid bc-inner">
    <nav aria-label="breadcrumb">
      <ol class="bc-list">
        <?php foreach ($breadcrumbs as $i => $crumb):
              $isLast = ($i === $total - 1); ?>
          <li class="bc-item <?= $isLast ? 'bc-active' : '' ?>">
            <?php if (!$isLast && isset($crumb['href'])): ?>
              <a href="<?= $crumb['href'] ?>" class="bc-link">
                <?php if ($i === 0): ?><i class="fa-solid fa-house"></i><?php endif; ?>
                <?= htmlspecialchars($crumb['label']) ?>
              </a>
              <span class="bc-sep"><i class="fa-solid fa-chevron-right"></i></span>
            <?php else: ?>
              <span class="bc-current">
                <?= htmlspecialchars($crumb['label']) ?>
              </span>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ol>
    </nav>
  </div>
</div>