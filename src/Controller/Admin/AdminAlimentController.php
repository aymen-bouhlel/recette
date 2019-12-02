<?php

namespace App\Controller\Admin;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();

        return $this->render('admin/admin_aliment/adminAliment.html.twig', [
            'aliments' => $aliments,
        ]);
    }
}
