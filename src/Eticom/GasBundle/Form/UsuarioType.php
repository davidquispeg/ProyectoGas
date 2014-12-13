<?php
namespace Eticom\GasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		    ->add('nombre')
		    ->add('apellido')
		    ->add('usuario')
		    ->add('password','repeated',array('type'=>'password','invalid_message'=>'Las dos contraseñas deben coincidir',
		    	'first_options'=>array('label'=>'Contraseña'),'second_options'=>array('label'=>'Repite Contraseña')))
		    ->add('rol','choice',array('choices'=>array('ROLE_USUARIO'=>'Usuario','ROLE_ADMIN'=>'Administrador'),
		    	'required'=>true));
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array('data_class'=>'Eticom\GasBundle\Entity\usuarios'));
	}
	public function getName()
	{
		return 'eticom_gasbundle_usuariotype';
	}
}