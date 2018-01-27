<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\User;
use AdminBundle\Form\UserType;
use AdminBundle\Form\LoginType;
/**
 * Description of UserController
 *
 * @author valentinandre
 */
class UserController extends Controller{
    
    public function loginAction(Request $request) {
        $array = array();
        $error = "";
        
        $form = $this->createForm(LoginType::class, $array, array(
            'action' => $this->generateUrl('login_check')
        ));
        $helper = $this->get('security.authentication_utils');
        $error = $helper->getLastAuthenticationError();

        dump($error);
 
        if($error instanceof BadCredentialsException){
            $error = "Veuillez vérifier vos identifiants de connexion.";  
        }
        elseif ($error instanceof LockedException){
            $error = "Vous n'ếtes pas autorisé a vous connecter.";
        }
        
        return $this->render('AdminBundle:Default:login.html.twig', array(
            'form'=> $form->createView(),
            'error'=> $error,
        ));
    }
    
    
    
    /*
     * @security("has_role('ROLE_SUPER_ADMIN')")   
     */
    public function registerAction(Request $request) {
        
        
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if ($form->isValid()) {
                
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($form->get('password')->getData(), $user->getSalt());
                $user->setPassword($password);
                
               // $user->addRoles("ROLE_SUPER_ADMIN");
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

            }
        }
        
        return $this->render('AdminBundle:Default:register.html.twig', array(
            'form'=> $form->createView(),
        ));
    }
    
}
