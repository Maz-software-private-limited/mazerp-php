<?php

function get_blog_posts(): array
{
    $posts = require __DIR__ . '/blog-posts.php';

    usort($posts, function (array $a, array $b): int {
        $date_cmp = strcmp($b['date'], $a['date']);
        if ($date_cmp !== 0) {
            return $date_cmp;
        }

        return ($b['sort_order'] ?? 0) <=> ($a['sort_order'] ?? 0);
    });

    return $posts;
}

function get_blog_featured_and_recent(): array
{
    $posts = get_blog_posts();
    $featured = $posts[0];
    $recent = array_slice($posts, 1);

    $promoted = [];
    $regular = [];
    foreach ($recent as $post) {
        if (!empty($post['promote_recent'])) {
            $promoted[] = $post;
        } else {
            $regular[] = $post;
        }
    }

    return [
        'featured' => $featured,
        'recent'   => array_merge($promoted, $regular),
    ];
}

function blog_post_url(string $slug): string
{
    return htmlspecialchars($slug . '.php', ENT_QUOTES, 'UTF-8');
}

function blog_format_date(string $date): string
{
    $dt = DateTime::createFromFormat('Y-m-d', $date);
    if (!$dt) {
        return htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
    }

    return $dt->format('F j, Y');
}

function blog_render_image(array $post, string $class, int $width = 600, int $height = 338): void
{
    $alt = htmlspecialchars($post['alt'], ENT_QUOTES, 'UTF-8');
    $class_attr = htmlspecialchars($class, ENT_QUOTES, 'UTF-8');

    $image = $post['image'];
    if ($class === 'blog-card-img' && !empty($post['card_image'])) {
        $image = $post['card_image'] . '?v=3';
    }
    $image = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

    if (!empty($post['image_webp']) && $class !== 'blog-card-img') {
        $webp = htmlspecialchars($post['image_webp'], ENT_QUOTES, 'UTF-8');
        echo '<picture>';
        echo '<source srcset="' . $webp . '" type="image/webp">';
        echo '<img src="' . $image . '" class="' . $class_attr . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '" loading="lazy" decoding="async">';
        echo '</picture>';
        return;
    }

    echo '<img src="' . $image . '" class="' . $class_attr . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '" loading="lazy" decoding="async"' . ($class === 'blog-card-img' ? ' style="object-position: center;"' : '') . '>';
}
