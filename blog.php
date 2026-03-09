<?php
// ============================================================
//  ElegantTex — blog.php  (Blog Listing)
// ============================================================
require_once 'includes/config.php';

$page_title = 'Blog';
$active_nav = 'blog';
$page       = max(1, (int)($_GET['page'] ?? 1));
$per_page   = 6;
$filter_tag = $_GET['tag'] ?? '';

// Mock posts — replace with DB query
$all_posts = [
    ['id'=>1, 'slug'=>'how-to-choose-sofa-cover',     'title'=>'How to Choose the Perfect Sofa Cover for Your Home',    'excerpt'=>'With so many options available, picking the right sofa cover can be overwhelming. Here\'s our complete guide to finding the perfect fit, fabric, and style.',                  'cover'=>'🛋️','cat'=>'Sofa Tips',   'tag'=>'sofa',   'author'=>'ElegantTex Team','date'=>'15 Mar 2025','read'=>5],
    ['id'=>2, 'slug'=>'clean-fabric-sofa-cover',      'title'=>'5 Easy Ways to Clean Your Fabric Sofa Cover',           'excerpt'=>'Keeping your sofa cover clean doesn\'t have to be a chore. Follow these 5 simple steps to maintain a fresh, hygienic cover that lasts for years.',                 'cover'=>'🧼','cat'=>'Care Guide',  'tag'=>'care',   'author'=>'ElegantTex Team','date'=>'08 Mar 2025','read'=>4],
    ['id'=>3, 'slug'=>'3d-dining-cover-trend',        'title'=>'Why 3D Dining Cover Sets Are Taking Over Bangladesh',    'excerpt'=>'The 3D dining cover trend has exploded across Bangladesh\'s interior design scene. We explore why homeowners and decorators are obsessed with this look.',             'cover'=>'🍽️','cat'=>'Trends',     'tag'=>'trends', 'author'=>'Design Desk','date'=>'01 Mar 2025','read'=>6],
    ['id'=>4, 'slug'=>'best-sofa-cover-material',     'title'=>'Velvet vs Jacquard: Which Sofa Cover Fabric Wins?',     'excerpt'=>'Both velvet and jacquard have their fans. We compare durability, aesthetics, washing ease, and price to help you decide which is right for your home.',           'cover'=>'🎨','cat'=>'Buying Guide','tag'=>'guide',  'author'=>'ElegantTex Team','date'=>'22 Feb 2025','read'=>7],
    ['id'=>5, 'slug'=>'carpet-placement-tips',        'title'=>'Carpet Placement Tips That Will Transform Any Room',    'excerpt'=>'The right carpet in the wrong spot can ruin a room. Our interior design tips show exactly where to place rugs and carpets for maximum visual impact.',               'cover'=>'🏡','cat'=>'Interior Tips','tag'=>'carpet', 'author'=>'Design Desk','date'=>'14 Feb 2025','read'=>5],
    ['id'=>6, 'slug'=>'wholesale-furniture-cover',    'title'=>'Starting a Furniture Cover Resale Business in 2025',    'excerpt'=>'Bangladesh\'s growing middle class is spending more on home décor. Learn how to start a profitable furniture cover resale business with low investment.',           'cover'=>'📦','cat'=>'Business',   'tag'=>'business','author'=>'ElegantTex Team','date'=>'05 Feb 2025','read'=>8],
    ['id'=>7, 'slug'=>'ac-cover-importance',          'title'=>'Why an AC Cover Is Essential During Winter',            'excerpt'=>'Most people forget about their AC unit during winter. A good AC cover protects the unit from dust, rust and extends its lifespan significantly.',                  'cover'=>'❄️','cat'=>'AC Covers',  'tag'=>'ac',     'author'=>'ElegantTex Team','date'=>'27 Jan 2025','read'=>4],
    ['id'=>8, 'slug'=>'cushion-cover-styling',        'title'=>'10 Cushion Cover Combinations That Always Look Good',   'excerpt'=>'Cushion covers are the easiest way to refresh a room. Here are 10 colour and pattern combinations our stylists recommend for every type of living room.',      'cover'=>'🛏️','cat'=>'Interior Tips','tag'=>'cushion','author'=>'Design Desk','date'=>'18 Jan 2025','read'=>5],
];

$tags = [''=>'All','sofa'=>'Sofa','care'=>'Care Guide','trends'=>'Trends','guide'=>'Buying Guide','carpet'=>'Carpet','business'=>'Business','ac'=>'AC Covers','cushion'=>'Cushion'];

if ($filter_tag) {
    $all_posts = array_values(array_filter($all_posts, fn($p) => $p['tag'] === $filter_tag));
}

$featured_post  = $all_posts[0] ?? null;
$total_posts    = count($all_posts);
$total_pages    = max(1, ceil($total_posts / $per_page));
$posts          = array_slice($all_posts, ($page-1)*$per_page, $per_page);

$breadcrumbs = [
    ['label'=>'Home', 'href'=> SITE_URL.'/index.php'],
    ['label'=>'Blog'],
];

include 'includes/head.php';
include 'includes/announcement.php';
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- Page Hero -->
<div class="page-hero-light">
  <div class="container-fluid px-4 text-center">
    <h1 class="page-hero-title-dark">ElegantTex Blog</h1>
    <p class="page-hero-desc-dark">Tips, trends & guides for your home décor journey</p>
  </div>
