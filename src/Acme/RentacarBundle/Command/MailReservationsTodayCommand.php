<?php

namespace Acme\RentacarBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * MailReservationsTodayCommand.
 *
 * @author Your name <you@example.com>
 */
class MailReservationsTodayCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('rentacar:mail:reservations-today')
            ->setDescription('本日の予約一覧メール送信')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $reservationRepository = $this->getContainer()->get('doctrine')->getRepository('AcmeRentacarBundle:Reservation');
        $mailService = $this->getContainer()->get('rentacar.mail_service');
        $email = $this->getContainer()->getParameter('admin_email');

        $today = new \DateTime('now');

        $departFrom = clone $today;
        $departFrom->setTime(0, 0);
        $departTo = clone $today;
        $departTo->setTime(23, 59);

        $reservations = $reservationRepository->findReservationsDepartBetween($departFrom, $departTo);

        $mailService->sendReservationsTodayMailForAdmin($today, $reservations, $email);

        $output->writeln(sprintf('<info>%sの予約一覧メールを送信しました</info>', $today->format('Y/m/d')));
    }
}
