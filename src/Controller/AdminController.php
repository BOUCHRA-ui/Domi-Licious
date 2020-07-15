<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends EasyAdminController
{
    /**
     * @Route("/admin", methods={"GET"}, name="easyadmin" )
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}


