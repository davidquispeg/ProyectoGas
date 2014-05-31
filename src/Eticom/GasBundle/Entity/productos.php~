<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="productos")
*/
class productos
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id_productos;

	/**
	* @ORM\Column(type="string", length=50)	
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="float")
	*/
	protected $precio;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $cantidad;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="detalle_boleta", mappedBy="productos")
	 */
	protected $detalle_boleta;
	

	/**
	 * @ORM\OneToMany(targetEntity="ventas", mappedBy="productos")
	 */
	protected $ventas;
	
	/**
	 * @ORM\OneToMany(targetEntity="compras", mappedBy="productos")
	 */
	protected $compras;
	public function __construct()
	{
		$this->compras = new ArrayCollection();
		$this->detalle_boleta = new ArrayCollection();
		$this->ventas = new ArrayCollection();
	}

	//Relacion Muchos a Uno//
	/**
	 * @ORM\ManyToOne(targetEntity="proveedor", inversedBy="productos")
	 * @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id_proveedor")
	*/
	protected $proveedor;


    /**
     * Get id_productos
     *
     * @return integer 
     */
    public function getIdProductos()
    {
        return $this->id_productos;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return productos
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
     * Set precio
     *
     * @param float $precio
     * @return productos
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return productos
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
     * Add detalle_boleta
     *
     * @param \Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta
     * @return productos
     */
    public function addDetalleBoletum(\Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta)
    {
        $this->detalle_boleta[] = $detalleBoleta;

        return $this;
    }

    /**
     * Remove detalle_boleta
     *
     * @param \Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta
     */
    public function removeDetalleBoletum(\Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta)
    {
        $this->detalle_boleta->removeElement($detalleBoleta);
    }

    /**
     * Get detalle_boleta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalleBoleta()
    {
        return $this->detalle_boleta;
    }

    /**
     * Add ventas
     *
     * @param \Eticom\GasBundle\Entity\ventas $ventas
     * @return productos
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

    /**
     * Add compras
     *
     * @param \Eticom\GasBundle\Entity\compras $compras
     * @return productos
     */
    public function addCompra(\Eticom\GasBundle\Entity\compras $compras)
    {
        $this->compras[] = $compras;

        return $this;
    }

    /**
     * Remove compras
     *
     * @param \Eticom\GasBundle\Entity\compras $compras
     */
    public function removeCompra(\Eticom\GasBundle\Entity\compras $compras)
    {
        $this->compras->removeElement($compras);
    }

    /**
     * Get compras
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompras()
    {
        return $this->compras;
    }

    /**
     * Set proveedor
     *
     * @param \Eticom\GasBundle\Entity\proveedor $proveedor
     * @return productos
     */
    public function setProveedor(\Eticom\GasBundle\Entity\proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \Eticom\GasBundle\Entity\proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }
}
