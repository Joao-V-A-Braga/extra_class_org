<?php

namespace App\Form\Type;

use App\Entity\SchoolSubject;
use App\Form\AbstractType;
use App\Repository\SchoolSubjectRepository;
use App\Util\ValidatorFormUtil;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolSubjectType extends AbstractType
{
    public function __construct(private readonly SchoolSubjectRepository $repository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        if (!$options['isSelection'])
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
        else
            $builder
                ->add('id', IntegerType::class, [
                    'required' => false,
                ])
                ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                    $id = $event->getForm()->get('id')->getData();
                    if ($id) {
                        $schoolSubject = $this->repository->find($id);
                        $event->setData($schoolSubject);
                    }
                })
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SchoolSubject::class,
            'allow_extra_fields' => true,
            'check_constraints' => false,
            'csrf_protection' => false,
            'isSelection' => false
        ]);
    }
}