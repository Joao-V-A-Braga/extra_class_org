<?php

namespace App\Form\Type;

use App\Entity\Metric;
use App\Form\AbstractType;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetricType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('classes', IntegerType::class, [
                'required' => true,
                'constraints' => [
                    ValidatorFormUtil::greaterOrEqualThanZero(),
                ],
            ])
            ->add('monthHours', NumberType::class, [
                'required' => true,
                'constraints' => [
                    ValidatorFormUtil::greaterOrEqualThanZero(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Metric::class,
            'allow_extra_fields' => true,
            'check_constraints' => false,
            'csrf_protection' => false,
        ]);
    }
}