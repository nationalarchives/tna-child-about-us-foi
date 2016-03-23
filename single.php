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
                                $date_of_request = get_the_time('D F Y');
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
                            <?php
                            /* Display the attachments */
                            $research_pdf = get_post_meta( $post->ID, 'foi_pdf', true );
                            $pdf_id = get_pdf_id($research_pdf);
                            $file_path = filesize(get_attached_file($pdf_id));
                            $pdf_size = $file_path;
                            if (!empty ($research_pdf)) :?>
                                View document: <a target="_b lank" href="<?php echo $research_pdf ?>"> (PDF, '<?php echo formatSizeUnits($pdf_size); ?>')</a>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </article>
                </main>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>