<?php

namespace App\Form;

use App\Entity\Aloite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AloiteFormType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('Aihe', TextType::class, ['label' => 'Aihe'])
            ->add('Kuvaus', TextType::class, ['label' => 'Kuvaus'])
            ->add('Kirjauspaiva',DateType::class, ['label' => 'Kirjauspaiva'])
            ->add('Nimi', TextType::class, ['label' => 'Nimi'])
            ->add('Sahkoposti', TextType::class, ['label' => 'Sahkoposti'])
            ->add('save', SubmitType::class, [
                'label' => 'Talleta',
                'attr' => ['class' => 'btn btn-info']
            ]);

    }
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data-class' => Aloite::class,
        ]);

           
    
    }
    

}

?>