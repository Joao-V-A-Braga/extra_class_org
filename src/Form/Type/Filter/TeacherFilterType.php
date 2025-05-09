<?php

namespace App\Form\Type\Filter;

use App\Filter\TeacherFilter;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherFilterType extends FilterAbstractType
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
            ->add('startPendingExtraClasses', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterThanZero(),
                ],
            ])
            ->add('endPendingExtraClasses', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterThanZero(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TeacherFilter::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ]);
    }
}