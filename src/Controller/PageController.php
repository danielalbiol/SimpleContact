<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{

    private $logger;
    private $formatoFecha;

    public function __construct($logger, $formatoFecha) {
        $this->logger = $logger;
        $this->formatoFecha = $formatoFecha;

    }
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $fecha_hora = new \DateTime();
        $this->logger->info("Acceso el " . $fecha_hora->format($this->formatoFecha));
        return $this->render('inicio.html.twig');
    }
}
