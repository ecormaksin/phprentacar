<?php

namespace Acme\RentacarBundle\Tests\Entity;

use Acme\RentacarBundle\Entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $user;

    protected function setUp()
    {
        $this->user = new User();
    }

    public function testValidPassword()
    {
        $this->user->setRawPassword('password');

        $this->assertTrue($this->user->isValidPassword('password'));
    }

    public function testInvalidPassword()
    {
        $this->user->setRawPassword('password');

        $this->assertFalse($this->user->isValidPassword('invalid'));
    }

    public function testEnabled()
    {
        $this->user->setActivationKey(null);

        $this->assertTrue($this->user->isEnabled());
    }

    public function testNotEnabledIfActivationKeyIsNotEmpty()
    {
        $this->user->setActivationKey('foo');

        $this->assertFalse($this->user->isEnabled());
    }
}
