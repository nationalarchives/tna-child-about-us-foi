<?php
$defaults = array(
    'theme_location' => 'sidebar-menu',
    'menu' => 'Sidebar Menu',
    'items_wrap' => '<ul class="sibling">%3$s</ul>',);

// Global variable
global $pre_crumbs;
// Slicing the array inside $pre_crumbs variable and displaying the key name
$sidebar_title = array_slice($pre_crumbs, -1);
?>

<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-4" role="complementary">
    <div class="sidebar-header">
        <h2>
            <a name="inThisSection" href="<?php echo end($pre_crumbs) ?>">
                Also in <?php echo key($sidebar_title); ?>
            </a>
        </h2>
    </div>
    <div class="sidebar-nav clearfix">
        <?php wp_nav_menu($defaults); ?>
    </div>
</aside>