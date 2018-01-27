<?php

namespace SourcesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class VideosController extends Controller
{

    /**
     * @Route("/Videos")
     */
    public function indexAction()
    {
        return $this->render('SourcesBundle:Default:videos.html.twig');
    }
}
