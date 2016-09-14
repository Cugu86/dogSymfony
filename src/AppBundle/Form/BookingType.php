<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;

class BookingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bookingDate', DateType::class, array(
                    'placeholder' => 'Select a value',
                    'widget' => 'single_text',
                    //'html5' => false,
                    //'attr' => ['class' => 'js-datepicker']
                    // do not render as type="date", to avoid HTML5 date pickers
                    //'html5' => false
                    ))
            ->add('bookingTime', TimeType::Class,array(
                    'placeholder' => 'Select a value',
                    'input'  => 'datetime',
                    'widget' => 'choice',
                    'hours' => array( 9 ,10,11,12,13,14,15,16,17,18),
                    'minutes'=>array( 15,30,45)
                    //'html5' => true
                    // do not render as type="date", to avoid HTML5 date pickers
                    //'html5' => false,

                    )) 
        
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Booking'
        ));
    }
}
