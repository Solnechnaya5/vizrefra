<?php
/**
 * Card Form
 *
 * This template is for displaying credit card form details. It's shown on the registration
 * form when selecting a gateway that supports taking credit/debit card details directly.
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Card Form
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
?>

<fieldset class="payment-card_new-info">
	<div class="payment-card_block">
		<div class="payment_card-number">
			<label><?php _e( 'Edit Card', 'rcp' ); ?></label>
			<input type="text" size="20" maxlength="20" name="rcp_card_number" class="rcp_card_number card-number" />
		</div>
		<div class="payment_csv">
			<label><?php _e( 'CSV', 'rcp' ); ?></label>
			<input type="text" size="4" maxlength="4" name="rcp_card_cvc" class="rcp_card_cvc card-cvc" />
		</div>
		<p class="payment_zip">
			<input type="text" size="10" name="rcp_card_zip" class="rcp_card_zip card-zip" placeholder="Card ZIP or Postal Code"/>
		</p>
		<div class="payment_owner-name">
			<input type="text" size="20" name="rcp_card_name" class="rcp_card_name card-name" placeholder="Name on Card"/>
		</div>
		<div class="payment_expiration-date">
			<label><?php _e( 'Expiration Date', 'rcp' ); ?></label>
			<select name="rcp_card_exp_month" class="rcp_card_exp_month card-expiry-month">
				<?php for( $i = 1; $i <= 12; $i++ ) : ?>
					<option value="<?php echo $i; ?>"><?php echo $i . ' - ' . rcp_get_month_name( $i ); ?></option>
				<?php endfor; ?>
			</select>
			<span class="rcp_expiry_separator"> / </span>
			<select name="rcp_card_exp_year" class="rcp_card_exp_year card-expiry-year">
				<?php
				$year = date( 'Y' );
				for( $i = $year; $i <= $year + 10; $i++ ) : ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php endfor; ?>
			</select>
		</div>
	</div>
</fieldset>