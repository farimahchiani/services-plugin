<?php

defined('ABSPATH') || exit;

$number   = isset($attributes['number']) ? absint($attributes['number']) : 5;
$order    = isset($attributes['order']) ? sanitize_key($attributes['order']) : 'DESC';
$orderby  = isset($attributes['orderby']) ? sanitize_key($attributes['orderby']) : 'date';
$category = isset($attributes['category']) ? sanitize_text_field($attributes['category']) : '';
$minPrice = isset($attributes['minPrice']) ? floatval($attributes['minPrice']) : 0;
$maxPrice = isset($attributes['maxPrice']) ? floatval($attributes['maxPrice']) : 0;

$args = [
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => $number,
    'orderby'        => $orderby,
    'order'          => $order,
];

if (!empty($category)) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'service_category',
            'field'    => 'slug',
            'terms'    => $category,
        ]
    ];
}


$meta_query = [];

if ($minPrice > 0) {
    $meta_query[] = [
        'key'     => 'service_price',
        'value'   => $minPrice,
        'compare' => '>=',
        'type'    => 'NUMERIC',
    ];
}

if ($maxPrice > 0) {
    $meta_query[] = [
        'key'     => 'service_price',
        'value'   => $maxPrice,
        'compare' => '<=',
        'type'    => 'NUMERIC',
    ];
}

if (!empty($meta_query)) {
    $args['meta_query'] = $meta_query;
}

$query = new WP_Query($args);

if (!$query->have_posts()) {
    return;
}

ob_start();
?>

<div class="services-carousel">

    <?php while ($query->have_posts()) : $query->the_post(); ?>

        <article class="service-item">

            <?php if (has_post_thumbnail()) : ?>
                <div class="service-image">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>

            <h3 class="service-title"><?php the_title(); ?></h3>

            <div class="service-excerpt">
                <?php the_excerpt(); ?>
            </div>

        </article>

    <?php endwhile; ?>

</div>

<?php

wp_reset_postdata();

echo wp_kses_post(ob_get_clean());
