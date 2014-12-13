<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="detalle_boleta")
*/
class DetalleBoleta
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
	* @ORM\Column(type="float")
	*/	
	protected $importe;

	/**
	* @ORM\Column(type="date")
	*/
	protected $fecha;

	//Creando las relaciones//

	/**
	 * @ORM\ManyToOne(targetEntity="boleta", inversedBy="DetalleBoleta")
	 * @ORM\JoinColumn(name="id_boleta", referencedColumnName="numBoleta")
	 */
	protected $boleta;

	/**
	 * @ORM\ManyToOne(targetEntity="productos", inversedBy="DetalleBoleta")
	 * @ORM\JoinColumn(name="id_producto", referencedColumnName="id")
	 */
	protected $productos;

    /**
     * Set importe
     *
     * @param float $importe
     * @return detalle_boleta
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return detalle_boleta
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
     * Set boleta
     *
     * @param \Eticom\GasBundle\Entity\boleta $boleta
     * @return detalle_boleta
     */
    public function setBoleta(\Eticom\GasBundle\Entity\boleta $boleta = null)
    {
        $this->boleta = $boleta;

        return $this;
    }

    /**
     * Get boleta
     *
     * @return \Eticom\GasBundle\Entity\boleta 
     */
    public function getBoleta()
    {
        return $this->boleta;
    }

    /**
     * Set productos
     *
     * @param \Eticom\GasBundle\Entity\productos $productos
     * @return detalle_boleta
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
