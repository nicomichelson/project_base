<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Backend\Noticia;
use App\Entity\Backend\Programa;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_page")
     */
    public function index()
    {
        $noticias_destacadas = $this->getDoctrine()->getRepository(Noticia::class)->findNoticiasDestacadas();
        $programas = $this->getDoctrine()->getRepository(Programa::class)->findBy(['activo' => TRUE]);
        // dump(date("Y-m-d"));die;
        return $this->render('front/index.html.twig',[
            'destacadas' => $noticias_destacadas,
            'programas' => $programas,
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

    public function getAllProgramas()
    {
        $programas = $this->getDoctrine()->getRepository(Programa::class)->findBy(['activo' => TRUE]);
        return $this->render('front/_programas.html.twig',[
            'programas' => $programas,
        ]);
    }

    public function getAllSeccionEspecial()
    {
        // $programas = $this->getDoctrine()->getRepository(Programa::class)->findBy(['activo' => TRUE]);
        return $this->render('front/_seccion_especial.html.twig',[
            // 'programas' => $programas,
        ]);
    }
}