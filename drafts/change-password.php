<?php
/**
 * Change Password Form
 *
 * This form is for changing an account password.
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Change Password Form
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

global $rcp_password_form_args; ?>

<?php
rcp_show_error_messages( 'password' );

// Bail if the reset link is invalid. This prevents the change password fields from showing.
$errors = rcp_errors();
if ( rcp_errors()->get_error_data( 'invalid_key' ) === 'password' ) {
	return;
}
?>

<?php if( isset( $_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
	<div class="rcp_message success">
		<span><?php _e( 'Password changed successfully', 'rcp' ); ?></span>
	</div>
<?php } ?>
<form id="rcp_password_form"  class="change-pass" method="POST" action="<?php echo esc_url( rcp_get_current_url() ); ?>">
<h4>Change Password</h4>
        <p>After changing your password, you must log in again.</p>
<fieldset>
	
			<input name="rcp_user_pass" id="rcp_user_pass" class="required" type="password" placeholder="New Password"/>
			<input name="rcp_user_pass_confirm" id="rcp_user_pass_confirm" class="required" type="password" placeholder="Confirm New Password"/>
		<p>
			<input type="hidden" name="rcp_action" value="reset-password"/>
			<input type="hidden" name="rcp_redirect" value="<?php echo esc_url( $rcp_password_form_args['redirect'] ); ?>"/>
			<input type="hidden" name="rcp_password_nonce" value="<?php echo wp_create_nonce('rcp-password-nonce' ); ?>"/>
        </p>
			<div class="change-pass_buttons">
			<input type="cancel" class="close-window btn-white2" value="Cancel">
			<input id="rcp_password_submit" class="blue-btn" type="submit" value="<?php esc_attr_e( apply_filters( 'rcp_registration_change_password_button', __( 'Save', 'rcp' ) ) ); ?>"/>
		</div>
	</fieldset>
</form>