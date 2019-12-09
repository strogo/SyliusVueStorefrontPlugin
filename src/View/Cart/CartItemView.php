<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\View\Cart;

final class CartItemView
{
    /** @var int */
    public $item_id;

    /** @var string */
    public $sku;

    /** @var int */
    public $qty;

    /** @var string */
    public $name;

    /** @var int */
    public $price;

    /** @var int */
    public $product_type;

    /** @var string */
    public $quote_id;

    /** @var object */
    public $product_option;
}
