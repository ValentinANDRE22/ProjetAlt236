<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Video;
use AdminBundle\Form\VideoType;
use AdminBundle\Entity\Musique;
use AdminBundle\Form\MusiqueType;


class DefaultController extends Controller
{
    // Retourne la page d'accueil de l'espace admin avec ses formulaire
    public function indexAction(Request $request)
    {
         $error = "";
         
        // Création du formulaire des vidéos 
        $video = new Video();
        $formVideo = $this->createForm(VideoType::class, $video);
        $formVideo->handleRequest($request);
        if($formVideo->isSubmitted()){
            if ($formVideo->isValid()) {
                
                $video->setDateCrea(new \DateTime());

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($video);
                    $em->flush();
                    return  $this->redirectToRoute('Admin_video_board', array('id' => $video->getId()));
                } catch (Exception $ex) {
                    $error = $ex;
                    dump($error);
                }
               

            }
        }
        
        //Creation du formulaire de musique
        $musique = new Musique();
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
        
         
        return $this->render('AdminBundle:Default:index.html.twig', array(
            'formVideo' => $formVideo->createView(),
            'formMusique' => $formMusique->createView(),
        ));
    }
    

}
