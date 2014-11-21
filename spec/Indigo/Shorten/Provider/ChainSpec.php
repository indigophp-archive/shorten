<?php

namespace spec\Indigo\Shorten\Provider;

use Indigo\Shorten\Provider;
use PhpSpec\ObjectBehavior;

class ChainSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Shorten\Provider\Chain');
        $this->shouldImplement('Indigo\Shorten\Provider');
    }

    function it_should_be_able_to_add_a_provider(Provider $provider)
    {
        $this->addProvider($provider);
        $this->getProviders()->shouldReturn([$provider]);
        $this->clearProviders();
        $this->getProviders()->shouldReturn([]);
    }

    function it_should_be_able_to_shorten_a_url(Provider $provider)
    {
        $provider->shorten('http://httpbin.org/')->willReturn('http://short.ly/1234');
        $this->addProvider($provider);

        $this->shorten('http://httpbin.org/')->shouldReturn('http://short.ly/1234');
    }

    function it_should_be_able_to_expand_a_url(Provider $provider)
    {
        $provider->expand('http://short.ly/1234')->willReturn('http://httpbin.org/');
        $this->addProvider($provider);

        $this->expand('http://short.ly/1234')->shouldReturn('http://httpbin.org/');
    }
}
