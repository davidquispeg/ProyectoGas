<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="boleta")
*/
class boleta
{
	/**
	* @ORM\Id
	* @ORM\Column(type="string")	
	*/
	protected $numBoleta;

	/**
	* @ORM\Column(type="float")
	*/
	protected $igv;

	//Creando las relaciones//

	/**
	 * @ORM\ManyToOne(targetEntity="cliente", inversedBy="boleta")
	 * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
	 */
	protected $cliente;

	/**
	 * @ORM\OneToMany(targetEntity="DetalleBoleta", mappedBy="boleta")
	 */
	protected $detalleBoleta;
	public function __construct()
	{
		$this->detalleBoleta = new ArrayCollection();
	}

    /**
     * Set num_boleta
     *
     * @param string $numBoleta
     * @return boleta
     */
    public function setNumBoleta($numBoleta)
    {
        $this->numBoleta = $numBoleta;

        return $this;
    }

    /**
     * Get num_boleta
     *
     * @return string 
     */
    public function getNumBoleta()
    {
        return $this->numBoleta;
    }

    /**
     * Set igv
     *
     * @param float $igv
     * @return boleta
     */
    public function setIgv($igv)
    {
        $this->igv = $igv;

        return $this;
    }

    /**
     * Get igv
     *
     * @return float 
     */
    public function getIgv()
    {
        return $this->igv;
    }

    /**
     * Set cliente
     *
     * @param \Eticom\GasBundle\Entity\cliente $cliente
     * @return boleta
     */
    public function setCliente(\Eticom\GasBundle\Entity\cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Eticom\GasBundle\Entity\cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add detalle_boleta
     *
     * @param \Eticom\GasBundle\Entity\detalle_boleta $detalleBoleta
     * @return boleta
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
}
