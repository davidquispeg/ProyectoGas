<?php

namespace Eticom\GasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EticomGasBundle:Default:index.html.twig', array('name' => $name));
    }
}
