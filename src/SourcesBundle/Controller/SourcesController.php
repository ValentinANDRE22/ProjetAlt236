<?php

namespace SourcesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SourcesController extends Controller
{

    /**
     * @Route("/Sources")
     */
    public function indexAction()
    {
        $user = "";
        $user = $this->getUser();
        //dump($user->getRoles());
        
        return $this->render('SourcesBundle:Default:sources.html.twig', array(
            'user'=> $user,
        ));
    }
}
