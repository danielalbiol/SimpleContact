<?php
namespace App\Controller;

use App\Entity\Contacto;
use App\Form\ContactoType;
use App\Entity\Provincia;
use App\Service\BDPrueba;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{

    private $contactos;

    public function __construct(BDPrueba $datos)
    {
        $this->contactos = $datos->get();
    }

    /**
     * @Route("/contacto/{codigo<\d+>?1}", name="ficha_contacto")
     */
    public function ficha($codigo)
    {
        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $contacto = $repositorio->find($codigo);

        if ($contacto) {
            return $this->render('contacto/ficha_contacto.html.twig', [
                'contacto' => $contacto,
            ]);
        } else {
            return $this->render('contacto/ficha_contacto.html.twig', [
                'contacto' => null,
            ]);
        }

    }

    /**
     * @Route("/contacto/nuevo", name="nuevo_contacto")
     */
    public function nuevo(Request $request)
    {
        $contacto = new Contacto();
        $formulario = $this->createForm(ContactoType::class, $contacto);
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {

            $contacto = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('contacto/nuevo.html.twig', array(
            'formulario' => $formulario->createView(),
        ));
    }

    /**

     * @Route("/contacto/editar/{codigo}", name="editar_contacto", requirements={"codigo"="\d+"})
     */

    public function editar(Request $request, $codigo)
    {

        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $contacto = $repositorio->find($codigo);
        $formulario = $this->createForm(ContactoType::class, $contacto);
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $contacto = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('contacto/nuevo.html.twig', array(
            'formulario' => $formulario->createView(),
        ));
    }

    /**
     * @Route("/contacto/insertar", name="insertar_contacto")
     */
    public function insertar()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $provincia = new Provincia();

        $provincia->setNombre("Alicante");
        $contacto = new Contacto();
        $contacto->setNombre("Inserción de prueba");
        $contacto->setTelefono("900110011");
        $contacto->setEmail("insercion.de.prueba@contacto.es");
        $contacto->setProvincia($provincia);
        $entityManager->persist($provincia);
        $entityManager->persist($contacto);

        try
        {
            $entityManager->flush();
            return new Response("Contacto insertado con id " . $contacto->getId());
        } catch (\Exception $e) {
            return new Response("Error insertando objeto");
        }

    }

    /**
     * @Route("/contacto/actualizar/{id<\d+>}", name="actualizar_contacto")
     */
    public function actualizar($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $repositorioProv = $this->getDoctrine()->getRepository(Provincia::class);
        $provincia = $repositorioProv->find(2);
        $contacto = $repositorio->find($id);

        if ($contacto) {
            $contacto->setNombre("Contacto modificado");
            $contacto->setProvincia($provincia);
            $entityManager->flush();
        }

        return new Response("Contacto actualizado");
    }

    /**
     * @Route("/contacto/borrar/{id}", name="borrar_contacto")
     */
    public function borrar($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $contacto = $repositorio->find($id);

        if ($contacto) {
            $entityManager->remove($contacto);
            $entityManager->flush();
        }

        return new Response("Contacto eliminado");
    }

    /**
     * @Route("/contacto/{texto}", name="buscar_contacto")
     */
    public function buscar($texto)
    {
        $repositorio = $this->getDoctrine()->getRepository(Contacto::class);
        $resultado = $repositorio->findByName($texto);
        return $this->render('contacto/lista_contactos.html.twig', array(
            'contactos' => $resultado,
        ));
    }
}
