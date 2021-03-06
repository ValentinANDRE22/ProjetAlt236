<?php

namespace SourcesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('SourcesBundle:Default:index.html.twig');
    }

    /**
     * @Route("/Sources")
     */
    public function sourcesAction()
    {
        return $this->render('SourcesBundle:Default:sources.html.twig');
    }
}
