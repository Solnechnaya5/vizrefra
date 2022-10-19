<?php
/**
 * Registration Form
 *
 * This template is used to display the registration form with [register_form]. 
 * If the `id` attribute is passed into the shortcode then register-single.php is used instead.
 * @link http://docs.restrictcontentpro.com/article/1597-registerform
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Register
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

global $rcp_options, $post, $rcp_levels_db, $rcp_register_form_atts;
$discount = ! empty( $_REQUEST['discount'] ) ? sanitize_text_field( $_REQUEST['discount'] ) : '';

?>

<?php if( ! is_user_logged_in() ) { ?>
	<h4 class="registration-block_top">
		<?php echo apply_filters( 'rcp_registration_header_logged_out', $rcp_register_form_atts['logged_out_header'] ); ?>
	</h4>
<?php } else { ?>
	<h4 class="registration-block_top">
		<?php echo apply_filters( 'rcp_registration_header_logged_in', $rcp_register_form_atts['logged_in_header'] ); ?>
	</h4>
<?php }

// show any error messages after form submission
rcp_show_error_messages( 'register' ); ?>

<form id="rcp_registration_form" class="registration-form" method="POST" action="<?php echo esc_url( rcp_get_current_url() ); ?>">

	<?php if( ! is_user_logged_in() ) { ?>

<p class="registration-block_top"> Already have an account? <?php printf( __( '<a  href="%s">Sin in</a>.', 'rcp' ), esc_url( rcp_get_login_url( rcp_get_current_url() ) ) ); ?></p>

	<?php do_action( 'rcp_before_register_form_fields' ); ?>

	<fieldset>
		<div class="registration_user-name">
			<input name="rcp_user_login" id="rcp_user_login" class="required" type="text" placeholder="Login" <?php if( isset( $_POST['rcp_user_login'] ) ) { echo 'value="' . esc_attr( $_POST['rcp_user_login'] ) . '"'; } ?>/>
			<span>*</span>
		</div>
		<div class="registration_user-name">
			<input name="rcp_user_first" id="rcp_user_first" type="text" placeholder="First name" <?php if( isset( $_POST['rcp_user_first'] ) ) { echo 'value="' . esc_attr( $_POST['rcp_user_first'] ) . '"'; } ?>/>
			<span>*</span>
		</div>
		<div class="registration_user-name">
			<input name="rcp_user_last" id="rcp_user_last" type="text" placeholder="Last name"  <?php if( isset( $_POST['rcp_user_last'] ) ) { echo 'value="' . esc_attr( $_POST['rcp_user_last'] ) . '"'; } ?>/>
			<span>*</span>
		</div>
		<div class="registration_user-email">
			<input name="rcp_user_email" id="rcp_user_email" class="required" type="text" placeholder="Work Email"<?php if( isset( $_POST['rcp_user_email'] ) ) { echo 'value="' . esc_attr( $_POST['rcp_user_email'] ) . '"'; } ?>/>
	</div>
		<div class="registration_password">
			<input name="rcp_user_pass" id="rcp_password" class="required" type="password" placeholder="Password"/>
		</div>
		<div class="registration_confirm-password">
			<input name="rcp_user_pass_confirm" id="rcp_password_again" class="required" type="password" placeholder="Confirm password"/>
		</div>

		<?php do_action( 'rcp_after_password_registration_field' ); ?>

	</fieldset>
	<?php } ?>

	<?php do_action( 'rcp_before_subscription_form_fields' ); ?>

	<fieldset class="registration-plan">
	<?php
	$levels = rcp_get_membership_levels( array( 'status' => 'active', 'number' => 100 ) );
	$i      = 0;
	if( $levels ) : ?>
		<?php if ( count( $levels ) > 1 ) : ?>
			<h6 class="registration-plan_title">
				<?php echo apply_filters ( 'rcp_registration_choose_subscription', __( 'Membership Plan *', 'rcp' ) ); ?></h6>
		<?php endif; ?>
		<div class="registration-plan">
					
		<ul class="registration-plan_conteiner" >
			<?php foreach( $levels as $key => $level ) : ?>
				<?php if( rcp_show_subscription_level( $level->get_id() ) ) : ?>
				<li class="registration-plan_column"<?php echo esc_attr( $level->get_id() ); ?>>
				<div class="registration-plan_column-container">
				<input type="radio" id="rcp_subscription_level_<?php echo esc_attr( $level->get_id() ); ?>" class="required rcp_level" 
					<?php if ( $i == 0 || ( isset( $_GET['level'] ) && $_GET['level'] == $level->get_id() ) ) 
					{ echo 'checked="checked"'; } ?> 
					name="rcp_level" rel="<?php echo esc_attr( $level->get_price() ); ?>" 
					value="<?php echo esc_attr( $level->get_id() ); ?>" 
					<?php if( $level->is_lifetime() ) { echo 'data-duration="forever"'; } 
					if ( $level->has_trial() ) { echo 'data-has-trial="true"'; } ?>/>
					
                              
					<label for="rcp_subscription_level_<?php echo esc_attr( $level->get_id() ); ?>">
						<div class="registration-plan_status"><?php echo esc_html( $level->get_name() ); ?></div>
						
						<div class="registration-plan_price">
							<span rel="<?php echo esc_attr( $level->get_price() ); ?>">
							<?php echo ! $level->is_free() ? rcp_currency_filter( $level->get_price() ) : __( 'free', 'rcp' ); ?></span>
						</div>
							
						<span class="rcp_level_duration"><?php echo ! $level->is_lifetime() ? $level->get_duration() . '&nbsp;' . rcp_filter_duration_unit( $level->get_duration_unit(), $level->get_duration() ) : __( 'unlimited', 'rcp' ); ?></span>
						<?php if ( $level->get_maximum_renewals() > 0 ) : ?>
							
							<span class="rcp_level_bill_times"><?php printf( __( '%d total payments', 'rcp' ), $level->get_maximum_renewals() + 1 ); ?></span>
						<?php endif; ?>
						<div class="rcp_level_description"> <?php echo $level->get_description(); ?></div>
					</label>
						</div>
				</li>
				<?php $i++; endif; ?>
			<?php endforeach; ?>
		</ul>
		</div>
	<?php else : ?>
		<p><strong><?php _e( 'You have not created any membership levels yet', 'rcp' ); ?></strong></p>
	<?php endif; ?>
	</fieldset>

	<?php if( rcp_has_discounts() ) : ?>
	<fieldset class="rcp_discounts_fieldset">
		<p id="rcp_discount_code_wrap">
			<label for="rcp_discount_code">
				<?php _e( 'Discount Code', 'rcp' ); ?>
				<span class="rcp_discount_valid" style="display: none;"> - <?php _e( 'Valid', 'rcp' ); ?></span>
				<span class="rcp_discount_invalid" style="display: none;"> - <?php _e( 'Invalid', 'rcp' ); ?></span>
			</label>
			<span class="rcp_discount_code_field_wrap">
				<input type="text" id="rcp_discount_code" name="rcp_discount" class="rcp_discount_code" value="<?php echo esc_attr( $discount ); ?>"/>
				<button class="rcp_button" id="rcp_apply_discount"><?php _e( 'Apply', 'rcp' ); ?></button>
			</span>
		</p>
	</fieldset>
	<?php endif; ?>

	<?php do_action( 'rcp_after_register_form_fields', $levels ); ?>

	<div class="rcp_gateway_fields">
		<?php
		$gateways = rcp_get_enabled_payment_gateways();
		if( count( $gateways ) > 1 ) :
			$display = rcp_has_paid_levels() ? '' : ' style="display: none;"';
			$i = 1;
			?>
			<fieldset class="rcp_gateways_fieldset">
				<legend><?php _e( 'Choose Your Payment Method', 'rcp' ); ?></legend>
				<p id="rcp_payment_gateways"<?php echo $display; ?>>
					<?php foreach( $gateways as $key => $gateway ) :
						$recurring = rcp_gateway_supports( $key, 'recurring' ) ? 'yes' : 'no';
						$trial    = rcp_gateway_supports( $key, 'trial' ) ? 'yes' : 'no'; ?>
						<label for="rcp_gateway_<?php echo esc_attr( $key ); ?>" class="rcp_gateway_option_label">
							<input id="rcp_gateway_<?php echo esc_attr( $key );?>" name="rcp_gateway" type="radio" class="rcp_gateway_option_input" value="<?php echo esc_attr( $key ); ?>" data-supports-recurring="<?php echo esc_attr( $recurring ); ?>" data-supports-trial="<?php echo esc_attr( $trial ); ?>" <?php checked( $i, 1 ); ?>>
							<?php echo esc_html( $gateway ); ?>
						</label>
					<?php
					$i++;
					endforeach; ?>
				</p>
			</fieldset>
		<?php else: ?>
			<?php foreach( $gateways as $key => $gateway ) :
				$recurring = rcp_gateway_supports( $key, 'recurring' ) ? 'yes' : 'no';
				$trial = rcp_gateway_supports( $key, 'trial' ) ? 'yes' : 'no';
				?>
				<input type="hidden" name="rcp_gateway" value="<?php echo esc_attr( $key ); ?>" data-supports-recurring="<?php echo esc_attr( $recurring ); ?>" data-supports-trial="<?php echo esc_attr( $trial ); ?>"/>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php if ( ! empty( $rcp_options['enable_terms'] ) ) : ?>
		<fieldset class="registration-form_check">
			<p id="rcp_agree_to_terms_wrap">
				<input type="checkbox" id="rcp_agree_to_terms" name="rcp_agree_to_terms" value="1">
				<label for="rcp_agree_to_terms">
				I agree with VizRefra 
					<?php
					if ( ! empty( $rcp_options['terms_link'] ) ) {
						echo '<a href="' . esc_url( $rcp_options['terms_link'] ) . '" target="_blank">';
					}

					if ( ! empty( $rcp_options['terms_label'] ) ) {
						echo $rcp_options['terms_label'];
					} else {
						_e( 'Terms of Use', 'rcp' );
					}

					if ( ! empty( $rcp_options['terms_link'] ) ) {
						echo '</a>';
					}
					?>
				</label>
			</p>
		</fieldset>
	<?php endif; ?>

	<?php if ( ! empty( $rcp_options['enable_privacy_policy'] ) ) : ?>
		<fieldset class="registration-form_check">
			<p id="rcp_agree_to_privacy_policy_wrap">
				<input type="checkbox" id="rcp_agree_to_privacy_policy" name="rcp_agree_to_privacy_policy" value="1">
				<label for="rcp_agree_to_privacy_policy">
					<?php
					if ( ! empty( $rcp_options['privacy_policy_link'] ) ) {
						echo '<a href="' . esc_url( $rcp_options['privacy_policy_link'] ) . '" target="_blank">';
					}

					if ( ! empty( $rcp_options['privacy_policy_label'] ) ) {
						echo $rcp_options['privacy_policy_label'];
					} else {
						_e( 'I agree to the privacy policy', 'rcp' );
					}

					if ( ! empty( $rcp_options['privacy_policy_link'] ) ) {
						echo '</a>';
					}
					?>
				</label>
			</p>
		</fieldset>
	<?php endif; ?>

	<?php do_action( 'rcp_before_registration_submit_field', $levels ); ?>

	<?php if ( ! empty( $_GET['rcp_redirect'] ) ) : ?>
		<input type="hidden" name="rcp_redirect" value="<?php echo esc_url( $_GET[ 'rcp_redirect' ] ) ?>"/>
	<?php endif; ?>

	<p id="rcp_submit_wrap">
		<input type="hidden" name="rcp_register_nonce" value="<?php echo wp_create_nonce('rcp-register-nonce' ); ?>"/>
		<input type="submit" name="rcp_submit_registration" id="rcp_submit" class="rcp-button registration-form_btn" value="<?php esc_attr_e( apply_filters ( 'rcp_registration_register_button', __( 'Register', 'rcp' ) ) ); ?>"/>
	</p>
	<div class="registration-form_paragraph">
                                <p>Your personal information in safe with us</p>
                            </div>
</form>
