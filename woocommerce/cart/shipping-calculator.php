<?php
/**
 * Shipping Calculator
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.8
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( get_option('woocommerce_enable_shipping_calc')=='no' || ! $woocommerce->cart->needs_shipping() )
	return;
?>

<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

<form class="shipping_calculator half" action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">

	<section class="shipping-calculator-form">
		<h2>Calculate Shipping</h2>
		<ul>
			<li class="group">
				<div class="calc-label"><strong>Country</strong></div>
				<div class="calc-action">
					<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
						<option value=""><?php _e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
						<?php
							foreach( $woocommerce->countries->get_allowed_countries() as $key => $value )
								echo '<option value="' . esc_attr( $key ) . '"' . selected( $woocommerce->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
						?>
					</select>
				</div>
			</li>

			<li class="group">
				<?php
					$current_cc = $woocommerce->customer->get_shipping_country();
					$current_r  = $woocommerce->customer->get_shipping_state();
					$states     = $woocommerce->countries->get_states( $current_cc );

					// Hidden Input
					if ( is_array( $states ) && empty( $states ) ) {

						?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" /><?php

					// Dropdown Input
					} elseif ( is_array( $states ) ) {

						?>
						<div class="calc-label"><strong>State</strong></div>
						<div class="calc-action">
							<select name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>">
								<option value=""><?php _e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
								<?php
									foreach ( $states as $ckey => $cvalue )
										echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . __( esc_html( $cvalue ), 'woocommerce' ) .'</option>';
								?>
							</select>
						</div><?php

					// Standard Input
					} else {

						?>
						<div class="calc-label"><strong>State</strong></div>
						<div class="calc-action">
							<input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /></div><?php

					}
				?>
			</li>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>

			<li class="group">
				<div class="calc-label"><strong>City</strong></div>
				<div class="calc-action">
					<input type="text" class="input-text" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_city() ); ?>" placeholder="<?php _e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
				</div>
			</li>

		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

			<li class="group">
				<div class="calc-label"><strong>Zip Code</strong></div>
				<div class="calc-action">
					<input type="text" class="input-text" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e( 'Postcode / Zip', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
				</div>
			</li>

		<?php endif; ?>
		<li class="group calc-submit">
			<button type="submit" name="calc_shipping" value="1" class="button"><?php _e( 'Update Totals', 'woocommerce' ); ?></button>
		</li>
		<?php $woocommerce->nonce_field('cart') ?>
		</ul>
	</section>
</form>

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>