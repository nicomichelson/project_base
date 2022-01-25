<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends EasyAdminController
{
   /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        if ($request->query->has('entity')){
            return parent::indexAction($request);
        }
        return $this->redirectToRoute('admin_dashboard');
    }

    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    public function dashboardAction()
    {
        // dump('holis');die;
        return $this->render('dashboard/dashboard.html.twig');
    }
}
