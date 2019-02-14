<?php
namespace App\MisClases;

use Psr\Log\LoggerInterface;
use App\Service\BDPrueba;

class MiClase
{
    private $servicio;

    public function __construct(ServicioCombinado $servicio) {
        $this->servicio = $servicio;
    }

    //Resto de código
}