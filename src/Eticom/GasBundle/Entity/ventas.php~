<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="ventas")
*/
class ventas
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	Protected $id_ventas;

	/**
	* @ORM\Column(type="date")	
	*/
	Protected $fecha;

	/**
	* @ORM\Column(type="float")
	*/
	Protected $monto;

	/**
	* @ORM\Column(type="string", length=40)
	*/
	Protected $nro_ticket;

	/**
	* @ORM\Column(type="boolean")
	*/
	Protected $creditos;

	/**
	* @ORM\Column(type="boolean")
	*/
	Protected $prestamo_balon;

	//Creando las relaciones

	/**
     * @ORM\ManyToOne(targetEntity="sucursal", inversedBy="ventas")
     * @ORM\JoinColumn(name="id_sucursal", referencedColumnName="id_sucursal")
     */
	protected $sucursal;

	/**
	 * @ORM\ManyToOne(targetEntity="usuarios", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_usuarios", referencedColumnName="id_usuario")
	 */
	protected $usuarios;

	/**
	 * @ORM\ManyToOne(targetEntity="cliente", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
	 */
	protected $cliente;

	/**
	 * @ORM\ManyToOne(targetEntity="productos", inversedBy="ventas")
	 * @ORM\JoinColumn(name="id_producto", referencedColumnName="id_productos")
	 */
	protected $productos;


    /**
     * Get id_ventas
     *
     * @return integer 
     */
    public function getIdVentas()
    {
        return $this->id_ventas;
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
        $this->nro_ticket = $nroTicket;

        return $this;
    }

    /**
     * Get nro_ticket
     *
     * @return string 
     */
    public function getNroTicket()
    {
        return $this->nro_ticket;
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
        $this->prestamo_balon = $prestamoBalon;

        return $this;
    }

    /**
     * Get prestamo_balon
     *
     * @return boolean 
     */
    public function getPrestamoBalon()
    {
        return $this->prestamo_balon;
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
}
