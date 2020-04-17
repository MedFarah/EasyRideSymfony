<?php

namespace EvenmentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/hello")
     */
    public function indexAction()
    {
        return $this->render('@Evenments/Default/index.html.twig');
    }
}
