<?php

namespace Eticom\GasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Eticom\GasBundle\Entity\cliente;
use Eticom\GasBundle\Entity\ventas;
use Eticom\GasBundle\Entity\productos;
use Eticom\GasBundle\Entity\usuarios;
use Eticom\GasBundle\Form\ClienteType;
use Eticom\GasBundle\Form\VentaType;
use Eticom\GasBundle\Form\ActualizarVentaType;
use Eticom\GasBundle\Form\UsuarioType;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function inicioAction()
    {
    	$peticion = $this->getRequest();
    	$formulario = $this->createFormBuilder()
    	              ->add('telefono','text')    	                  	              
    	              ->getForm();
    	$formulario->handleRequest($peticion);
    	if ($formulario->isValid())
    	{
    		$telefono = $formulario->getData();
    		$em = $this->getDoctrine()->getManager();
    		$query = $em->createQuery(
    				'select c from EticomGasBundle:cliente c
                where c.celular = :telefono'
    		)->setParameter('telefono',$telefono['telefono']);
    		$clienteform = $query->getResult();
    		if ($clienteform)
    		{
    			foreach ($clienteform as $atributo)
                {
    				$id = $atributo->getIdCliente();
                }
                $this->get('session')->getFlashBag()->add('Aviso','Cliente registrado');
    			return $this->redirect($this->generateUrl('eticom_gas_venta',array('cliente'=>$id)));
    		}
    		else
    		{
    			return $this->redirect($this->generateUrl('eticom_gas_nuevocliente'));
    		}
    	}
    	
        return $this->render('EticomGasBundle:Default:inicio.html.twig',array('formulario'=>$formulario->createView()));
    }
    public function loginAction()
    {
    	$peticion = $this->getRequest();
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,$sesion->get(SecurityContext::AUTHENTICATION_ERROR));
        
        return $this->render('EticomGasBundle:Default:login.html.twig',array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error));
    }
    public function ventaAction($cliente)
    {
    	$peticion = $this->getRequest();
        $venta = new ventas();        
        $em = $this->getDoctrine()->getManager();
        $mcliente = $em->getRepository('EticomGasBundle:cliente')->find($cliente);
        $todosprod = $em->getRepository('EticomGasBundle:productos')->findAll();
        $venta->setFecha(new \DateTime("now"));
        $venta->setMonto(40);        
        $formulario = $this->createForm(new VentaType(),$venta);
        $formulario->handleRequest($peticion);  
        
        if($formulario->isValid())
        {
            $usuario = $this->get('security.context')->getToken()->getUser();
            $formcant = $formulario->get('cantidad')->getData();
            $tipoGas = $formulario->get('productos')->getData();
            $prestabalon = $formulario->get('prestamoBalon')->getData();
            $objcliente = $em->getRepository('EticomGasBundle:cliente')->find($cliente);
            $sucursal = $em->getRepository('EticomGasBundle:sucursal')->find(1);            
            //Actualiza la entidad productos
            $producto = $em->getRepository('EticomGasBundle:productos')->find($tipoGas);
            if (!$prestabalon)
            {
                $BalonVacio = $producto->getBalonVacio() + $formcant;
                $producto->setBalonVacio($BalonVacio);                
            }            
            $BalonLleno = $producto->getBalonLleno() - $formcant;
            $producto->setBalonLleno($BalonLleno);

            $venta->setCliente($objcliente);
            $venta->setSucursal($sucursal);
            $venta->setProductos($producto);
            $venta->setUsuarios($usuario);

            $em->persist($venta);
            $em->flush();
            
            return $this->forward('EticomGasBundle:Default:ticket',array('cliente'=>$objcliente,'venta'=>$venta));
        }
        return $this->render('EticomGasBundle:Default:venta.html.twig',array('form'=>$formulario->createView(),'cliente'=>$mcliente,'producto'=>$todosprod));
    }
    public function nuevocAction()
    {
    	$peticion = $this->getRequest();
        $cliente = new cliente();
        $form = $this->createForm(new ClienteType(),$cliente);
        $form->handleRequest($peticion);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('info','Te has registrado correctamente :)');

            return $this->redirect($this->generateUrl('eticom_gas_venta',array('cliente'=>$cliente->getIdCliente())));
        }
        return $this->render('EticomGasBundle:Default:nuevocliente.html.twig',array('form'=>$form->createView()));
    }
    
    public function verclienteAction($idcliente)
    {
        $em = $this->getDoctrine()->getManager();
        $venta = $em->getRepository('EticomGasBundle:cliente')->findCliente($idcliente);
        $cliente = $em->getRepository('EticomGasBundle:cliente')->find($idcliente);
        return $this->render('EticomGasBundle:Default:vercliente.html.twig',array('venta'=>$venta,'cliente'=>$cliente));
    }
    
    public function deudaclienteAction()
    {
        $em = $this->getDoctrine()->getManager();        
        $balon = $em->getRepository('EticomGasBundle:ventas')->findDebeBalon();        
        $prestamo = $em->getRepository('EticomGasBundle:ventas')->findDebePlata();
        return $this->render('EticomGasBundle:Default:deudacliente.html.twig',array('balon'=>$balon,'prestamo'=>$prestamo));
    }
    public function todosclienteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('EticomGasBundle:cliente')->findAll();

        return $this->render('EticomGasBundle:Default:todoscliente.html.twig',array('clientes'=>$clientes));
    }
    public function actualizarventaAction($idventa)
    {
        $em = $this->getDoctrine()->getManager();
        $venta = $em->getRepository('EticomGasBundle:ventas')->find($idventa);
        $formulario = $this->createForm(new ActualizarVentaType(),$venta);
        $peticion = $this->getRequest();
        $formulario->handleRequest($peticion);
        if ($formulario->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $tipoGas = $formulario->get('productos')->getData();
            $cantidad = $formulario->get('cantidad')->getData();
            $producto = $em->getRepository('EticomGasBundle:productos')->find($tipoGas);
            $presbalon = $formulario->get('prestamoBalon')->getData();
            if (!$presbalon)
            {
                $balon = $producto->getBalonVacio()+$cantidad;
                $producto->setBalonVacio($balon);
                $venta->setProductos($producto);
            }
            
            $em->persist($venta);
            $em->flush();
            return $this->redirect($this->generateUrl('eticom_gas_todoscliente'));
        }
        return $this->render('EticomGasBundle:Default:actualizarventa.html.twig',array('formulario'=>$formulario->createView(),'venta'=>$venta));
    }

    public function reporteventasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $formulario = $this->createFormBuilder()        
                      ->add('fechainicio','date',array('label'=>'Inicio'))
                      ->add('fechafinal','date',array('label'=>'Fin'))
                      ->add('todos','radio',array('required'=>false))
                      ->add('producto','entity',array('class'=>'EticomGasBundle:productos'))
                      ->getForm();
        $peticion = $this->getRequest();
        $formulario->handleRequest($peticion);
        if($formulario->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $estado = $formulario->get('todos')->getData();
            $finicio = $formulario->get('fechainicio')->getData();
            $ffinal = $formulario->get('fechafinal')->getData();
            $producto = $formulario->get('producto')->getData();
            if ($estado) 
            {
                $ventas = $em->getRepository('EticomGasBundle:ventas')->findVentas($finicio,$ffinal);                
            }else{
                $ventas = $em->getRepository('EticomGasBundle:ventas')->findVentaXprod($finicio,$ffinal,$producto);
            }

            return $this->render('EticomGasBundle:Default:reporte.html.twig',array('ventas'=>$ventas));
        }

        return $this->render('EticomGasBundle:Default:formreporte.html.twig',array('form'=>$formulario->createView()));

    }

    /**
    * @Pdf()
    */
    public function ticketAction($cliente,$venta)
    {
        return $this->render(sprintf('EticomGasBundle:Default:ticket.pdf.twig'),array('cliente'=>$cliente,'venta'=>$venta));
    }
}
