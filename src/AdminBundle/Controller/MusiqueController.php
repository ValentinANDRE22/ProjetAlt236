<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Musique;
use AdminBundle\Form\MusiqueType;

/**
 * Description of MusiqueController
 *
 * @author valentinandre
 */
class MusiqueController extends Controller {
    
    public function musiqueBoardAction(Musique $musique, Request $request) {
       
         
        //Initialisation des variables
        $error = "";
        
        //Formulaire de modification de musique
        $formMusique = $this->createForm(MusiqueType::class, $musique);
        $formMusique->handleRequest($request);
        if($formMusique->isSubmitted()){
            if ($formMusique->isValid()) {
                
                $musique->setDateCrea(new \DateTime());

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($musique);
                    $em->flush();
                    return  $this->redirectToRoute('Admin_musique_board', array('id' => $musique->getId()));
                } catch (Exception $ex) {
                    $error = $ex;
                    dump($error);
                }
        
    }
    }
           return $this->render('AdminBundle:Musique:musiqueBoard.html.twig', array(
            'musique' => $musique,
            'formMusique' => $formMusique->createView(),
        ));
        
        
    }

}
