<?php

/*
 * This file has been created by developers from BitBag.
 *  Feel free to contact us once you face any issues or want to start
 *  another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\Command\Cart;

use BitBag\SyliusVueStorefrontPlugin\Command\Cart\SetShippingInformation;
use PhpSpec\ObjectBehavior;

final class SetShippingInformationSpec extends ObjectBehavior
{
    private const TOKEN = 'token';
    private const CART_ID = 'set-shipping-information-spec';
    private const ADDRESS_INFORMATION = null;

    function let(): void
    {
        $this->beConstructedWith(
            self::TOKEN,
            self::CART_ID,
            self::ADDRESS_INFORMATION
        );
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(SetShippingInformation::class);
    }

    function it_allows_access_via_properties(): void
    {
        $this->token()->shouldReturn(self::TOKEN);
        $this->cartId()->shouldReturn(self::CART_ID);
        $this->addressInformation()->shouldReturn(self::ADDRESS_INFORMATION);
    }
}