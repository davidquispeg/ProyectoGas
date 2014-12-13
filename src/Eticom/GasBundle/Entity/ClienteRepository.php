<?php

namespace Eticom\GasBundle\Entity;
use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository
{
	public function findCliente($idcliente)
	{
		$em = $this->getEntityManager();
		$dql = 'SELECT v, c FROM EticomGasBundle:ventas v JOIN v.cliente c 
		WHERE v.cliente = :id AND c.id = :id';
		$consulta = $em->createQuery($dql);
		$consulta->setParameter('id',$idcliente);		

		return $consulta->getResult();
	}
}
