<?php

namespace Acme\RentacarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * CarClassController.
 *
 * @author Your name <you@example.com>
 *
 * @Route("/car")
 */
class CarClassController extends AppController
{
    /**
     * @Route("/", name="car_class")
     * @Template
     */
    public function indexAction()
    {
        $carClassRepository = $this->get('doctrine')->getRepository('AcmeRentacarBundle:CarClass');
        $carClasses = $carClassRepository->findAll();

        return array(
            'carClasses' => $carClasses,
        );
    }
}
