<?php

namespace Acme\RentacarBundle\Controller\Admin;

use Crocos\SecurityBundle\Annotation\SecureConfig;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @SeurityConfig(domain="admin", basic="admin:adminpass")
 */
abstract class AdminAppController extends Controller
{
}
