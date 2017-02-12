<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('author', TextType::class, [
                'required' => false,
                'label' => 'Nom'
            ])
            // Obligatoire
            ->add('content', TextareaType::class, [
                'required' => false,
                'label' => 'Votre commentaire'
            ])
            // Caché
            ->add('date', HiddenType::class, [
                'data' => date("Y-m-d")
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}