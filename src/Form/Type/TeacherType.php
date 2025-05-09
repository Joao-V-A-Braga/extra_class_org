<?php

namespace App\Form\Type;

use App\Entity\Teacher;
use App\Form\AbstractType;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('email', EmailType::class, [
                'required' => false,
                'mapped' => false,
            ])
            ->add('firstName', TextType::class, [
                'required' => true
            ])
            ->add('lastName', TextType::class, [
                'required' => true
            ])
            ->add('classes', IntegerType::class, [
                'required' => true,
                'constraints' => [
                    ValidatorFormUtil::greaterOrEqualThanZero(),
                ],
            ])
            ->add('pendingExtraClasses', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    ValidatorFormUtil::greaterOrEqualThanZero(),
                ]
            ])
            ->add('schoolSubjects', CollectionType::class, [
                'entry_type' => SchoolSubjectType::class,
                'required' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'entry_options' => ['isSelection' => true]
            ])
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                $inputEmail = $event->getForm()->get('email')->getData();
                if ($inputEmail) {
                    /** @var Teacher $teacher */
                    $teacher = $event->getData();
                    $teacher->getUser()->setEmail($inputEmail);
                }
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
            'allow_extra_fields' => true,
            'check_constraints' => false,
            'csrf_protection' => false,
        ]);
    }
}