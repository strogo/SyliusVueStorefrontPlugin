<?php

/*
 * This file has been created by developers from BitBag.
 *  Feel free to contact us once you face any issues or want to start
 *  another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\Factory\User;

use BitBag\SyliusVueStorefrontPlugin\Factory\Common\AddressViewFactoryInterface;
use BitBag\SyliusVueStorefrontPlugin\Factory\User\UserProfileViewFactory;
use BitBag\SyliusVueStorefrontPlugin\Sylius\Provider\ChannelProviderInterface;
use BitBag\SyliusVueStorefrontPlugin\View\Common\AddressView;
use BitBag\SyliusVueStorefrontPlugin\View\User\UserProfileView;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;

final class UserProfileViewFactorySpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(UserProfileViewFactory::class);
    }

    function let(AddressViewFactoryInterface $addressViewFactory, ChannelProviderInterface $channelProvider): void
    {
        $this->beConstructedWith(UserProfileView::class, $addressViewFactory, $channelProvider);
    }

    function it_creates_user_profile_view(
        CustomerInterface $syliusCustomer,
        AddressViewFactoryInterface $addressViewFactory,
        AddressInterface $address,
        ChannelProviderInterface $channelProvider,
        ChannelInterface $channel
    ): void {
        $channelProvider->provide()->willReturn($channel);

        $syliusCustomer->getId()->shouldBeCalled();
        $syliusCustomer->getDefaultAddress()->willReturn($address);
        $syliusCustomer->getCreatedAt()->willReturn(new \DateTime('yesterday'));
        $syliusCustomer->getUpdatedAt()->willReturn(new \DateTime('yesterday'));
        $syliusCustomer->getEmail()->shouldBeCalled();
        $syliusCustomer->getFirstName()->shouldBeCalled();
        $syliusCustomer->getLastName()->shouldBeCalled();
        $syliusCustomer->getAddresses()->willReturn(new ArrayCollection(
            [
                $address->getWrappedObject(),
            ]
        ));

        $addressViewFactory->create(Argument::any())->willReturn(new AddressView());

        $this->create($syliusCustomer)->shouldBeAnInstanceOf(UserProfileView::class);
    }
}
