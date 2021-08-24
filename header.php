<?php

/**
 * Header template
 * @package NM_USC
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <!--Meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Change Title and Meta tags-->
    <title>USC</title>
    <meta name="description" content="USC | responsive app landing page, This is a premium product available exclusively here : https://USCapp.com">
    <meta name="robots" content="index, follow">
    <meta name="author" content="USC Template">

    <!--Google fonts |Montserrat|Oswald|IBM Plex Sans|Roboto Condensed|-->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300,400,700|Montserrat:300,400,700|Oswald:300,400,700|Roboto+Condensed:400,700" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    if (is_front_page()) {
        get_template_part('template-parts/header/header-front');
    } else {
        get_template_part('template-parts/header/header');
    }
    if (is_front_page()) {
        get_template_part('template-parts/header/site', 'banner');
    }
