<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\Common\Collections\Criteria;
use AdminBundle\Entity\LiaisonMusique;
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
        if ($formMusique->isSubmitted()) {
            if ($formMusique->isValid()) {

                $musique->setDateCrea(new \DateTime());

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($musique);
                    $em->flush();
                    return $this->redirectToRoute('Admin_musique_board', array('id' => $musique->getId()));
                } catch (Exception $ex) {
                    $error = $ex;
                    dump($error);
                }
            }
        }

        //On récupère les videos lié a la musique 
        $tableauVideoUnique = array_unique($musique->getLiaisonMusique()->toArray());



        return $this->render('AdminBundle:Default:musiqueBoard.html.twig', array(
                    'musique' => $musique,
                    'tableauMusique' => $tableauVideoUnique,
                    'formMusique' => $formMusique->createView(),
        ));
    }

    public function deleteMusiqueAction(Musique $musique) {
        $em = $this->getDoctrine()->getManager();
        $mesLiaison = $em->getRepository(LiaisonMusique::class)->findBy(['musique' => $musique->getId()]);
        foreach ($mesLiaison as $liaison) {
            $liaison->getId();
            $em->remove($liaison);
        }
        
        $musique->setIsAlive(new \DateTime());
        $em->flush();

        return $this->redirectToRoute('Admin_index');
    }

}
