<?php

namespace App\Form\Type;

use App\Filter\MetricFilter;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetricFilterType extends FilterAbstractType
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
            ->add('startMountHours', NumberType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterThanZero(),
                ],
            ])
            ->add('endMountHours', NumberType::class, [
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
            'data_class' => MetricFilter::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ]);
    }
}