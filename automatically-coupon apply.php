<?php
/* automatically coupon code apply according to total items in cart to go checkout */

add_action( 'woocommerce_before_checkout_form', 'bbloomer_apply_matched_coupons' );
 
function bbloomer_apply_matched_coupons() {

	$items_in_cart = WC()->cart->get_cart_contents_count();
	//var_dump($items_in_cart);

	if( ($items_in_cart > 1) && ($items_in_cart == 2) ) {

		$coupon_code = 'hhjh5kw9';		/* 5% dis. for 2 products */
	}

	if( ($items_in_cart > 2) && ($items_in_cart < 4)){ 
    	$coupon_code = 'rqq7wsr8'; 		/* 10% dis. for 3 products */
	}

	if($items_in_cart >= 4){ 
    	$coupon_code = 'nbn26rxj'; 		/* 15% dis. for 4+ products */
	}
 
    //if ( WC()->cart->has_discount( $coupon_code ) ) return;
 
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
 
    // this is your product ID
    //$autocoupon = array( 1005,33,973 );
 
    //if( in_array( $cart_item['product_id'], $autocoupon ) ) {   
        WC()->cart->add_discount( $coupon_code );
        //wc_print_notices();
  //  }
 
    }
 
}