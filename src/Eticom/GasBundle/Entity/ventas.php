<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity(repositoryClass="Eticom\GasBundle\Entity\VentaRepository")
* @ORM\Table(name="ventas")
*/
class ventas
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	Protected $id;

	/**
	* @ORM\Column(type="date")
	*/
	Protected $fecha;

	/**
	* @ORM\Column(type="float")
    * @Assert\NotBlank()
    * @Assert\Range(min=1,minMessage="Introducir valores mayores a cero",invalidMessage="El valor deberia ser un numero")
	*/
	Protected $monto;

    /**
    * @ORM\Column(type="integer")    
    * @Assert\NotBlank(message="Debes introducir un valor")    
    * @Assert\Range(min=1,minMessage="Introducir valores mayores a cero",invalidMessage="El valor deberia ser un numero")
    */
    Protected $cantidad;

	/**
    * @Assert\NotBlank(message="Debes introducir un valor.")
	* @ORM\Column(type="string", length=10)    
	*/
    Protected $nroTicket;

	/**
	* @ORM\Column(type="boolean")
	*/
	Protected $creditos;

	/**
	* @ORM\Column(type="boolean")
	*/
	Protected $prestamoBalon;

	//Creando las relaciones

	/**
     * @ORM\ManyToOne(targetEntity="sucursal", inversedBy="ventas")
     * @ORM\JoinColumn(name="id_sucursal", referencedColumnName="id")
     */
	protected $sucursal;

	/**
	 * @ORM\ManyToOne(targetEntity="usuarios", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_usuarios", referencedColumnName="id")
	 */
	protected $usuarios;

	/**
	 * @ORM\ManyToOne(targetEntity="cliente", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
	 */
	protected $cliente;

	/**
	 * @ORM\ManyToOne(targetEntity="productos", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_producto", referencedColumnName="id")
	 */
	protected $productos;


    /**
     * Get id_ventas
     *
     * @return integer 
     */
    public function getIdVentas()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return ventas
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
     * Set monto
     *
     * @param float $monto
     * @return ventas
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set nro_ticket
     *
     * @param string $nroTicket
     * @return ventas
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
     * Set creditos
     *
     * @param boolean $creditos
     * @return ventas
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Get creditos
     *
     * @return boolean 
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Set prestamo_balon
     *
     * @param boolean $prestamoBalon
     * @return ventas
     */
    public function setPrestamoBalon($prestamoBalon)
    {
        $this->prestamoBalon = $prestamoBalon;

        return $this;
    }

    /**
     * Get prestamo_balon
     *
     * @return boolean 
     */
    public function getPrestamoBalon()
    {
        return $this->prestamoBalon;
    }

    /**
     * Set sucursal
     *
     * @param \Eticom\GasBundle\Entity\sucursal $sucursal
     * @return ventas
     */
    public function setSucursal(\Eticom\GasBundle\Entity\sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \Eticom\GasBundle\Entity\sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set usuarios
     *
     * @param \Eticom\GasBundle\Entity\usuarios $usuarios
     * @return ventas
     */
    public function setUsuarios(\Eticom\GasBundle\Entity\usuarios $usuarios = null)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    /**
     * Get usuarios
     *
     * @return \Eticom\GasBundle\Entity\usuarios 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Set cliente
     *
     * @param \Eticom\GasBundle\Entity\cliente $cliente
     * @return ventas
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
     * Set productos
     *
     * @param \Eticom\GasBundle\Entity\productos $productos
     * @return ventas
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ventas
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
}
