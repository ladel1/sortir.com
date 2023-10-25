<?php

namespace App\Form;

use App\Class\Filter;
use App\Entity\Site;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as TypeDateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',SearchType::class,["label"=>"Le nom de la sortie contient",'required' => false])
            ->add('site',EntityType::class,[
                'class'=>Site::class,
                'choice_label'=> 'nom'
            ])
            ->add('iOrganize',CheckboxType::class ,["label"=>"Sorties dont je suis l'organisateur/trice",'required' => false])
            ->add('imIn',CheckboxType::class,["label"=>"Sorties auxquelles je suis inscrit/e",'required' => false])
            ->add('imNotIn',CheckboxType::class,["label"=>"Sorties auxquelles je suis pas inscrit/e",'required' => false])
            ->add('passedSortie',CheckboxType::class,["label"=>"Sorties passées",'required' => false])
            ->add('startDate',TypeDateTimeType::class,["label"=>"Entre",'widget' => 'single_text','required' => false])
            ->add('endDate',TypeDateTimeType::class,["label"=>"et",'widget' => 'single_text','required' => false])
            ->add('search',SubmitType::class,["label"=>"Rechercher"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filter::class,
            'method'=>'GET'
        ]);
    }
}
