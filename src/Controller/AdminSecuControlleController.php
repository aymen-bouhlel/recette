<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecuControlleController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {

        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class, $utilisateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $passwordCrypte = $encoder->encodePassword($utilisateur,$utilisateur->getPassword());
            $utilisateur->setPassword($passwordCrypte);


            $manager->persist($utilisateur);
            $manager->flush();

            $this->addFlash("success", "L'ajout a été effectuée.");

            return $this->redirectToRoute("aliments");
        }

        return $this->render('admin_secu_controlle/inscription.html.twig', [
            'InscriptionForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login", name="connexion")
     */
    public function login()
    {

        return $this->render('admin_secu_controlle/login.html.twig');
    }

    /**
     * @Route("/logout", name="deconnexion")
     */
    public function logout()
    {

        return $this->render('admin_secu_controlle/logout.html.twig');
    }



}   
