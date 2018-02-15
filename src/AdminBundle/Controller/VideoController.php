<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Entity\Video;
use AdminBundle\Form\VideoType;
use AdminBundle\Entity\Image;
use AdminBundle\Form\ImageType;
use Doctrine\Common\Collections\Criteria;

/**
 * Description of VideoController
 *
 * @author valentinandre
 */
class VideoController extends Controller{
    
     public function videoBoardAction(Video $video , Request $request )
    {
         // Initialisation des variables
        $error = "";
        
        //Récupération des images
//        $tableImages = $video->getImage()->toArray();
        $criteriaImage = Criteria::create()
        ->where(Criteria::expr()->eq("isAlive", null))
        ->orderBy(array("timer" => Criteria::ASC))
        ;

         
         // Création du formulaire de modification de vidéo 
        $formVideo = $this->createForm(VideoType::class, $video);
        $formVideo->handleRequest($request);
        if($formVideo->isSubmitted()){
            if ($formVideo->isValid()) {
                
                $video->setDateModif(new \DateTime());

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
        
        //création du formulaire d'ajout d'image
        $image = new Image();
        $formImage = $this->createForm(ImageType::class, $image);
        $formImage->handleRequest($request);
        if($formImage->isSubmitted()){
            if ($formImage->isValid()) {
                
                $image->setVideo($video);
                $image->setDateCrea(new \DateTime());

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($image);
                    $em->flush();
                    return  $this->redirectToRoute('Admin_video_board', array('id' => $video->getId()));
                } catch (Exception $ex) {
                    $error = $ex;
                    dump($error);
                }
            }
        }
        
        
        return $this->render('AdminBundle:Default:videoBoard.html.twig', array(
            'video' => $video,
            'criteriaImage' => $criteriaImage,
            'formVideo' => $formVideo->createView(),
            'formImage' => $formImage->createView(),
        ));
    }
    
    public function deleteImageAction(Image $image){
        $em = $this->getDoctrine()->getManager();
        
        $image->setIsAlive(new \DateTime());
        $em->flush();
        
        return $this->redirectToRoute('Admin_video_board', array('id' => $image->getVideo()->getId()));
        
    }
    
}