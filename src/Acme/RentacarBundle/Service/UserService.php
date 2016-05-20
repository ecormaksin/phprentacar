<?php

namespace Acme\RentacarBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Acme\RentacarBundle\Entity\User;

/**
 * UserService.
 *
 * @author Your name <you@example.com>
 */
class UserService
{
    private $managerRegistry;
    private $mailService;

    /**
     * Constructor.
     *
     * @param RegistryInterface $managerRegistry
     * @param MailService $mailService
     */
    public function __construct(RegistryInterface $managerRegistry, MailService $mailService)
    {
        $this->managerRegistry = $managerRegistry;
        $this->mailService = $mailService;
    }

    /**
     * Register user.
     *
     * @param User $user
     */
    public function registerUser(User $user)
    {
        $userRepository = $this->managerRegistry->getRepository('AcmeRentacarBundle:User');

        try {
            $userRepository->createUser($user);

            $this->mailService->sendRegistrationConfirmMail($user);
        } catch (\InvalidArgumentException $e) {
            $this->mailService->sendDuplicatedRegistrationMail($user);
        }
    }
}
