<?php
/*
    FOI details page
*/
get_header();
?>
    <div class="container" id="page_wrap" role="main">
        <?php include get_template_directory() . '/breadcrumb.php'; ?>
        <div class="row">
            <div class="col starts-at-full ends-at-two-thirds box clr">
                <div class="heading-holding-banner">
                    <h1>
                <span>
                    <span>
                       <?php echo get_the_title(); ?>
                    </span>
                </span>
                    </h1>
                </div>
                <div class="breather">
                    <br />
                    <?php
                    $published_by = get_post_meta( $post->ID, 'authors_section_published-by', true );
                    if (!empty($published_by)) {
                        echo '<span class="entry-meta"><strong>Published in:</strong> '.$published_by.'</span>';
                    }
                    ?>


                    <div class="clearfix"></div>
                    <span class="entry-meta"><strong>Keywords:</strong> </span>

                    <?php
                    //displaying custom taxonomy 'keywords'
                    $keywords_terms = wp_get_post_terms($post->ID, 'keywords');
                    $i = 0;
                    foreach ( $keywords_terms as $term ) { $i++;
                        if ( $i > 1 ) {
                            echo ', ';
                        }
                        echo '<span class="entry-meta">'.$term->name.'</span>';
                    }
                    ?>

                    <hr class="line-stroke">
                    <div class="clearfix"></div>
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                    <div class="clearfix"></div>

                    <?php
                    $research_pdf = get_post_meta( $post->ID, 'authors_section_pdf', true );
                    $pdf_id = get_pdf_id($research_pdf);
                    $file_path = filesize(get_attached_file($pdf_id));
                    $pdf_size = $file_path;
                    if (!empty ($research_pdf)) {
                        echo '<a class="button float-right bottom-spacing" target="_blank" href="'.$research_pdf.'">View (PDF, '.formatSizeUnits($pdf_size).')</a>';
                    }
                    ?>

                </div>
                <!--  Research ends here-->
            </div>
            <?php //sidebar comes here
            get_sidebar(  );
            ?>
        </div>
    </div>
<?php
get_footer();