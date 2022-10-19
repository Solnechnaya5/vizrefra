<?php
/**
 * Profile Editor Form
 *
 * This template is used to display the profile editor with [rcp_profile_editor]
 * @link http://docs.restrictcontentpro.com/article/1602-rcpprofileeditor
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Profile Editor
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

global $rcp_load_css;
$current_user = wp_get_current_user();
$rcp_load_css = true;

if ( is_user_logged_in() ):
	$user_id      = get_current_user_id();
	$first_name   = get_user_meta( $user_id, 'first_name', true );
	$last_name    = get_user_meta( $user_id, 'last_name', true );
	$display_name = $current_user->display_name;

	do_action( 'rcp_profile_editor_messages', $current_user );
	rcp_show_error_messages(); ?>
	<form id="rcp_profile_editor_form" class="edit-profile" action="<?php echo rcp_get_current_url(); ?>" method="post">
		<fieldset>
			<?php do_action( 'rcp_profile_editor_before', $current_user->ID ); ?>
			<h4><legend><?php _e( 'Edit Profile', 'rcp' ); ?></legend></h4>	
			<div class="user-names">
				<div class="user-first-name">
					<label for="user-first-name"><?php _e( 'First Name', 'rcp' ); ?></label>
					<input name="user-first-name" id="rcp_first_name" class="text rcp-input" type="text" value="<?php echo esc_attr( $first_name ); ?>" />
				</div>
				<div class="user-last-name">
					<label for="user-last-name"><?php _e( 'Last Name', 'rcp' ); ?></label>
					<input name="user-last-name" id="rcp_last_name" class="text rcp-input" type="text" value="<?php echo esc_attr( $last_name ); ?>" />
				</div>
			</div>
			
			<div class="user-mail">
				<label for="user-mail"><?php _e( 'Email', 'rcp' ); ?></label>
				<input name="user-mail" id="rcp_email" class="text rcp-input required" type="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" />
			</div>
			<?php do_action( 'rcp_profile_editor_after', $current_user->ID ); ?>
        </fieldset>
        <fieldset>
			
			<div class="edit-password">
					<p><legend><?php _e( 'Password', 'rcp' ); ?></legend></p>
				<div class="edit-password_inputs"> 
					<input name="rcp_new_user_pass1" id="rcp_new_user_pass1" class="password rcp-input" type="password" placeholder="New Password"/>
					<input name="rcp_new_user_pass2" id="rcp_new_user_pass2" class="password rcp-input" type="password" placeholder="Re-enter Password"/>
				</div>
				</div>
        </fieldset>
        <fieldset>
		<div class="edit-profile_buttons">
				<input type="hidden" name="rcp_profile_editor_nonce" value="<?php echo wp_create_nonce( 'rcp-profile-editor-nonce' ); ?>"/>
				<input type="hidden" name="rcp_action" value="edit_user_profile" />
				<input type="hidden" name="rcp_redirect" value="<?php echo esc_url( rcp_get_current_url() ); ?>" />
				
				<input type="cancel" class="close-window white-btn2" value="Cancel"/>
				<input name="rcp_profile_editor_submit" id="rcp_profile_editor_submit" type="submit" class="rcp_submit rcp-button blue-btn" value="<?php esc_attr_e( 'Save', 'rcp' ); ?>"/>
					</div>
		</fieldset>
	</form><!-- #rcp_profile_editor_form -->
	<?php
else:
	echo rcp_login_form_fields();
endif;