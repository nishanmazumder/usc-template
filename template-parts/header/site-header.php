<?php

/**
 * Site Header
 * 
 * @package NM_THEME
 */

?>

<?php

$menu = NM_THEME\Inc\Classes\Menus::get_instance();
$menu_id = $menu->get_menu_id('nm-theme-main-menu');
$menu_items = wp_get_nav_menu_items($menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        
    <?php get_template_part('template-parts/header/site', 'brand'); ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php if (!empty($menu_items) && is_array($menu_items)) { ?>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    foreach ($menu_items as $menu_item) {
                        if (!$menu_item->menu_item_parent) {

                            $child_menu_items = $menu->get_child_menu_items($menu_item->ID, $menu_items);
                            $has_child = !empty($child_menu_items) && is_array($child_menu_items);

                            if (!$has_child) {
                    ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?php echo esc_url($menu_item->url) ?>">
                                        <?php echo esc_html($menu_item->title); ?>
                                    </a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url) ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo esc_html($menu_item->title); ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <?php
                                        foreach ($child_menu_items as $child_menu_item) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url) ?>">
                                                    <?php echo esc_html($child_menu_item->title); ?>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                    <?php
                            }
                        }
                    }
                    ?>
                </ul>

            <?php  } ?>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>