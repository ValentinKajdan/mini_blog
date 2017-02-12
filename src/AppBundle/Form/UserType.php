<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('email', TextType::class, [
                'required' => false,
                'label' => 'Email'
            ])
            // Obligatoire
            ->add('password', PasswordType::class, [
                'required' => false,
                'label' => 'Mot de passe'
            ])
            ->add('Connexion', SubmitType::class)
        ;
    }
}
