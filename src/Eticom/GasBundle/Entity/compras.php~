<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="compras")
*/
class compras
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id_compras;

	/**
	* @ORM\Column(type="date")	
	*/
	protected $fecha;

	/**
	* @ORM\Column(type="string", length=50)
	*/
	protected $nro_guia;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $cantidad;

	/**
	* @ORM\Column(type="string", length=255)
	*/
	protected $observacion;

	//Creando las relaciones//

	/**
	 * @ORM\ManyToOne(targetEntity="productos", inversedBy="compras")
	 * @ORM\JoinColumn(name="id_productos", referencedColumnName="id_productos")
	 */
	protected $productos;

    /**
     * Get id_compras
     *
     * @return integer 
     */
    public function getIdCompras()
    {
        return $this->id_compras;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return compras
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set nro_guia
     *
     * @param string $nroGuia
     * @return compras
     */
    public function setNroGuia($nroGuia)
    {
        $this->nro_guia = $nroGuia;

        return $this;
    }

    /**
     * Get nro_guia
     *
     * @return string 
     */
    public function getNroGuia()
    {
        return $this->nro_guia;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return compras
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return compras
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set productos
     *
     * @param \Eticom\GasBundle\Entity\productos $productos
     * @return compras
     */
    public function setProductos(\Eticom\GasBundle\Entity\productos $productos = null)
    {
        $this->productos = $productos;

        return $this;
    }

    /**
     * Get productos
     *
     * @return \Eticom\GasBundle\Entity\productos 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
