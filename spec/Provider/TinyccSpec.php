<?php

namespace spec\Indigo\Shorten\Provider;

use Indigo\Http\Client;
use PhpSpec\ObjectBehavior;

class TinyccSpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Shorten\Provider\Tinycc');
        $this->shouldImplement('Indigo\Shorten\Provider');
    }
}
