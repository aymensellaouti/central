<?php

namespace central\FirstBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class,array(
            'required'=>true
        ))
                ->add('prenom',TextType::class)
                ->add('path',TextType::class)
                ->add('section',EntityType::class,
                    array(
                        'class'=>'central\FirstBundle\Entity\Section',
                        'choice_label'=>'designation',
                        'expanded'=>false,
                        'multiple'=>false
                    )
                    )
                ->add('cin',EntityType::class,
                    array(
                        'class'=>'central\FirstBundle\Entity\Cin',
                        'choice_label'=>'numero',
                        'expanded'=>false,
                        'multiple'=>false
                    ))
                ->add('matieres',EntityType::class,
                    array(
                        'class'=>'central\FirstBundle\Entity\Matiere',
                        'choice_label'=>'designation',
                        'expanded'=>true,
                        'multiple'=>true
                    ))
                ->add('Envoyer',SubmitType::class)
        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'central\FirstBundle\Entity\Etudiant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'central_firstbundle_etudiant';
    }


}
