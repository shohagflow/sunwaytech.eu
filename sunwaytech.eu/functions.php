<?php
function show_product_attribute_value_func($atts) {
    global $product;
    
    $atts = shortcode_atts(
        array(
            'attribute' => '',
        ), $atts
    );

    if ( ! $atts['attribute'] ) return '';

    $attribute = $atts['attribute'];

    if ( $product && $product->is_type('variable') ) {
        // For variable products
        $value = $product->get_variation_attributes()[$attribute] ?? '';
    } else {
        // For simple products
        $value = $product->get_attribute($attribute);
    }

    return $value ? esc_html($value) : '';
}
add_shortcode('product_attribute_value', 'show_product_attribute_value_func');
