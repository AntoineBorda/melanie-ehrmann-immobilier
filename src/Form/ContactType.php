<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'block mb-2 text-sm font-medium text-default-900 dark:text-default-50',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                ],
                'attr' => [
                    'placeholder' => 'Michael',
                    'class' => 'block w-full p-3 text-sm border rounded-lg text-default-900 border-default-300 bg-default-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-default-700 dark:border-default-600 dark:placeholder-default-400 dark:text-default-50 dark:focus:ring-primary-500 dark:focus:border-primary-500',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'block mb-2 text-sm font-medium text-default-900 dark:text-default-50',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                ],
                'attr' => [
                    'placeholder' => 'Scott',
                    'class' => 'block w-full p-3 text-sm border rounded-lg text-default-900 border-default-300 bg-default-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-default-700 dark:border-default-600 dark:placeholder-default-400 dark:text-default-50 dark:focus:ring-primary-500 dark:focus:border-primary-500',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'block mb-2 text-sm font-medium text-default-900 dark:text-default-50',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                ],
                'attr' => [
                    'placeholder' => 'nom@domaine.fr',
                    'class' => 'block w-full p-3 text-sm border rounded-lg text-default-900 border-default-300 bg-default-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-default-700 dark:border-default-600 dark:placeholder-default-400 dark:text-default-50 dark:focus:ring-primary-500 dark:focus:border-primary-500',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'block mb-2 text-sm font-medium text-default-900 dark:text-default-50',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                    new Assert\Length(min: 10),
                ],
                'attr' => [
                    'placeholder' => '07 12 34 56 78',
                    'class' => 'block w-full p-3 text-sm border rounded-lg text-default-900 border-default-300 bg-default-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-default-700 dark:border-default-600 dark:placeholder-default-400 dark:text-default-50 dark:focus:ring-primary-500 dark:focus:border-primary-500',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'block mb-2 text-sm font-medium text-default-900 dark:text-default-50',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                ],
                'attr' => [
                    'class' => 'block w-full p-3 text-sm border rounded-lg text-default-900 border-default-300 bg-default-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-default-700 dark:border-default-600 dark:placeholder-default-400 dark:text-default-50 dark:focus:ring-primary-500 dark:focus:border-primary-500',
                    'rows' => 6,
                ],
            ])
        ;
    }
}
