<?php
namespace App\Form;

use App\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label' => 'Nombre de usuario'))
            ->add('password', PasswordType::class, array('label' => 'Password'))
            ->add('email', TextType::class, array('label' => 'Correo electrónico'))
            ->add('roles', HiddenType::class, array('data' => 'ROLE_USER'))
            ->add('register', SubmitType::class, array('label' => 'Registrar'));
    }
}
