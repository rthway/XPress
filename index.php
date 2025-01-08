<?php
/**
 * The main template file.
 *
 * This file is required for a WordPress theme and acts as the fallback template.
 *
 * @package XPress
 */

get_header(); // Include the header.php file.
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <section class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="entry-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="post-author"><?php the_author_posts_link(); ?></span>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer">
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                    </footer>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                // Display pagination if necessary.
                the_posts_pagination(array(
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
        </section>
    <?php else : ?>
        <section class="no-results">
            <h2>No Posts Found</h2>
            <p>It seems we can’t find what you’re looking for. Try searching for something else.</p>
            <?php get_search_form(); ?>
        </section>
    <?php endif; ?>
</main>

<?php
get_sidebar(); // Include the sidebar.php file if available.
get_footer(); // Include the footer.php file.
?>
