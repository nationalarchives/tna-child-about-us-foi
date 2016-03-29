<?php
$defaults = array(
    'theme_location'  => 'sidebar-menu',
    'menu'            => 'Sidebar Menu',
    'items_wrap'      => '<ul class="sibling">%3$s</ul>', );
?>

<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-4" role="complementary">
    <div class="sidebar-header">
        <h2>
            <a name="inThisSection" href="<?php echo make_path_relative( get_permalink($parent_page_id) ); ?>">
                Also in <?php echo get_the_title($parent_page_id);?>
            </a>
        </h2>
    </div>
    <div class="sidebar-nav clearfix">
        <?php wp_nav_menu( $defaults ); ?>
    </div>
</aside>