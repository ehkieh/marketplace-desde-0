<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Trayecto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PrivateController extends Controller
{
    /**
     * @Route("/nuevoTrayecto", name="private_nuevoTrayecto")
     */
    public function nuevoTrayectoAction(Request $request)
    {
       
        return $this->render('nuevoTrayecto/index.html.twig');
    }
    
    /**
     * @Route("/publicarTrayecto", name="private_publicarTrayecto")
     */ 
    public function publicarTrayectoAction(Request $request)
    {
        //Creamos la entidad Trayecto
        $nuevoTrayecto= new Trayecto();
        
        //Asignamos los valores recogidos por Request del form
        $nuevoTrayecto->setOrigen(($request->get('origen')));
        $nuevoTrayecto->setDestino(($request->get('destino')));
        $nuevoTrayecto->setCalle(($request->get('calle')));
        
        //Creamos el objeto \DateTime y lo almacenamos en $fechaDateTime
        $fechaDateTime = new \DateTime(($request->get('fechaDeViaje')));
        $nuevoTrayecto->setFechaDeViaje($fechaDateTime);
        
        //Creamos el objeto \DateTime y lo almacenamos en $horaDateTime
        $horaDateTime = new \DateTime(($request->get('horaDeViaje')));
        $nuevoTrayecto->setHoraDeViaje($horaDateTime);
        //Asignamos los valores recogidos por Request del form
        $nuevoTrayecto->setPrecio(($request->get('precio')));
        $nuevoTrayecto->setDescripcion(($request->get('descripcion')));
        $nuevoTrayecto->setPlazas(($request->get('plazas')));
        //Utilizamos el valor de User y lo almacenamos en la variable $usuarioLogueado
        $usuarioLogueado = $this->getUser();
        $nuevoTrayecto->setConductor($usuarioLogueado);
        
        //Hacemos un persist y un flush de los datos que hemos ido almacenando
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($nuevoTrayecto);
        $entityManager->flush();
        
        //Explicacion para entenderlo mejor
        //$urlForRedirect = $this->generateUrl("...");
        //return $this->redirect($urlForRedirect);
        return $this->redirect($this->generateUrl('public_home'));
        
    }
}