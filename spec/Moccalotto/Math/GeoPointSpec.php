<?php

namespace spec\Moccalotto\Math;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeoPointSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(0, 0);
        $this->shouldHaveType('Moccalotto\Math\GeoPoint');
        $this->lat()->shouldReturn(0.0);
        $this->lon()->shouldReturn(0.0);
    }

    function it_converts_lat_to_floats()
    {
        $this->beConstructedWith(0, 0);
        $this->lat()->shouldReturn(0.0);
    }

    function it_converts_lon_to_floats()
    {
        $this->beConstructedWith(0, 0);
        $this->lon()->shouldReturn(0.0);
    }

    function it_can_measure_distance_between_geo_points_with_good_precision()
    {
        $this->beConstructedWith(0, 0);
        $distance = $this->distanceTo(new \Moccalotto\Math\GeoPoint(10, 0));
        $distance->shouldHaveType('Moccalotto\Math\Distance');
        $meters = $distance->meters()->shouldBeCloseTo(690801.317939, 0.000001);
    }

    public function getMatchers()
    {
        return [
            'beCloseTo' => function($value, $float, $precision = 0.00001) {
                return abs($value - $float) < $precision;
            },
        ];
    }
}
