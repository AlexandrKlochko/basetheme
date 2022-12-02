<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>
<div class="" dir="rtl">
    <div class="cart_heading d-flex justify-content-between flex-wrap">
        <div class="">
            <?php _e('Cart', 'woocommerce') ?>
        </div>
        <div>
            <a class="return"
               href="<?php echo wc_get_page_permalink('shop') ?>"><?php _e('Back to shop', 'woocommerce') ?></a>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-lg-7 cart_row">
            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                <?php do_action('woocommerce_before_cart_table'); ?>

                <?php do_action('woocommerce_before_cart_contents'); ?>
                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)):
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <div class="d-flex py-2 cart_item_row">
                            <div class="product-thumbnail col-md-3 ">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                if (!$product_permalink) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                }
                                ?>
                            </div>
                            <div class="product-name col-md-6">
                                <?php
                                if (!$product_permalink) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                } else {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                }

                                do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                // Meta data.
                                echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                // Backorder notification.
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                }
                                ?>
                            </div>
                            <div class="col-md-3 d-flex justify-content-between flex-column">
                                <div class="product_remove">
                                    <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="delete" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times; %s</a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_html__('Remove', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku()),
                                            esc_html__('Remove', 'woocommerce')
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </div>
                                <div class="product-price">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php do_action('woocommerce_after_cart_table'); ?>
            </form>
        </div>
        <div class="col-lg-4 ">
            <div class="totals-col p-2">
                <?php do_action('woocommerce_before_cart_collaterals'); ?>

                <div class="cart-collaterals">
                    <?php
                    /**
                     * Cart collaterals hook.
                     *
                     * @hooked woocommerce_cross_sell_display
                     * @hooked woocommerce_cart_totals - 10
                     */
                    do_action('woocommerce_cart_collaterals');
                    ?>
                </div>

                <?php do_action('woocommerce_after_cart'); ?>
            </div>
            <?php if (have_rows('cart_links', 'option')): ?>
                <div class="d-flex flex-column flex-wrap">
                    <?php while (have_rows('cart_links', 'option')): the_row() ?>
                        <?php if ($link = get_sub_field('link')): ?>
                            <a href="<?php echo $link['url'] ?>"
                               target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?><i
                                        class="la la-angle-left" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>




