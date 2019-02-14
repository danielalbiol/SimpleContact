<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuario;
use App\Form\UsuarioType;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/login.html.twig', array(
            'error' => $error,
            'lastUsername' => $lastUsername,
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(UserPasswordEncoderInterface $encoder, Request $request)
    {
        $usuario = new Usuario();

        $formulario = $this->createForm(UsuarioType::class, $usuario);
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {

            $usuario = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $passwordCodificado = $encoder->encodePassword($usuario, 
                                            $formulario["password"]->getData());
            $usuario->setPassword($passwordCodificado);
            
            $entityManager->persist($usuario);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('login/register.html.twig', array(
            'formulario' => $formulario->createView(),
        ));
    }
}
