<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


/**
 * Description of SearchBarController
 *
 * @author valentinandre
 */
class SearchBarController extends Controller {

    public function searchAction(Request $request) {


        $formSearch = $this->createFormBuilder()
                ->add('video', EntityType::class, array(
                    'class' => Video::class,
                    'choice_label' => 'titre',
                    'placeholder' => 'Video',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                                ->where('u.isAlive is null');
                    },))
                ->getForm();

        $formSearch->handleRequest($request);

        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $formSearch->getData();
            var_dump($data);
            exit();
        }

        return $this->render(
                        'AdminBundle:Default:renderSearch.html.twig', array('formSearch' => $formSearch->createView())
        );
    }

}
