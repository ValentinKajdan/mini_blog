<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Titre de la catégorie'
            ])
            ->add('submit', SubmitType::class, [
              'label' => 'Créer',
              'attr' => ['class' => 'waves-effect waves-light btn indigo darken-3']
            ])
        ;
    }
}
