<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Backend\Noticia;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_page")
     */
    public function index()
    {
        $noticias_destacadas = $this->getDoctrine()->getRepository(Noticia::class)->findNoticiasDestacadas();
        return $this->render('front/index.html.twig',[
            'destacadas' => $noticias_destacadas,
        ]);
    }
}