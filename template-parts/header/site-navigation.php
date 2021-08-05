<?php

/**
 * Site Navigation
 * 
 * @package NM_USC
 */

$menu = NM_THEME\Inc\Classes\Menus::get_instance();
$menu_id = $menu->get_menu_id('nm-theme-main-menu');
$menu_items = wp_get_nav_menu_items($menu_id);

?>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <div class="nm_usc_nav">
        <a href="#" onclick="nmNavOpen()"><i class="fas fa-bars fa-3x"></i></a>
    </div>

    <div id="nmNavigation" class="nm-overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="nmNavClose()">&times;</a>
        <div class="nm-overlay-content">
            <?php if (!empty($menu_items) && is_array($menu_items)) { ?>
                <?php foreach ($menu_items as $menu_item) { ?>
                    <a href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title); ?></a>
            <?php  }
            } ?>
        </div>
    </div>

</div>