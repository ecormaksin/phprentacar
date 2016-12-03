<?php

namespace Acme\RentacarBudle\Tests\Entity;

use Acme\RentacarBundle\Entity\Reservation;
use Acme\RentacarBundle\Entity\CarClass;

class ReservationTest extends \PHPUnit_Framework_TestCase
{
    private $reservation;

    protected function setUp()
    {
        $reservation = new Reservation();

        $carClass = new CarClass();
        $carClass->setPrice3(5000);
        $carClass->setPrice6(7000);
        $carClass->setPrice12(9000);
        $carClass->setPrice24(11000);
        $carClass->setInsurancePrice(1000);

        $reservation->setCarClass($carClass);
        $this->reservation = $reservation;
    }

    /**
     * @dataProvider getCalculateAmountData
     */
    public function testCalculateAmount($interval, $useInsurance, $carSubtotal, $optionSubtotal, $totalAmount)
    {
        $departure = new \DateTime('2012-04-01 00:00:00');
        $return = clone $departure;
        $return->add(\DateInterval::createFromDateString($interval));

        $this->reservation->setDepartureAt($departure);
        $this->reservation->setReturnAt($return);
        $this->reservation->setUseInsurance($useInsurance);

        $this->reservation->calculateAmount();

        $this->assertEquals($carSubtotal, $this->reservation->getCarSubtotal());
        $this->assertEquals($optionSubtotal, $this->reservation->getOptionSubtotal());
        $this->assertEquals($totalAmount, $this->reservation->getTotalAmount());
    }

    public function getCalculateAmountData()
    {
        return array(
            array('+3 hours', true, 5000, 1000, 6000),
            array('+6 hours', false, 7000, 0, 7000),
            array('+12 hours', false, 9000, 0, 9000),
            array('+1 day', true, 11000, 1000, 12000),
            array('+1 day +4 hours', true, 18000, 2000, 20000),
            array('+1 day +15 hours', false, 22000, 0, 22000),
        );
    }
}
