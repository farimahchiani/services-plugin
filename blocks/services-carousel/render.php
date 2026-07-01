<?php


defined('ABSPATH') || exit;


$number = isset($attributes['number'])
    ? absint($attributes['number'])
    : 5;

$order = isset($attributes['order'])
    ? sanitize_key($attributes['order'])
    : 'DESC';

$orderby = isset($attributes['orderby'])
    ? sanitize_key($attributes['orderby'])
    : 'date';

$allowed_order = array(
    'ASC',
    'DESC',
);

if (! in_array($order, $allowed_order, true)) {
    $order = 'DESC';
}

$allowed_orderby = array(
    'date',
    'title',
);

if (! in_array($orderby, $allowed_orderby, true)) {
    $orderby = 'date';
}

$args = array(
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => $number,
    'orderby'        => $orderby,
    'order'          => $order,
);

$query = new WP_Query($args);

if (! $query->have_posts()) {
    return;
}

ob_start();
?>

<div class="services-carousel">

    <?php while ($query->have_posts()) : ?>

        <?php $query->the_post(); ?>

        <article class="service-item">

            <?php if (has_post_thumbnail()) : ?>

                <div class="service-image">

                    <?php the_post_thumbnail('medium'); ?>

                </div>

            <?php endif; ?>

            <h3 class="service-title">

                <?php the_title(); ?>

            </h3>

            <div class="service-excerpt">

                <?php the_excerpt(); ?>

            </div>

        </article>

    <?php endwhile; ?>

</div>

<?php

wp_reset_postdata();

echo wp_kses_post(ob_get_clean());
