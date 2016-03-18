<?php
/*
Template Name: FOI landing
*/
get_header(); ?>
    <div class="fww">
        <div class="banner" role="banner">
            <?php get_template_part('breadcrumb'); ?>
        </div>
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
                                <?php foreach(information_requests_by_year() as $foi_year => $posts) : ?>
                                        <h2><?php echo  $foi_year; ?></h2>
                                        <?php foreach($posts as $post) : setup_postdata($post); ?>
                                            <?php $foi_reference = get_post_meta( $post->ID, 'foi-reference', true ); ?>
                                            <figure>
                                                <figcaption>
                                                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </figcaption>
                                                <figcaption>
                                                    <?php if (isset($foi_reference)) :?>
                                                        <p>FOI reference: <?php echo $foi_reference ?> </p>
                                                    <?php endif; ?>
                                                </figcaption>
                                                <hr class="line-stroke">
                                            </figure>
                                        <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        s
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php get_footer(); ?>