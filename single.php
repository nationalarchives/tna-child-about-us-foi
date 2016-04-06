<?php
/*
    FOI details page
*/

get_header(); ?>

<?php get_template_part('breadcrumb'); ?>
    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="entry-content">
                            <?php
                                /* Variables */
                                $get_foi_request_reference = get_post_meta($post->ID, 'foi_reference', true);
                                $date_of_request = get_the_time('F Y');
                            ?>
                            <figure>
                                <figcaption>
                                    <?php echo 'FOI request reference: '. $get_foi_request_reference; ?>
                                </figcaption>
                                <figcaption>
                                    <?php echo 'Publication date: '.$date_of_request?>
                                </figcaption>
                            </figure>
                            <hr class="line-stroke">
                            <?php

                            /* Display content */
                            the_content();

                            ?>
                            <?php endwhile; ?>
                        </div>
                    </article>
                </main>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>