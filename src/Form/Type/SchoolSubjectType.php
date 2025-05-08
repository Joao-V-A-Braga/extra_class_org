<?php

namespace App\Form\Type;

use App\Entity\SchoolSubject;
use App\Form\AbstractType;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolSubjectType extends AbstractType
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
            ->add('name', TextType::class, [
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SchoolSubject::class,
            'allow_extra_fields' => true,
            'check_constraints' => false,
            'csrf_protection' => false,
        ]);
    }
}