<?php

namespace Batis\CrowdsourcingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    public function addAction()
    {
        return $this->render('BatisCrowdsourcingBundle:Project:post-job.html.twig');
    }
}
