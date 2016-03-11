<?php
/*
Template Name: FOI landing
*/
get_header(); ?>
    <div class="fww">
        <div class="banner" role="banner">
            <?php get_template_part( 'breadcrumb' ); ?>
        </div>
        <main id="main" class="content-area" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-header">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php get_footer(); ?>