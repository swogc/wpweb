<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/** @global WC_Checkout $checkout */
?>
<div class="woocommerce-billing-fields">
	<?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>
		<div class="jx-evont-section-title-4 dark">
            <div class="jx-evont-title jx-evont-uppercase small-text"><?php esc_html_e( 'Billing &amp; Shipping', 'evont' ); ?></div>
            <div class="jx-evont-seperator-hr"></div>
        </div>
	<?php else : ?>
		<div class="jx-evont-section-title-4 dark">
            <div class="jx-evont-title jx-evont-uppercase small-text"><?php esc_html_e( 'Billing Details', 'evont' ); ?></div>
            <div class="jx-evont-seperator-hr"></div>
        </div>
	<?php endif; ?>
	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
	<?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>
		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
	<?php endforeach; ?>
	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>
	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>
		<?php if ( $checkout->enable_guest_checkout ) : ?>
			<p class="form-row form-row-wide create-account">
				<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php esc_html_e( 'Create an account?', 'evont' ); ?></label>
			</p>
		<?php endif; ?>
		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>
		<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>
			<div class="create-account">
				<p><?php esc_html_e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'evont' ); ?></p>
				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	<?php endif; ?>
</div>
