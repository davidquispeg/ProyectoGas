<?php
namespace Eticom\GasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Eticom\GasBundle\Form\ProductoType;
use Eticom\GasBundle\Entity\productos;
use Eticom\GasBundle\Entity\usuarios;
use Eticom\GasBundle\Form\UsuarioType;

class AdministracionController extends Controller
{
	public function principalAction()
	{
		$peticion = $this->getRequest();
		return $this->render('EticomGasBundle:Administracion:principal.html.twig');
	}
	public function productoNuevoAction()
	{
		$peticion = $this->getRequest();
		$producto = new productos();
		$formulario = $this->createForm(new ProductoType(),$producto);
		$formulario->handleRequest($peticion);

		if($formulario->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($producto);
			$em->flush();

			return $this->redirect($this->generateUrl('administracion_producto_stock'));
		}
		return $this->render('EticomGasBundle:Administracion:prodnuevo.html.twig',array('formulario'=>$formulario->createView()));
	}
	public function productoActualizarAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$producto = $em->getRepository('EticomGasBundle:productos')->find($id);
		$peticion = $this->getRequest();
		$formulario = $this->createForm(new ProductoType(), $producto);
		$formulario->handleRequest($peticion);

		if ($formulario->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$idprove = $formulario->get('proveedor')->getData();
			$proveedor = $em->getRepository('EticomGasBundle:proveedor')->find($idprove);
			$producto->setProveedor($proveedor);
			$em->persist($producto);
			$em->flush();

			return $this->redirect($this->generateUrl('administracion_producto_stock'));
		}
		return $this->render('EticomGasBundle:Administracion:prodeditar.html.twig',array('formulario'=>$formulario->createView(),'producto'=>$producto));
	}
	public function stockAction()
	{
		$em = $this->getDoctrine()->getManager();
		$productos = $em->getRepository('EticomGasBundle:productos')->findAll();

		return $this->render('EticomGasBundle:Administracion:stock.html.twig',array('productos'=>$productos));
	}

    public function registroAction()
    {
        $peticion = $this->getRequest();
        $usuario = new usuarios();
        $formulario = $this->createForm(new UsuarioType(), $usuario);

        $formulario->handleRequest($peticion);
        if($formulario->isValid())
        {
            $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $usuario->setSalt(md5(time()));
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(),$usuario->getSalt());
            $usuario->setPassword($passwordCodificado);

            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirect($this->generateUrl('eticom_gas_inicio'));
        }

        return $this->render('EticomGasBundle:Default:registro.html.twig',array('formulario'=>$formulario->createView()));
    }

	public function usuariosAction()
	{
		$em = $this->getDoctrine()->getManager();
		$usuarios = $em->getRepository('EticomGasBundle:usuarios')->findAll();

		return $this->render('EticomGasBundle:Administracion:usuarios.html.twig',array('usuarios'=>$usuarios));
	}
	public function eliminaUsuarioAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('EticomGasBundle:usuarios')->find($id);
		$em->remove($usuario);
		$em->flush();

		return $this->redirect($this->generateUrl('administracion_usuarios'));
	}
}