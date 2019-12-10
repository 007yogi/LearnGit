<?php 

/* Replace add to cart button in the loop. */

function iconic_change_loop_add_to_cart() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'iconic_template_loop_add_to_cart', 10 );
}

add_action( 'init', 'iconic_change_loop_add_to_cart', 10 );

/**
 * Use single add to cart button for variable products.
 */
function iconic_template_loop_add_to_cart() {
	global $product;

	if ( ! $product->is_type( 'variable' ) ) {
		woocommerce_template_loop_add_to_cart();
		return;
	}

	woocommerce_template_single_add_to_cart();
} 

/*****************************************/


Related Posts

https://www.wpbeginner.com/wp-tutorials/how-to-display-related-posts-in-wordpress/
https://www.wpbeginner.com/wp-themes/how-to-add-related-posts-with-a-thumbnail-without-using-plugins/


ACF get field value on woocommerce template
https://discourse.roots.io/t/woocommerce-sage9-acf-advanced-custom-fields/10783/10

Self SSL
https://hostadvice.com/how-to/how-to-install-a-self-signed-ssl-certificate-for-apache-on-ubuntu-18-04-server/

Get all Reviews
https://www.majas-lapu-izstrade.lv/get-woocommerce-customer-reviews-from-all-products-display-average-and-all-ratings-in-a-histogram-without-a-plugin/


ACF taxonomy-term
https://www.advancedcustomfields.com/resources/adding-fields-taxonomy-term/


product gallery theme support
https://stackoverflow.com/questions/43241524/how-to-make-woocommerce-3-0-single-image-gallery-so-it-is-like-version-2-x

Twick plugn for product gallery 
https://www.downloadfreethemes.co/twist-v2-0-5-product-gallery-slider-plugin-for-woocommerce/


checkout page form fields
https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
https://stackoverflow.com/questions/46326620/custom-placeholder-for-all-woocommerce-checkout-fields
https://stackoverflow.com/questions/25442289/woocommerce-remove-all-form-labels-at-once
https://rudrastyh.com/woocommerce/reorder-checkout-fields.html
https://rudrastyh.com/woocommerce/checkout-fields.html#remove_default_fields

Ajax Cart bag  (Add WooCommerce Cart Icon )
https://wpbeaches.com/add-woocommerce-cart-icon-to-menu-with-cart-item-count/
https://gist.github.com/mikejolley/2044109

sandbox paypal
https://www.sandbox.paypal.com
https://wordpress.org/plugins/woocommerce-ajax-add-to-cart-for-variable-products/#description

Add Cancel button on My account Orders list
https://stackoverflow.com/questions/46263626/add-cancel-button-on-my-account-orders-list-using-woo-cancel-for-customers-plugi
https://docs.woocommerce.com/document/managing-orders/
https://businessbloomer.com/woocommerce-easily-get-order-info-total-items-etc-from-order-object/


cart page Visual Hook Guide
https://businessbloomer.com/woocommerce-visual-hook-guide-cart-page/

Cross selling
https://businessbloomer.com/woocommerce-move-change-number-cross-sells-cart-page/
https://docs.woocommerce.com/document/related-products-up-sells-and-cross-sells/



https://businessbloomer.com/woocommerce-move-change-number-cross-sells-cart-page/
https://docs.woocommerce.com/document/related-products-up-sells-and-cross-sells/

Login & Regi

https://businessbloomer.com/woocommerce-separate-login-registration/
https://www.tmdhosting.com/kb/question/how-to-create-separate-log-in-and-registration-pages-in-woocommerce/
https://stackoverflow.com/questions/41962909/how-to-create-separate-log-in-and-registration-pages-in-woocommerce


WP insert post PHP function and Custom Fields

https://stackoverflow.com/questions/31960870/wordpress-using-wp-insert-post-to-fill-custom-post-type-fields
https://wordpress.stackexchange.com/questions/8569/wp-insert-post-php-function-and-custom-fields


WooCommerce Conditional Logic

https://businessbloomer.com/woocommerce-conditional-logic-ultimate-php-guide/

Conditional Tags

https://docs.woocommerce.com/document/conditional-tags/

My Account
https://rudrastyh.com/woocommerce/my-account-menu.html
https://www.atomicsmash.co.uk/blog/customising-the-woocommerce-my-account-section/


Varition on shop page
https://iconicwp.com/blog/show-variations-shop-page-woocommerce/ 
https://remicorson.com/display-woocommerce-product-variations-dropdown-on-the-shop-page/
https://stackoverflow.com/questions/53120469/show-product-variations-on-shop-pages-in-woocommerce


https://stackoverflow.com/questions/45430803/download-file-after-submission-in-contact-form-7-wordpress

https://businessbloomer.com/woocommerce-visual-hook-guide-archiveshopcat-page/
https://iconicwp.com/blog/show-variations-shop-page-woocommerce/


https://stackoverflow.com/questions/33330782/woocommerce-shop-header-in-product-archives-php-file


https://businessbloomer.com/woocommerce-display-product-gallery-vertically-single-product/

https://www.isitwp.com/add-custom-body-class-for-specific-pages/

 Braedcrumb
https://wordpress.stackexchange.com/questions/155061/changing-the-woocommerce-breadcrumb-menu

Cheat Sheet
https://businessbloomer.com/woocommerce-easily-get-product-info-title-sku-desc-product-object/ 
url: https://gist.github.com/cagartner/f8d4550ad1618da19a137f42adc91c86

Triggering the variation swatches after AJAX loading
https://wordpress.org/support/topic/triggering-the-variation-swatches-after-ajax-loading/
https://www.google.com/url?q=https://www.koolkatwebdesigns.com/single-page-woocommerce-site-and-ajax/&sa=D&source=hangouts&ust=1573281108261000&usg=AFQjCNE1tu4bNqs9Kf3bCwZ92DRA5r9H-g

Move the variation description to the Woocommerce product variable description

https://stackoverflow.com/questions/51330304/move-the-variation-description-to-the-woocommerce-product-variable-description

Enabling AJAX Add to Cart on single product views, with X overlay

https://michaelbourne.ca/enabling-ajax-add-to-cart-on-single-product-views-with-x-overlay/

Adding Cart Icon in the header
https://wppatrickk.com/woocommerce-add-cart-ajax-single-product-page/

Display All Reviews
https://www.majas-lapu-izstrade.lv/get-woocommerce-customer-reviews-from-all-products-display-average-and-all-ratings-in-a-histogram-without-a-plugin/


Automatically coupon code apply according to total items in cart to go checkout

https://businessbloomer.com/woocommerce-apply-coupon-programmatically-product-cart/
https://toolset.com/forums/topic/how-can-i-add-a-coupon-to-the-cart-automatically/
https://wordpress.org/plugins/woocommerce-auto-added-coupons/

Count Completed Orders For specific Product
https://wordpress.org/support/topic/count-completed-orders-for-specific-product/


Pagination for All comment view page
https://wpquestions.com/Add_Pagination_To_WP_Comment_Query/19563

Remove coupon code applied error msg
https://www.itthinx.com/plugins/woocommerce-coupon-messages/
https://wordpress.org/support/topic/generic-coupon-already-applied-error-message/
https://wpquestions.com/WooCommerce_Remove_Coupon_code_already_applied_error_message/10598


File Permissions
https://askubuntu.com/questions/83/how-do-file-permissions-work