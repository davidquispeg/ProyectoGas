<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="sucursal")
*/
class sucursal
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\Column(type="string", length=40)
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="string", length=255)
	*/
	protected $direccion;

	/**
	* @ORM\Column(type="string", length=255)
	*/
	protected $razonSocial;

	/**
	* @ORM\Column(type="string", length=15)
	*/
	protected $ruc;

	/**
	* @ORM\Column(type="string", length=30)
	*/
	protected $serieImpresora;

	/**
	* @ORM\Column(type="string", length=40)
	*/
	protected $nroTicket;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="ventas", mappedBy="sucursal")
	 */
	protected $ventas;
	public function __construct()
	{
		$this->ventas = new ArrayCollection();
	}

    /**
     * Get id_sucursal
     *
     * @return integer 
     */
    public function getIdSucursal()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return sucursal
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return sucursal
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set razon_social
     *
     * @param string $razonSocial
     * @return sucursal
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razon_social
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set ruc
     *
     * @param string $ruc
     * @return sucursal
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;

        return $this;
    }

    /**
     * Get ruc
     *
     * @return string 
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set serie_impresora
     *
     * @param string $serieImpresora
     * @return sucursal
     */
    public function setSerieImpresora($serieImpresora)
    {
        $this->serieImpresora = $serieImpresora;

        return $this;
    }

    /**
     * Get serie_impresora
     *
     * @return string 
     */
    public function getSerieImpresora()
    {
        return $this->serieImpresora;
    }

    /**
     * Set nro_ticket
     *
     * @param string $nroTicket
     * @return sucursal
     */
    public function setNroTicket($nroTicket)
    {
        $this->nroTicket = $nroTicket;

        return $this;
    }

    /**
     * Get nro_ticket
     *
     * @return string 
     */
    public function getNroTicket()
    {
        return $this->nroTicket;
    }

    /**
     * Add ventas
     *
     * @param \Eticom\GasBundle\Entity\ventas $ventas
     * @return sucursal
     */
    public function addVenta(\Eticom\GasBundle\Entity\ventas $ventas)
    {
        $this->ventas[] = $ventas;

        return $this;
    }

    /**
     * Remove ventas
     *
     * @param \Eticom\GasBundle\Entity\ventas $ventas
     */
    public function removeVenta(\Eticom\GasBundle\Entity\ventas $ventas)
    {
        $this->ventas->removeElement($ventas);
    }

    /**
     * Get ventas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVentas()
    {
        return $this->ventas;
    }
}
