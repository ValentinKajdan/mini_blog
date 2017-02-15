<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('author', TextType::class, [
                'required' => false,
                'label' => 'Auteur'
            ])
            // Obligatoire
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Titre'
            ])
            // Obligatoire
            ->add('content', TextareaType::class, [
                'required' => false,
                'label' => 'Contenu de l\'article',
                'attr' => ['class' => 'materialize-textarea']
            ])
            ->add('category_id',EntityType::class, [
              'class' => 'AppBundle:Category',
              'label' => 'Catégorie',
              'choice_label' => 'title',
              'attr' => ['style' => 'display: block;'],
              'multiple' => false])

            ->add('submit', SubmitType::class, [
              'label' => 'Créer',
              'attr' => ['class' => 'waves-effect waves-light btn indigo darken-3']
            ])
        ;
    }
}
