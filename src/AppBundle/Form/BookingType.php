<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use AppBundle\Entity\Booking;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Repository\BookingRepository;

class BookingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('dogs', EntityType::class, [
                'class'=>Booking::class,
                'placeholder'=>'Select a Dog',
                'query_builder' => function (BookingRepository $repo) {
                return $repo->dogByUserQuery();
                }

                ])
            ->add('services')
            ->add('bookingDate', HiddenType::Class , array('data' => 'ciao' ))
            ->add('bookingTime',  DateTimeType::class , array(
            'placeholder' => array(
            'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
            'hour' => 'Hour', 'minute' => 'Minute'
            )))

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
