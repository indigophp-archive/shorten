<?php

namespace spec\Indigo\Shorten\Provider;

use Indigo\Http\Client;
use PhpSpec\ObjectBehavior;

class OwlySpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Shorten\Provider\Owly');
        $this->shouldImplement('Indigo\Shorten\Provider');
    }
}
