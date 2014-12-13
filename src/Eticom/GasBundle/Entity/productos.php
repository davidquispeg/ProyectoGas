<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
	protected $id;

	/**
	* @ORM\Column(type="string", length=50)
    * @Assert\NotBlank(message="Debes introducir un texto.")
    * 
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="float")
    * @Assert\NotBlank(message="Debes introducir un valor.")
    * @Assert\Range(min=0, minMessage="Introduce valores positivos.")
	*/
	protected $precio;

	/**
	* @ORM\Column(type="integer")
    * @Assert\NotBlank(message="Debes introducir un valor.")
    * @Assert\Range(min=0, minMessage="Introduce valores positivos.")
	*/
	protected $total;

    /**
    * @ORM\Column(type="integer")
    * @Assert\NotBlank(message="Debes introducir un valor.")
    * @Assert\Range(min=0, minMessage="Introduce valores positivos.")
    */
    protected $balonVacio;

    /**
    * @ORM\Column(type="integer")
    * @Assert\NotBlank(message="Debes introducir un valor.")
    * @Assert\Range(min=0, minMessage="Introduce valores positivos.")
    */
    protected $balonLleno;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="DetalleBoleta", mappedBy="productos")
	 */
	protected $detalleBoleta;
	

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
		$this->detalleBoleta = new ArrayCollection();
		$this->ventas = new ArrayCollection();
	}

	//Relacion Muchos a Uno//
	/**
	 * @ORM\ManyToOne(targetEntity="proveedor", inversedBy="productos")
	 * @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
	*/
	protected $proveedor;


    /**
     * Get id_productos
     *
     * @return integer 
     */
    public function getIdProductos()
    {
        return $this->id;
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
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    public function getBalonVacio()
    {
        return $this->balonVacio;
    }

    public function setBalonVacio($balonVacio)
    {
        $this->balonVacio = $balonVacio;
        return $this;
    }

    public function getBalonLleno()
    {
        return $this->balonLleno;
    }

    public function setBalonLleno($balonLleno)
    {
        $this->balonLleno = $balonLleno;
        return $this;
    }

    /**
     * Add detalle_boleta
     *
     * @param \Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta
     * @return productos
     */
    public function addDetalleBoletum(\Eticom\GasBundle\Entity\DetalleBoleta $detalleBoleta)
    {
        $this->detalleBoleta[] = $detalleBoleta;

        return $this;
    }

    /**
     * Remove detalle_boleta
     *
     * @param \Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta
     */
    public function removeDetalleBoletum(\Eticom\GasBundle\Entity\DetalleBoleta $detalleBoleta)
    {
        $this->detalleBoleta->removeElement($detalleBoleta);
    }

    /**
     * Get detalle_boleta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalleBoleta()
    {
        return $this->detalleBoleta;
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

    public function __toString()
    {
        return $this->getNombre();
    }
}
