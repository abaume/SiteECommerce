<?php

namespace ECommerce\ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ECommerceConnexionBundle:Default:index.html.twig');
    }
}
