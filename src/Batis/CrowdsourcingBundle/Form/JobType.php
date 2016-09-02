<?php

namespace Batis\CrowdsourcingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Batis\UserBundle\Form\UserType;
use Batis\CrowdsourcingBundle\Form\ImageType;
use Batis\CrowdsourcingBundle\Form\CategoryType;


class JobType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title' , TextType::class,   array('required' => false))
            ->add('overview', TextareaType::class,   array('required' => false))
            ->add('category', EntityType::class, array(
                'class'     => 'BatisCrowdsourcingBundle:Category',
                'choice_label' => 'name',
                'multiple' => false,
                ))
            ->add('nombre_contributeur', IntegerType::class,   array('required' => false))
            ->add('expiresAt', DateType::class,   array('required' => false))
            ->add('image', ImageType::class,   array('required' => false))
            ->add('budget_min', IntegerType::class,   array('required' => false))
            ->add('budget_max', IntegerType::class,   array('required' => false))
            ->add('location', TextType::class,   array('required' => false))          
            ->add('skills', CollectionType::class,   array(
                'required' => false,
                'entry_type' => SkillType::class,
                'allow_add'  => true,
                'allow_delete' => true
                ))
            //->add('category',   array('required' => false))
            ->add('save', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Batis\CrowdsourcingBundle\Entity\Job'
        ));
    }
}
