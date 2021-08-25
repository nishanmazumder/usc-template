<?php

/**
 * Template for displaying template of login form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/global/form-login.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined('ABSPATH') || exit();
?>

<div class="learn-press-form-login learn-press-form">

	<h3><?php echo esc_html_x('Login', 'login-heading', 'nm_theme'); ?></h3>

	<?php do_action('learn-press/before-form-login'); ?>

	<form class="nm_usc_form mt-2" name="learn-press-login" method="post" action="/profile">

		<?php do_action('learn-press/before-form-login-fields'); ?>

		<div class="form-group">
			<input class="form-control" type="text" name="username" id="username" placeholder="<?php esc_attr_e('Email or Username', 'nm_theme'); ?>" autocomplete="username" />
		</div>

		<div class="form-group">
			<input class="form-control" type="password" name="password" id="password" placeholder="<?php esc_attr_e('Password', 'nm_theme'); ?>" autocomplete="current-password" />
		</div>
		<?php do_action('learn-press/after-form-login-fields'); ?>
		<div class="form-group">
			<label>
				<input type="checkbox" name="rememberme" />
				<?php esc_html_e('Remember me', 'learnpress'); ?>
			</label>
		</div>
		<div class="form-group">
			<input type="hidden" name="learn-press-login-nonce" value="<?php echo wp_create_nonce('learn-press-login'); ?>">
			<button class="btn nm_usc_sbt_btn" type="submit"><?php esc_html_e('Login', 'learnpress'); ?></button>
		</div>
	</form>

	<a class="nm-lost-pw" href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e('Lost your password?', 'nm_theme'); ?></a>
	<a class="nm-lost-pw d-block" href="<?php echo NM_SITE_URL.'/usc-register'; ?>"><?php esc_html_e("Don't have account?", "nm_theme"); ?></a>


	<?php do_action('learn-press/after-form-login'); ?>

</div>