</div>

<main class="py-5">
  <div class="container-fluid px-4">

    <!-- Featured Post -->
    <?php if ($featured_post && $page === 1 && !$filter_tag): ?>
    <div class="blog-featured mb-5">
      <div class="blog-featured-cover"><?= $featured_post['cover'] ?></div>
      <div class="blog-featured-body">
        <span class="blog-cat-tag"><?= $featured_post['cat'] ?></span>
        <h2 class="blog-featured-title"><?= htmlspecialchars($featured_post['title']) ?></h2>
        <p class="blog-featured-excerpt"><?= htmlspecialchars($featured_post['excerpt']) ?></p>
        <div class="blog-meta">
          <span><i class="fa-regular fa-user me-1"></i><?= $featured_post['author'] ?></span>
          <span><i class="fa-regular fa-calendar me-1"></i><?= $featured_post['date'] ?></span>
          <span><i class="fa-regular fa-clock me-1"></i><?= $featured_post['read'] ?> min read</span>
        </div>
        <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= $featured_post['slug'] ?>" class="btn-form-submit mt-3 d-inline-block">
          Read Article <i class="fa-solid fa-arrow-right ms-2"></i>
        </a>
      </div>
    </div>
    <?php endif; ?>

    <div class="row g-4">
      <!-- Posts Grid -->
      <div class="col-lg-8">

        <!-- Tag Filter -->
        <div class="cat-tabs-wrapper mb-4" style="flex-wrap:wrap">
          <?php foreach ($tags as $slug => $label):
            $url = SITE_URL.'/blog.php'.($slug?'?tag='.$slug:'');
          ?>
          <a href="<?= $url ?>" class="cat-tab <?= $filter_tag===$slug?'active':'' ?>"><?= $label ?></a>
          <?php endforeach; ?>
        </div>

        <div class="row g-3">
          <?php foreach ($posts as $post): ?>
          <div class="col-md-6">
            <article class="blog-card">
              <div class="blog-card-cover"><?= $post['cover'] ?></div>
              <div class="blog-card-body">
                <span class="blog-cat-tag"><?= $post['cat'] ?></span>
                <h5 class="blog-card-title">
                  <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= $post['slug'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                  </a>
                </h5>
                <p class="blog-card-excerpt"><?= htmlspecialchars(substr($post['excerpt'],0,100)).'…' ?></p>
                <div class="blog-meta">
                  <span><i class="fa-regular fa-calendar me-1"></i><?= $post['date'] ?></span>
                  <span><i class="fa-regular fa-clock me-1"></i><?= $post['read'] ?> min</span>
                </div>
              </div>
            </article>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <nav class="mt-4"><ul class="pagination">
          <li class="page-item <?= $page<=1?'disabled':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$page-1])) ?>">‹</a></li>
          <?php for($p=1;$p<=$total_pages;$p++): ?>
          <li class="page-item <?= $p===$page?'active':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$p])) ?>"><?= $p ?></a></li>
          <?php endfor; ?>
          <li class="page-item <?= $page>=$total_pages?'disabled':'' ?>"><a class="page-link" href="?<?= http_build_query(array_merge($_GET,['page'=>$page+1])) ?>">›</a></li>
        </ul></nav>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">

        <!-- Search -->
        <div class="blog-sidebar-card mb-4">
          <h6 class="blog-sidebar-title">Search Blog</h6>
          <form action="<?= SITE_URL ?>/search.php" method="GET" class="search-wrapper" style="margin-top:0">
            <input type="text" name="q" class="form-control search-input" placeholder="Search articles…">
            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>

        <!-- Categories -->
        <div class="blog-sidebar-card mb-4">
          <h6 class="blog-sidebar-title">Categories</h6>
          <ul class="blog-sidebar-links">
            <?php foreach (array_slice($tags,1) as $slug => $label): ?>
            <li>
              <a href="<?= SITE_URL ?>/blog.php?tag=<?= $slug ?>">
                <?= $label ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Popular Posts -->
        <div class="blog-sidebar-card mb-4">
          <h6 class="blog-sidebar-title">Popular Posts</h6>
          <?php foreach (array_slice($all_posts,0,4) as $p): ?>
          <a href="<?= SITE_URL ?>/blog-post.php?slug=<?= $p['slug'] ?>" class="blog-popular-item">
            <div class="blog-popular-cover"><?= $p['cover'] ?></div>
            <div>
              <p class="blog-popular-title"><?= htmlspecialchars(substr($p['title'],0,55)).'…' ?></p>
              <span class="blog-popular-date"><?= $p['date'] ?></span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>

        <!-- WhatsApp CTA -->
        <div class="blog-sidebar-card" style="background:linear-gradient(135deg,#003322,#25D366);color:#fff;text-align:center">
          <div style="font-size:40px;margin-bottom:10px">💬</div>
          <h6 style="color:#fff;margin-bottom:6px">Questions? Chat with us!</h6>
          <p style="font-size:13px;opacity:.85;margin-bottom:14px">Get instant answers on WhatsApp</p>
          <a href="https://wa.me/<?= preg_replace('/\D/','',WHATSAPP) ?>" target="_blank"
             style="background:#fff;color:#25D366;font-weight:800;font-size:13px;padding:10px 20px;border-radius:8px;display:inline-block">
            <i class="fa-brands fa-whatsapp me-2"></i>Chat Now
          </a>
        </div>

      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>