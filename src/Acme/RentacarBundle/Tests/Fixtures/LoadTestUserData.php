<?php

namespace Acme\RentacarBundle\Tests\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\RentacarBundle\Entity\User;

class LoadTestUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setName('User1');
        $user1->setEmail('user1@example.com');
        $user1->setRawPassword('password');
        $user1->setTel('090-0000-0000');
        $user1->setBirthday(new \DateTime('1980-01-01'));

        $manager->persist($user1);
        $manager->flush();

        $this->addReference('user-1', $user1);
    }

    public function getOrder()
    {
        return 11;
    }
}
