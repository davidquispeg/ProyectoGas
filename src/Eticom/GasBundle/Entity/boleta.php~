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
	protected $num_boleta;

	/**
	* @ORM\Column(type="float")
	*/
	protected $igv;

	//Creando las relaciones//

	/**
	 * @ORM\ManyToOne(targetEntity="cliente", inversedBy="boleta")
	 * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
	 */
	protected $cliente;

	/**
	 * @ORM\OneToMany(targetEntity="detalle_boleta", mappedBy="boleta")
	 */
	protected $detalle_boleta;
	public function __construct()
	{
		$this->detalle_boleta = new ArrayCollection();
	}

    /**
     * Set num_boleta
     *
     * @param string $numBoleta
     * @return boleta
     */
    public function setNumBoleta($numBoleta)
    {
        $this->num_boleta = $numBoleta;

        return $this;
    }

    /**
     * Get num_boleta
     *
     * @return string 
     */
    public function getNumBoleta()
    {
        return $this->num_boleta;
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
}
