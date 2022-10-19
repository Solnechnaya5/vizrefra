<?php
/**
 * Login Form
 *
 * Template for displaying the login form. This is used in the [login_form] shortcode.
 * @link http://docs.restrictcontentpro.com/article/1598-loginform
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Login
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

global $rcp_login_form_args; ?>

<?php if ( isset( $_GET['password-reset'] ) && 'true' == $_GET['password-reset'] ) { ?>
	<p class="rcp_success">
		<span><?php _e( 'Your password has been successfully reset.', 'rcp' ); if ( ! is_user_logged_in() ) _e( ' You may now log in.', 'rcp' ); ?></span>
	</p>
<?php } ?>

<?php if ( ! is_user_logged_in() ) : ?>
	<?php rcp_show_error_messages( 'login' ); ?>

	<form id="rcp_login_form"  class="<?php echo esc_attr( $rcp_login_form_args['class'] ); ?>" method="POST" action="<?php echo esc_url( rcp_get_current_url() ); ?>">

		<?php do_action( 'rcp_before_login_form_fields' ); ?>
			<div class="signin_user-email">
				<input name="rcp_user_login" id="rcp_user_login" class="required" type="text" placeholder="Work Email"/>
			</div>
			<div class="signin_password">
				<input name="rcp_user_pass" id="rcp_user_pass" class="required" type="password" placeholder="Password"/>
				<span><img src="/design/img/icons/preview.png" alt="pass"></span>
			</div>
			<?php do_action( 'rcp_login_form_fields_before_submit' ); ?>
			<div class="signin-form_check">
				<input type="checkbox" name="rcp_user_remember" id="rcp_user_remember" value="1"/>
				<label for="rcp_user_remember"><?php _e( 'Remember me', 'rcp' ); ?></label>
			</div>
			<div class="signin-form_remember-pass">
				<a href="<?php echo esc_url( add_query_arg( 'rcp_action', 'lostpassword') ); ?>"><?php _e( 'Forgot Password?', 'rcp' ); ?></a></div>
			<p>
				<input type="hidden" name="rcp_action" value="login"/>
				<?php if ( ! empty( $_GET['rcp_redirect'] ) ) : ?>
					<input type="hidden" name="rcp_redirect" value="<?php echo esc_url( $_GET['rcp_redirect'] ); ?>"/>
				<?php else : ?>
					<input type="hidden" name="rcp_redirect" value="<?php echo esc_url( $rcp_login_form_args['redirect'] ); ?>"/>
				<?php endif; ?>
				<input type="hidden" name="rcp_login_nonce" value="<?php echo wp_create_nonce( 'rcp-login-nonce' ); ?>"/>
				<input id="rcp_login_submit" class="rcp-button registration-form_btn" type="submit" value="<?php esc_attr_e( 'Sign in', 'rcp' ); ?>"/>
			</p>
			<?php do_action( 'rcp_login_form_fields_after_submit' ); ?>
		

		<?php do_action( 'rcp_after_login_form_fields' ); ?>

	</form>
<?php else : ?>
	<div class="rcp_logged_in"><a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log out', 'rcp' ); ?></a></div>
<?php endif; ?>
