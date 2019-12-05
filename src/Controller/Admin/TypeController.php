<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_types")
     */
    public function index(TypeRepository $repository)
    {
        $types = $repository->findAll();
        return $this->render('admin/type/adminType.html.twig', [
            'types' => $types,
        ]);
    }

    /**
     * @Route("/admin/type/create", name="admin_type_creation")
     * @Route("/admin/type/{id}", name="admin_type_modification", methods="POST|GET")
     */
    public function ajoutEtModifDeType(Type $type = null, Request $request, EntityManagerInterface $objectManager)
    {
        if (!$type) {
            $type = new Type();
        }

        $form = $this->createForm(TypeType::class, $type);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $modif = $type->getId() !== null;
            $objectManager->persist($type);
            $objectManager->flush();

            $this->addFlash("success", ($modif) ? "La modification a été effectuée." : "L'ajout a été effectuée.");

            return $this->redirectToRoute("admin_types");
        }

        return $this->render('admin/type/ajoutEtModifDeType.html.twig', [
            'type' => $type,
            'formType' => $form->createView(),
            'isModification' => $type->getId() !== null,
        ]);
    }

    /**
     * @Route("/admin/type/{id}", name="admin_type_suppression", methods="delete")
     */
    public function suppressionType(Type $type, Request $request, EntityManagerInterface $objectManager)
    {
        if ($this->isCsrfTokenValid('SUP' . $type->getId(), $request->get('_token'))) {
            $objectManager->remove($type);
            $objectManager->flush();

            $this->addFlash("success", "La suppression de type a été effectué.");

            return $this->redirectToRoute("admin_types");
        }
    }

}
