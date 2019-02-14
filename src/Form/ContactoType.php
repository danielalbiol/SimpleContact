<?php
namespace App\Form;

use App\Entity\Provincia;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, (!empty($options['data']->getId()) ? ['attr' => ['readonly' => true]]: []))
            ->add('nombre', TextType::class)
            ->add('telefono', TextType::class)
            ->add('email', TextType::class, array('label' => 'Correo electrónico'))
            ->add('provincia', EntityType::class, array(
                'class' => Provincia::class,
                'choice_label' => 'nombre',
            ))
            ->add('save', SubmitType::class, array('label' => 'Enviar'));
    }
}
