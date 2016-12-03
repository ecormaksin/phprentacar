<?php

namespace Acme\RentacarBundle\Tests\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\RentacarBundle\Entity\User;
use Acme\RentacarBundle\Entity\Reservation;

class LoadReservedTestUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user2 = new User();
        $user2->setName('User2');
        $user2->setEmail('user2@example.com');
        $user2->setRawPassword('password');
        $user2->setTel('090-0000-0000');
        $user2->setBirthday(new \DateTime('1980-01-01'));

        $reservation2_1 = new Reservation();
        $reservation2_1->setUser($user2);
        $reservation2_1->setDepartureAt(new \DateTime('2012-04-01 12:00'));
        $reservation2_1->setDepartureLocation($this->getReference('location-1'));
        $reservation2_1->setReturnAt(new \DateTime('2012-04-02 17:30'));
        $reservation2_1->setReturnLocation($this->getReference('location-1'));
        $reservation2_1->setCarClass($this->getReference('car-class-1'));
        $reservation2_1->setUseInsurance(true);
        $reservation2_1->calculateAmount();

        $manager->persist($user2);
        $manager->persist($reservation2_1);
        $manager->flush();

        $this->addReference('user-2', $user2);
        $this->addReference('user-2-reservation-1', $reservation2_1);

    }

    public function getOrder()
    {
        return 12;
    }
}
