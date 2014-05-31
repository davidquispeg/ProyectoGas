<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="usuarios")
*/
class usuarios
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id_usuario;

	/**
	* @ORM\Column(type="string", length=50)
	*/
	protected $apellido;

	/**
	* @ORM\Column(type="string", length=40)
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="string", length=20)
	*/
	protected $usuario;

	/**
	* @ORM\Column(type="string", length=20)
	*/
	protected $clave;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="ventas", mappedBy="usuarios")
	 */
	protected $ventas;
	public function __construct()
	{
		$this->ventas=new ArrayCollection();
	}

    /**
     * Get id_usuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return usuarios
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
     * @return usuarios
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
     * Set usuario
     *
     * @param string $usuario
     * @return usuarios
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return usuarios
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Add ventas
     *
     * @param \Eticom\GasBundle\Entity\ventas $ventas
     * @return usuarios
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
