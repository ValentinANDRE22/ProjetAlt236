<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Video;
use AdminBundle\Form\VideoType;
use AdminBundle\Entity\Musique;
use AdminBundle\Form\MusiqueType;
use AdminBundle\Entity\User;
use Doctrine\Common\Collections\Criteria;


class DefaultController extends Controller
{
    // Retourne la page d'accueil de l'espace admin avec ses formulaire
    public function indexAction(Request $request)
    {
         $error = "";

          $em = $this->getDoctrine()->getManager();

          // Récupération des videos
          $listeVideos = $em->getRepository(Video::class)->findBy(
                        array('isAlive' => null), array('dateCrea' => 'desc'), $limit = 6,  null
                  );

         //Récupération des musiques
          $listeMusiques = $em->getRepository(Musique::class)->findBy(
                        array('isAlive' => null), array('dateCrea' => 'asc'), null,  null
                  );
         
         //Récupération des utilisateurs 
          $listeUsers = $em->getRepository(User::class)->findAll();

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
            'listeVideos' => $listeVideos,
            'listeMusiques' => $listeMusiques,
            'listeUsers' => $listeUsers,
            'formVideo' => $formVideo->createView(),
            'formMusique' => $formMusique->createView(),
        ));
    }
    

}
