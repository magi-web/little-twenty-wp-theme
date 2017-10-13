<?php
/**
 * A Simple Category Template
 */

get_header(); ?>
    <div class="wrap">
        <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                // Check if there are any posts to display
                if ( have_posts() ) : ?>

                    <header class="archive-header">
                        <h1 class="archive-title"><?php echo single_cat_title( '', false ); ?></h1>


                        <?php
                        // Display optional category description
                        if ( category_description() ) : ?>
                            <div class="archive-meta"><?php echo category_description(); ?></div>
                        <?php endif; ?>
                    </header>

                    <ul>
                    <?php

    // The Loop
                    while ( have_posts() ) : the_post(); ?>
                        <li><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></li>

                    <?php endwhile;?>

                    </ul>
                <?php else: ?>
                    <p>Désolé, cette catégorie est vide.</p>


                <?php endif; ?>
            </main>
        </section>
    </div>
<?php get_footer(); ?>