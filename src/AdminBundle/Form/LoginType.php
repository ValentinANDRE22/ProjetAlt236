<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Form;

    
    

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\AbstractType;


/**
 * Description of LoginType
 *
 * @author valentinandre
 */
class LoginType extends AbstractType {
    //put your code here
    
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {

   $builder
   ->add('username', TextType::class, array(
         'constraints' => array(
           new NotBlank(),),
   ))
   ->add('password', PasswordType::class, array(
       'constraints' => array(
           new NotBlank(),
       ),
   ));
}
    
}
