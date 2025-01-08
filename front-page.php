<?php
/**
 * The front page template file
 *
 * This template is used to display a static homepage.
 *
 * @package XPress
 */

get_header(); // Include the header.php file.
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" style="background: #333; color: white; padding: 50px 0;">
        <div class="container text-center">
            <h1 class="display-4">Welcome to XPress</h1>
            <p class="lead">Your source for the latest news and updates.</p>
            <a href="#featured-posts" class="btn btn-primary btn-lg">Explore News</a>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts py-5">
        <div class="container">
            <header class="section-header text-center mb-4">
                <h2 class="section-title">Featured News</h2>
            </header>
            <div class="row">
                <?php
                // Query for featured posts (category slug 'featured').
                $featured_query = new WP_Query(array(
                    'category_name' => 'featured',
                    'posts_per_page' => 3,
                ));

                if ($featured_query->have_posts()) :
                    while ($featured_query->have_posts()) : $featured_query->the_post();
                        ?>
                        <div class="col-md-4">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="card-img-top">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </article>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="text-center">No featured posts found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="latest-news py-5 bg-light">
        <div class="container">
            <header class="section-header text-center mb-4">
                <h2 class="section-title">Latest News</h2>
            </header>
            <div class="row">
                <?php
                // Query for latest posts.
                $latest_query = new WP_Query(array(
                    'posts_per_page' => 6,
                ));

                if ($latest_query->have_posts()) :
                    while ($latest_query->have_posts()) : $latest_query->the_post();
                        ?>
                        <div class="col-md-4">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="card-img-top">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                                </div>
                            </article>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="text-center">No news posts found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main><!-- #primary -->

<?php
get_footer(); // Include the footer.php file.
?>
