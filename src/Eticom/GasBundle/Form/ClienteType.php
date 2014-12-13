<?php
namespace Eticom\GasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		    ->add('apellido')
		    ->add('nombre')
		    ->add('celular')
		    ->add('direccion');	    
	}
	public function getName()
	{
		return 'cliente';
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array('data_class'=>'Eticom\GasBundle\Entity\cliente'));
	}
}