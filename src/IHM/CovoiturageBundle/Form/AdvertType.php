<?php

namespace IHM\CovoiturageBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class AdvertType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('title',     TextType::class, array('label' => 'Titre',))
          ->add('content',   TextareaType::class)
          ->add('villeDepart', EntityType::class, array('class' => 'IHMCovoiturageBundle:VilleDepart', 'choice_label' => 'name'))
          ->add('villeArrivee', EntityType::class, array('class' => 'IHMCovoiturageBundle:VilleArrivee', 'choice_label' => 'name'))
          ->add('dateDepart',    DateType::class)
          ->add('heureDepart',    TimeType::class)
          ->add('prixTrajet',    TextType::class)
          ->add('nbPlaces',    TextType::class)
          ->add('fumeur', CheckboxType::class, array('label' => 'Le véhicule est-il fumeur ?', 'required' => false,))
          ->add('published', CheckboxType::class, array('label' => 'Souhaitez-vous publier cette annonce directement ?', 'required' => false,))
          ->add('save',      SubmitType::class, array('label' => 'Sauvegarder'))
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
