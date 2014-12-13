<?php
namespace Eticom\GasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class VentaType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		    ->add('productos','entity',array('class'=>'EticomGasBundle:productos'))
		    ->add('nroTicket','text',array('label'=>'N° Ticket'))
		    ->add('monto','number',array('label'=>'Precio','disabled'=>'false'))
            ->add('cantidad','integer')
            ->add('creditos', 'checkbox',array('label'=>'Credito','required'=>false))
            ->add('prestamoBalon','checkbox',array('label'=>'Prestamo de Balon','required'=>false));
	}
	public function getName()
	{
		return "ventas";
	}
}