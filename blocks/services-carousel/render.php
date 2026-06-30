<?php

defined('ABSPATH') || exit;

$number = $attributes['number'] ?? 5;

$query = new WP_Query([
    'post_type' => 'service',
    'posts_per_page' => $number
]);

echo '<div class="services-carousel">';

while ($query->have_posts()) {
    $query->the_post();

    echo '<div class="service-item">';
    echo '<h3>' . esc_html(get_the_title()) . '</h3>';
    echo '<p>' . esc_html(get_the_excerpt()) . '</p>';
    echo '</div>';
}

wp_reset_postdata();

echo '</div>';