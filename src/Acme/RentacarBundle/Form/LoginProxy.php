<?php

namespace Acme\RentacarBundle\Form;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;
use Acme\RentacarBundle\Entity\User;
use Acme\RentacarBundle\Entity\UserRepository;

/**
 * LoginProxy.
 *
 * @author Your name <you@example.com>
 *
 * @Assert\Callback(methods={"authenticate"})
 */
class LoginProxy
{
    public $email;
    public $password;
    private $userRepository;
    private $user;

    /**
     * Constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Authenticate.
     *
     * @param ExecutionContext $context
     */
    public function authenticate(ExecutionContext $context)
    {
        if (strlen($this->email) > 0 && strlen($this->password) > 0) {
            $user = $this->userRepository->authenticateUser($this->email, $this->password);

            if ($user) {
                $this->user = $user;
            } else {
                $context->addViolation('メールアドレスかパスワードが間違っています', array(), $this);
            }
        } else {
            $context->addViolation('メールアドレスとパスワードを入力してください', array(), $this);
        }
    }

    /**
     * Get login user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
