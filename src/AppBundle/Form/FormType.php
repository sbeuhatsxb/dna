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


              ->add('etre', ChoiceType::class, array (
                  'label'=>'Je veux être',
                  'mapped'=>false,
                  'choices'  => array(
                             ' ' => "1",
                             'émerveillé(-e)' => "3",
                             'aventurier(-ière)' => "4",
                             'spectateur(-trice)' => "5",
                             'gourmand(-e)' => "6",
                             'curieux(-se)' => "7",
                             'instruit(-e)' => "8",
                             'genereux(-se)'=>"9",
                             'joueur(-se)' => "10",
                             'chineur(-se)'=>'11',
                             'sportif(-ve)'=>'12',
                             'danseur(-euse)'=>'13',
                             "en relation avec les autres"=>"14",
                         ),
                     ))
                ->add('espace', ChoiceType::class, array(
                    'label'=>"en étant",
                    'mapped'=>false,
                    'choices'=>array(
                            ' ' => ' ',
                            'au chaud' =>'interieur',
                            'au frais' =>'exterieur',
                    ),
                ))
                ->add('ville', EntityType::class, array (
                     'label'=>'à',
                     'mapped'=>false,
                     'class'=>'AppBundle\Entity\Event',
                     'query_builder'=>function(EntityRepository $er){
                       return $er->createQueryBuilder('e')
                       ->orderBy('e.ville', 'ASC');
                     },
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
