<?php

/**
 * Template for displaying global login form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/global/form-register.php.
 *
 * @author   ThimPress
 * @package  NM_THEME
 * @version  4.0.0
 */

defined('ABSPATH') || exit();
?>

<div class="learn-press-form-register learn-press-form">

	<h3><?php echo esc_html_x('Register', 'register-heading', 'nm_theme'); ?></h3>

	<?php do_action('learn-press/before-form-register'); ?>

	<form class="nm_usc_form" name="learn-press-register" method="post" action="/usc-profile">
		<?php do_action('learn-press/before-form-register-fields'); ?>
		<div class="form-group">
			<input class="form-control" id="reg_email" name="reg_email" type="text" placeholder="<?php esc_attr_e('Email', 'nm_theme'); ?>" autocomplete="email" value="<?php echo (!empty($_POST['reg_email'])) ? esc_attr(wp_unslash($_POST['reg_email'])) : ''; ?>">
		</div>
		<div class="form-group">
			<input class="form-control" id="reg_username" name="reg_username" type="text" placeholder="<?php esc_attr_e('Username', 'nm_theme'); ?>" autocomplete="username" value="<?php echo (!empty($_POST['reg_username'])) ? esc_attr(wp_unslash($_POST['reg_username'])) : ''; ?>">
		</div>
		<div class="form-group">
			<input class="form-control" id="reg_password" name="reg_password" type="password" placeholder="<?php esc_attr_e('Password', 'nm_theme'); ?>" autocomplete="new-password">
		</div>
		<div class="form-group">
			<input class="form-control" id="reg_password2" name="reg_password2" type="password" placeholder="<?php esc_attr_e('Confirm Password', 'nm_theme'); ?>" autocomplete="off">
		</div>
		<?php do_action('learn-press/after-form-register-fields'); ?>

		<?php do_action('register_form'); ?>

		<div class="form-group">
			<?php wp_nonce_field('learn-press-register', 'learn-press-register-nonce'); ?>
			<button name="usc_registration" class="btn nm_usc_sbt_btn" type="submit"><?php esc_html_e('Register', 'nm_theme'); ?></button>
		</div>
	</form>

	<?php do_action('learn-press/after-form-register'); ?>

</div>