<?php
// ============================================================
//  ElegantTex — includes/head.php
//  Shared <head> block included on every page.
//  Usage: include 'includes/head.php'; (pass $page_title first)
// ============================================================
if (!isset($page_title)) $page_title = SITE_NAME;
if (!isset($extra_css))  $extra_css  = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= htmlspecialchars(SITE_TAGLINE) ?>"/>
  <title><?= htmlspecialchars($page_title) ?> – <?= SITE_NAME ?></title>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <!-- Main stylesheet -->
  <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css"/>
  <!-- Page-specific CSS (optional) -->
  <?php if ($extra_css): ?>
  <style><?= $extra_css ?></style>
  <?php endif; ?>
</head>
<body>