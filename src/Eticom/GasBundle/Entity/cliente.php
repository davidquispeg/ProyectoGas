<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity(repositoryClass="Eticom\GasBundle\Entity\ClienteRepository")
* @ORM\Table(name="cliente")
*/
class cliente
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
	*/
	protected $apellido;

	/**
	* @ORM\Column(type="string", length=40)
    * @Assert\NotBlank(message="Debes introducir un texto.")
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="string", length=12)
    * @Assert\NotBlank(message="Debes introducir un texto.")
	*/
	protected $celular;

	/**
	* @ORM\Column(type="string", length=255)
    * @Assert\NotBlank(message="Debes introducir un texto.")
	*/
	protected $direccion;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="ventas", mappedBy="cliente")
	 */
	protected $ventas;
	
	/**
	 * @ORM\OneToMany(targetEntity="boleta", mappedBy="cliente")
	 */
	protected $boleta;
	public function __construct()
	{
		$this->boleta = new ArrayCollection();
		$this->ventas = new ArrayCollection();
	}

    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return cliente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return cliente
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
     * Set celular
     *
     * @param string $celular
     * @return cliente
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return cliente
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
     * Add ventas
     *
     * @param \Eticom\GasBundle\Entity\ventas $ventas
     * @return cliente
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
     * Add boleta
     *
     * @param \Eticom\GasBundle\Entity\boleta $boleta
     * @return cliente
     */
    public function addBoletum(\Eticom\GasBundle\Entity\boleta $boleta)
    {
        $this->boleta[] = $boleta;

        return $this;
    }

    /**
     * Remove boleta
     *
     * @param \Eticom\GasBundle\Entity\boleta $boleta
     */
    public function removeBoletum(\Eticom\GasBundle\Entity\boleta $boleta)
    {
        $this->boleta->removeElement($boleta);
    }

    /**
     * Get boleta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoleta()
    {
        return $this->boleta;
    }
}
