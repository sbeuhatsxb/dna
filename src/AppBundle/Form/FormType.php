<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class FormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //Creation labels
    //     ->add('etre', EntityType::class, array(
    //   'class'=>'AppBundle\Entity\Etre',
    //   'choice_label'=>'getLabel',
    //     ))

                ->add('etre', EntityType::class, array (
                          'label'=>'Je veux être',
                          'mapped'=>false,
                          'class'=>'AppBundle\Entity\Etre',
                     ))
                ->add('espace', EntityType::class, array (
                           'label'=>'en étant',
                           'mapped'=>false,
                           'class'=>'AppBundle\Entity\Espace',
                    ))
                ->add('ville', EntityType::class, array (
                     'label'=>'à',
                     'mapped'=>false,
                     'class'=>'AppBundle\Entity\Ville',
                ))
                ->add('save', SubmitType::class, array(
                    'label' => "Go !",
                    'attr' => array(
                        'class' => 'btn btn-info'),
));
      }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_etre';
    }


}



 ?>
