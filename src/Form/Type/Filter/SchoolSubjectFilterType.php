<?php

namespace App\Form\Type\Filter;

use App\Filter\SchoolSubjectFilter;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolSubjectFilterType extends FilterAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('startClasses', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterThanZero(),
                ],
            ])
            ->add('endClasses', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterThanZero(),
                ],
            ])
            ->add('name', TextType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SchoolSubjectFilter::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ]);
    }
}