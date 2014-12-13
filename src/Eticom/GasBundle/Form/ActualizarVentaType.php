<?php
namespace Eticom\GasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ActualizarVentaType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		    ->add('productos','entity',array('class'=>'EticomGasBundle:productos','read_only'=> true))
		    ->add('monto','number',array('label'=>'Precio','read_only'=> true))
            ->add('cantidad','integer',array('read_only'=> true))
            ->add('creditos', 'checkbox',array('label'=>'Credito','required'=>false))
            ->add('prestamoBalon','checkbox',array('label'=>'Prestamo de Balon','required'=>false));
	}
	public function getName()
	{
		return "actualizar_ventas";
	}
}