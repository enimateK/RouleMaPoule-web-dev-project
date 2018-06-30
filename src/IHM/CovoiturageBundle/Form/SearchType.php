<?php

namespace IHM\CovoiturageBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('villeDepart', EntityType::class, array('class' => 'IHMCovoiturageBundle:VilleDepart', 'choice_label' => 'name'))
          ->add('villeArrivee', EntityType::class, array('class' => 'IHMCovoiturageBundle:VilleArrivee', 'choice_label' => 'name'))
          ->add('search',      SubmitType::class, array('label' => 'Rechercher'))
    ;
    }
     /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IHM\CovoiturageBundle\Entity\Advert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ihm_covoituragebundle_advert';
    }
}