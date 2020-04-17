<?php

namespace ReclamationBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('typereclamation', ChoiceType::class, array(
            'choices'  => array(
                "En cours" => true,
                "Female" => false,
            ),
        ))->add('datereclamation')
            ->add('image', FileType::class, array('label' => 'Image(JPG) '))->add('status')->add('email')->add('objet')->add('description')->
        add('idUser',EntityType::class,array(
            'class'=>'AppBundle\Entity\User',
            'choice_label'=>'id'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReclamationBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reclamationbundle_reclamation';
    }


}
