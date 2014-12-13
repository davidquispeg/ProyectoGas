<?php

namespace Eticom\GasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		    ->add('nombre')
		    ->add('precio','money')
		    ->add('proveedor','entity',array('class'=>'EticomGasBundle:proveedor'))		    
		    ->add('balonVacio','integer',array('label'=>'Balones vacios'))
		    ->add('balonLleno','integer',array('label'=>'Balones llenos'))
		    ->add('total','integer',array('label'=>'Total'));
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array('data_class'=>'Eticom\GasBundle\Entity\productos'));
	}
	public function getName()
	{
		return 'productos';
	}
}