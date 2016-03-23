<?php
/*
Template Name: FOI landing
*/
get_header();


?>
    <div class="foi_requests">
        <?php get_template_part('breadcrumb'); ?>
        <main id="main" class="content-area" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php
                            /** The first loop */
                            while (have_posts())  the_post() ?>
                            <div class="entry-header"><h2><?php echo get_the_title() ?></h2></div>
                            <div class="entry-content">
                                <?php echo the_content() ?>
                                <?php wp_reset_postdata(); ?>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <div id="post-<?php the_ID(); ?>">
                                        <!-- post content etc goes here  -->
                                    </div><!-- end .post-wrap -->
                                <?php endwhile; ?>
                                    <!-- previous next nav -->
                                <?php else : ?>
                                    <!-- posts not found info -->
                                <?php endif; ?>
                                <?php
                                // array to use for checking today's date
                                $foi_today = getdate() ;

                                // get information requests from WP
                                $posts = get_posts(array(
                                    'numberposts' => -1,
                                    'post_type' => 'post',
                                ));

                                // new instance of WP_Quert
                                $archive_query = new WP_Query( $posts );

                                ?>
                                <figure>
                                    <?php
                                    $foi_year = ""; // assign $date_old to nothing to start
                                    $foi_month = ""; // assign $date_old to nothing to start
                                    ?>
                                    <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

                                        <?php
                                        $get_the_foi_year = get_the_time("Y"); // get $date_new in "Month Year" format
                                        $get_the_foi_month = get_the_time("F"); // get $date_new in "Month Year" format
                                        $get_the_foi_year_old = get_the_time("Y") -3; // get $date_new in "Month Year" format
                                        $get_foi_request_reference = get_post_meta($post->ID, 'foi_reference', true)
                                        ?>
                                        <?php if ( $foi_year != $get_the_foi_year ) : // run the check on $date_old and $date_new, and output accordingly ?>
                                            <h2><?php echo $get_the_foi_year; ?></h2>
                                            <hr class="line-stroke">
                                        <?php endif; ?>

                                        <?php if ( $foi_month != $get_the_foi_month ) : // run the check on $date_old and $date_new, and output accordingly ?>
                                            <h3><?php echo $get_the_foi_month; ?></h3>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(); ?>">
                                            <figcaption>
                                                <?php the_title(); ?>
                                                <?php echo '<br /><span>FOI request reference: '.$get_foi_request_reference.'</span>' ?>
                                            </figcaption>
                                        </a>
                                        <?php $foi_month = $get_the_foi_month; // update $date_old ?>
                                        <?php $foi_year = $get_the_foi_year; // update $date_old ?>


                                    <?php endwhile; // end the custom loop ?>
                                </figure>
                                <?php wp_reset_postdata(); // always reset post data after a custom query ?>
                            </div>
                        </article>
                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </main>
    </div>
<?php get_footer(); ?>