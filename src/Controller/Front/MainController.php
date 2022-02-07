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
        // dump($noticias_destacadas);die;
        return $this->render('front/index.html.twig',[
            'destacadas' => $noticias_destacadas,
        ]);
    }

    /**
     * @Route("detalle-noticia/{id}", name="detalle_noticia")
     */

    public function detalleNoticia($id)
    {
        $detalle_noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($id);
        return $this->render('front/detalle_noticia.html.twig',[
            'noticia' => $detalle_noticia
        ]);
    }
}