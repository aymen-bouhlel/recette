<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/admin/aliment", name="admin_admin_aliment")
     */
    public function index()
    {
        return $this->render('admin/admin_aliment/adminAliment.html.twig');
    }
}
