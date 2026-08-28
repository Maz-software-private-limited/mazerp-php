<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/blog-helpers.php';

$listing = get_blog_featured_and_recent();
$featured = $listing['featured'];
$recent = $listing['recent'];
include __DIR__ . '/includes/header.php';
?>

<!-- BLOG HERO -->
<section class="blog-hero">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-feather-pointed"></i> Resources</span>
    <h1>The MazERP Blog</h1>
    <p>Expert tips, compliance guides, and growth strategies for Indian business owners, retailers, and wholesalers.</p>
  </div>
</section>

<!-- BLOG LISTING -->
<section class="blog-container">
  <div class="container">

    <!-- FEATURED POST -->
    <div class="blog-featured reveal">
      <a href="<?php echo blog_post_url($featured['slug']); ?>" class="blog-featured-img-link" aria-label="Read Featured Post">
        <?php blog_render_image($featured, 'blog-featured-img', 1200, 675); ?>
      </a>
      <div class="blog-featured-body">
        <div class="blog-meta">
          <span><i class="fa-solid fa-star" style="color: var(--amber);"></i> Featured Post</span>
          <span><i class="fa-solid fa-calendar"></i> <?php echo blog_format_date($featured['date']); ?></span>
          <span><i class="fa-solid fa-clock"></i> <?php echo (int) $featured['read_min']; ?> min read</span>
        </div>
        <h2><a href="<?php echo blog_post_url($featured['slug']); ?>" style="color: var(--text);"><?php echo htmlspecialchars($featured['title']); ?></a></h2>
        <p><?php echo htmlspecialchars($featured['excerpt']); ?></p>
        <div>
          <a href="<?php echo blog_post_url($featured['slug']); ?>" class="btn btn-primary">Read Article &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <!-- POST GRID -->
    <h2 style="font-family: var(--font-heading); font-size: 1.8rem; font-weight: 700; color: var(--text); margin-top: 60px; margin-bottom: 24px;" class="reveal">Recent Articles</h2>

    <div class="blog-grid reveal">
      <?php foreach ($recent as $post): ?>
      <div class="blog-card">
        <a href="<?php echo blog_post_url($post['slug']); ?>" style="display: block;">
          <?php blog_render_image($post, 'blog-card-img', 960, 540); ?>
        </a>
        <div class="blog-card-body">
          <div class="blog-meta">
            <span><i class="fa-solid fa-user"></i> By MazERP Team</span>
            <span><i class="fa-solid fa-clock"></i> <?php echo (int) $post['read_min']; ?> min read</span>
          </div>
          <h3><a href="<?php echo blog_post_url($post['slug']); ?>" style="color: var(--text);"><?php echo htmlspecialchars($post['title']); ?></a></h3>
          <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
          <div style="margin-top: auto;">
            <a href="<?php echo blog_post_url($post['slug']); ?>" class="blog-read-more">Read Article &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
