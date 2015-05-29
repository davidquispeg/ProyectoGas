<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="usuarios")
*/
class usuarios implements UserInterface
{
    function eraseCredentials()
    {

    }
    function getRoles()
    {
        return array($this->getRol());
    }
    function getUsername()
    {
        return $this->getUsuario();
    }
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\Column(type="string", length=50)
    * @Assert\NotBlank(message = "Por favor, ingrese su apellido.")
	*/
	protected $apellido;

	/**
	* @ORM\Column(type="string", length=40)
    * @Assert\NotBlank(message = "Por favor, ingrese su nombre.")
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="string", length=20)
    * @Assert\NotBlank(message="Ingrese su denominacion de usuario.")
	*/
	protected $usuario;

	/**
	* @ORM\Column(type="string")
	*/
	protected $password;

    /**
    * @ORM\Column(type="string")
    */
    protected $salt;

    /**
    * @ORM\Column(type="string")
    */
    protected $rol;

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
        return $this->id;
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
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setsalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }
    public function getsalt()
    {
        return $this->salt;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
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
    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellido();
    }
}
