<?php
// Copy from line 4!

if (!function_exists('get_wc_product_by_title')):
    /**
     * Get product by title.
     *
     * @return product.
     */
    function get_wc_product_by_title($title)
    {
        global $wpdb;

        $post_title = strval($title);

        $post_table = $wpdb->prefix . "posts";
        $result = $wpdb->get_col("
			SELECT ID
			FROM $post_table
			WHERE post_title LIKE '$post_title'
			AND post_type LIKE 'product'
			");

        // We exit if title doesn't match
        if (empty($result[0])) {
            return;
        } else {
            return wc_get_product(intval($result[0]));
        }
    }
endif;

if (!function_exists('custom_woocommerce_states')):
    add_filter('woocommerce_states', 'custom_woocommerce_states');
    /**
     * Get valid states.
     *
     * @return states.
     */
    function custom_woocommerce_states($states)
    {
        $states['MY'] = array(
            'KUL' => __('Kuala Lumpur', 'woocommerce'),
            'SGR' => __('Selangor', 'woocommerce'),
        );

        return $states;
    }
endif;

if (!function_exists('change_woocommerce_order_number')):
    add_filter('woocommerce_order_number', 'change_woocommerce_order_number');
    /**
     * Get custom order id.
     *
     * @return new_order_id.
     */
    function change_woocommerce_order_number($order_id)
    {
        $prefix = strftime("%Y%m");
        $order_id_padded = sprintf('%04d', $order_id);
        $new_order_id = $prefix . $order_id_padded;
        return $new_order_id;
    }
endif;

if (!function_exists('my_custom_no_shipping_message')):
    add_filter('woocommerce_no_shipping_available_html', 'my_custom_no_shipping_message');
    add_filter('woocommerce_cart_no_shipping_available_html', 'my_custom_no_shipping_message');
    /**
     * Customize no shipping available message.
     *
     * @return custom_message.
     */
    function my_custom_no_shipping_message($message)
    {
        return __('Unfortunately, we do not deliver to your area. Please contact us for details.');
    }
endif;
