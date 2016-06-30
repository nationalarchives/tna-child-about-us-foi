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
                        <article>
                            <?php
                            /** The first loop */
                            if (have_posts()) : while (have_posts())  the_post() ?>
                                <div class="entry-header"><h1><?php echo get_the_title() ?></h1></div>
                                <div class="entry-content">
                                    <?php echo the_content() ?>
                                    <?php wp_reset_postdata(); ?>
                                    <section>
                                        <?php
                                        $foi_year = ""; // assign $date_old to nothing to start
                                        $foi_month = ""; // assign $date_old to nothing to start
                                        $get_the_foi_year_old = get_the_time("Y") - 2; // get $date_new in "Month Year" format

                                        // get information requests from WP
                                        $args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => -1,
                                            'date_query' => array(
                                                array(
                                                    'after' => $get_the_foi_year_old,
                                                ),
                                            ),

                                        );

                                        // new instance of WP_Quert
                                        $foi_posts = new WP_Query($args);

                                        if ($foi_posts->have_posts()) :
                                            while ($foi_posts->have_posts()) : $foi_posts->the_post(); // run the custom loop ?>

                                                <?php
                                                $get_the_foi_year = get_the_time("Y"); // get $date_new in "Month Year" format
                                                $get_the_foi_month = get_the_time("F"); // get $date_new in "Month Year" format

                                                $get_foi_request_reference = get_post_meta($post->ID, 'foi_reference', true)
                                                ?>
                                                <?php if ($foi_year != $get_the_foi_year) : // run the check on $date_old and $date_new, and output accordingly ?>
                                                    <h2><?php echo $get_the_foi_year; ?></h2>
                                                    <hr class="line-stroke">
                                                <?php endif; ?>

                                                <?php if ($foi_month != $get_the_foi_month) : // run the check on $date_old and $date_new, and output accordingly ?>
                                                    <h3><?php echo $get_the_foi_month; ?></h3>
                                                <?php endif; ?>
                                                <a href="<?php echo make_path_relative(get_permalink()); ?>">
                                                    <div>
                                                        <?php the_title(); ?>
                                                        <?php echo '<br /><span>FOI request reference: ' . $get_foi_request_reference . '</span>' ?>
                                                    </div>
                                                </a>
                                                <?php $foi_month = $get_the_foi_month; // update $date_old ?>
                                                <?php $foi_year = $get_the_foi_year; // update $date_old ?>


                                            <?php endwhile; // end the custom loop
                                            ?>
                                        <?php endif; ?>
                                    </section>
                                    <?php wp_reset_postdata(); // always reset post data after a custom query ?>
                                </div>
                            <?php endif; ?>
                        </article>
                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </main>
    </div>
<?php get_footer(); ?>