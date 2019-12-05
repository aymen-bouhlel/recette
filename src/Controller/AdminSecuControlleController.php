<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminSecuControlleController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, EntityManagerInterface $manager)
    {

        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class, $utilisateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $manager->persist($utilisateur);
            $manager->flush();

            $this->addFlash("success", "L'ajout a été effectuée.");

            return $this->redirectToRoute("aliments");
        }

        return $this->render('admin_secu_controlle/inscription.html.twig', [
            'InscriptionForm' => $form->createView(),
        ]);
    }
}
