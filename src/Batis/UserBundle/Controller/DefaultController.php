<?php

namespace Batis\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BatisUserBundle:Default:index.html.twig');
    }
}
