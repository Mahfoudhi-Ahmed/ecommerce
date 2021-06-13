<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productName')
            ->add('productPhoto', FileType::class , [
                'label' => 'product photo',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false, ]

            )
            ->add('productQte')
            ->add('productDiscount')
            ->add('productPrice')
            ->add('productDescription')
            ->add('category')
            ->add('Add', SubmitType::class, [
                'attr' => ['label' => 'Add Product']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}