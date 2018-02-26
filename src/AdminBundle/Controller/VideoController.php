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
use AdminBundle\Entity\Extrait;
use AdminBundle\Form\ExtraitType;
use AdminBundle\Entity\LiaisonMusique;
use AdminBundle\Form\LiaisonMusiqueType;
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
        
    
        $criteria = Criteria::create()
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
        
        //création du formulaire d'ajout d'extrait
        $extrait = new Extrait();
        $formExtrait = $this->createForm(ExtraitType::class, $extrait);
        $formExtrait->handleRequest($request);
        if($formExtrait->isSubmitted()){
            if ($formExtrait->isValid()) {
                
                $extrait->setVideo($video);
                $extrait->setDateCrea(new \DateTime());

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($extrait);
                    $em->flush();
                    return  $this->redirectToRoute('Admin_video_board', array('id' => $video->getId()));
                } catch (Exception $ex) {
                    $error = $ex;
                    dump($error);
                }
            }
        }
        
          //création du formulaire d'ajout de musique
        $liaison = new LiaisonMusique();
        $formLiaison = $this->createForm(LiaisonMusiqueType::class, $liaison);
        $formLiaison->handleRequest($request);
        if($formLiaison->isSubmitted()){
            if ($formLiaison->isValid()) {
                
                $liaison->setVideo($video);

                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($liaison);
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
            'criteria' => $criteria,
            'formVideo' => $formVideo->createView(),
            'formImage' => $formImage->createView(),
            'formExtrait' => $formExtrait->createView(),
            'formMusique' => $formLiaison->createView(),
        ));
    }
    
    public function deleteImageAction(Image $image){
        $em = $this->getDoctrine()->getManager();
        
        $image->setIsAlive(new \DateTime());
        $em->flush();
        
        return $this->redirectToRoute('Admin_video_board', array('id' => $image->getVideo()->getId()));
        
    }
    
    public function deleteExtraitAction(Extrait $extrait){
        $em = $this->getDoctrine()->getManager();
        
        $extrait->setIsAlive(new \DateTime());
        $em->flush();
        
        return $this->redirectToRoute('Admin_video_board', array('id' => $extrait->getVideo()->getId()));
        
    }
    
    public function deleteLiaisonMusiqueAction(LiaisonMusique $liaison){
        $em = $this->getDoctrine()->getManager();
        $id = $liaison->getVideo()->getId();
     
        $em->remove($liaison);
        $em->flush();
        
        return $this->redirectToRoute('Admin_video_board', array('id' => $id));
        
    }
    
    public function deleteVideoAction(Video $video){
        $em = $this->getDoctrine()->getManager();
        $mesLiaison = $em->getRepository(LiaisonMusique::class)->findBy(['video' => $video->getId()]);
        foreach($mesLiaison as $liaison){
            $liaison->getId();
            $em->remove($liaison);
        }
        
        $video->setIsAlive(new \DateTime());
        $em->flush();
        
        return $this->redirectToRoute('Admin_index');
        
    }
}