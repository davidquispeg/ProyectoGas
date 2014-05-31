<?php
namespace Eticom\GasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="proveedor")
*/
class proveedor
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id_proveedor;

	/**
	* @ORM\Column(type="string")	
	*/
	protected $nombre;

	/**
	* @ORM\Column(type="string")
	*/
	protected $direccion;

	/**
	* @ORM\Column(type="string", length=12)
	*/
	protected $telefono;

	//Creando las relaciones//

	/**
	 * @ORM\OneToMany(targetEntity="productos", mappedBy="proveedor")	 
	 */
	protected $productos;
	public function __construct()
	{
		$this->productos = new ArrayCollection();
	}

    /**
     * Get id_proveedor
     *
     * @return integer 
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return proveedor
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
     * Set direccion
     *
     * @param string $direccion
     * @return proveedor
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
     * Set telefono
     *
     * @param string $telefono
     * @return proveedor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Add productos
     *
     * @param \Eticom\GasBundle\Entity\productos $productos
     * @return proveedor
     */
    public function addProducto(\Eticom\GasBundle\Entity\productos $productos)
    {
        $this->productos[] = $productos;

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \Eticom\GasBundle\Entity\productos $productos
     */
    public function removeProducto(\Eticom\GasBundle\Entity\productos $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
