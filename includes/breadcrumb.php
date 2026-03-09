<?php
// ============================================================
//  ElegantTex — includes/breadcrumb.php
//  Usage: set $breadcrumbs array before including, e.g.:
//  $breadcrumbs = [
//      ['label' => 'Home',       'href' => SITE_URL.'/index.php'],
//      ['label' => 'Sofa Cover', 'href' => SITE_URL.'/category.php?cat=sofa-cover'],
//      ['label' => 'Product Name'], // last item — no href
//  ];
// ============================================================
if (!isset($breadcrumbs) || empty($breadcrumbs)) {
    $breadcrumbs = [['label' => 'Home', 'href' => SITE_URL . '/index.php']];
}
?>
<div class="page-breadcrumb">
  <div class="container-fluid px-4">
    <?php foreach ($breadcrumbs as $i => $crumb): ?>
      <?php if (isset($crumb['href'])): ?>
        <a href="<?= $crumb['href'] ?>"><?= htmlspecialchars($crumb['label']) ?></a>
        <?php if ($i < count($breadcrumbs) - 1): ?><span>›</span><?php endif; ?>
      <?php else: ?>
        <span class="text-muted"><?= htmlspecialchars($crumb['label']) ?></span>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>