<?php

namespace Eticom\GasBundle\Entity;
use Doctrine\ORM\EntityRepository;

class VentaRepository extends EntityRepository
{
	public function findDebeBalon()
	{
		$em = $this->getEntityManager();
		$dql = 'SELECT v,c FROM EticomGasBundle:ventas v JOIN v.cliente c
		WHERE v.prestamoBalon = True ORDER BY v.cliente ASC';
		$consulta = $em->createQuery($dql);

		return $consulta->getResult();
	}
	public function findDebePlata()
	{
		$em = $this->getEntityManager();
		$dql = 'SELECT v,c FROM EticomGasBundle:ventas v JOIN v.cliente c
		WHERE v.creditos = True ORDER BY v.cliente ASC';
		$consulta = $em->createQuery($dql);

		return $consulta->getResult();
	}
	public function findVentas($finicio,$ffinal)
	{
		$em = $this->getEntityManager();
		$dql = 'SELECT v FROM EticomGasBundle:ventas v JOIN v.cliente c JOIN v.productos p
		WHERE v.fecha >= :inicio AND v.fecha <= :final ORDER BY v.fecha DESC';
		$consulta = $em->createQuery($dql);
		$consulta->setParameter('inicio',$finicio);
		$consulta->setParameter('final',$ffinal);

		return $consulta->getResult();
	}
	public function findVentaXprod($finicio,$ffinal,$producto)
	{
		$em = $this->getEntityManager();
		$dql = 'SELECT v FROM EticomGasBundle:ventas v JOIN v.cliente c JOIN v.productos p
		WHERE v.fecha >= :inicio AND v.fecha <= :final AND p.id = :prod ORDER BY v.fecha DESC';
		$consulta = $em->createQuery($dql);
		$consulta->setParameter('inicio',$finicio);
		$consulta->setParameter('final',$ffinal);
		$consulta->setParameter('prod',$producto);

		return $consulta->getResult();

	}
}