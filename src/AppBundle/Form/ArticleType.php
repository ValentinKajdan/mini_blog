<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // $categories = $this
        //     ->getDoctrine()
        //     ->getRepository('AppBundle:Category')
        //     ->findBy([])
        // ;
        // dump($categories) ;

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
            ->add('category_id', ChoiceType::class, [
              'choices' => [
                '0 étoile' => 0,
                '1 étoile' => 1,
                '2 étoiles' => 2,
                '3 étoiles' => 3,
              ],
              'label' => 'Catégorie',
              'attr' => ['style' => 'display: block;']
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
