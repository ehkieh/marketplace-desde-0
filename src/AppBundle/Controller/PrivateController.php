<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrivateController extends Controller
{
    /**
     * @Route("/nuevo_Trayecto", name="private_nuevoTrayecto")
    */
     public function nuevoTrayectoAction(Request $request)
     {
        die("Pendiente de Hacer: Nuevo Trayecto");
     }
     
    /**
     * @Route("/publicar_Trayecto", name="private_publicarTrayecto")
    */
    public function publicarTrayectoAction(Request $request)
    
    {
    die("Pendiente de Hacer: Publicar Trayecto");
    }
        
}
