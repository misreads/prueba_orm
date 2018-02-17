<?php
/**
 * Created by PhpStorm.
 * User: joaquin
 * Date: 17-02-18
 * Time: 14:16
 */

namespace PersonaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */

class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre_usuario;

    /**
     *@ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
     */
    private $fecha_creacion;

    /**
     *@ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
     */
    private $fecha_modificacion;

    /**
     *@ORM\ManyToOne(targetEntity="Perfil")
     *@ORM\JoinColumn(nullable=false)
     */
    private $perfil;

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil(Perfil $perfil)
    {
        $this->perfil = $perfil;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * @param mixed $nombre_usuario
     */
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion()
    {
        $fecha = new \DateTime("now");
        $fecha->setTimezone(new \DateTimeZone('America/Santiago'));
        $this->fecha_creacion = $fecha;
    }

    /**
     * @return mixed
     */
    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }

    /**
     * @param mixed $fecha_modificacion
     */
    public function setFechaModificacion()
    {
        $fecha = new \DateTime("now");
        $fecha->setTimezone(new \DateTimeZone('America/Santiago'));
        $this->fecha_modificacion = $fecha;
    }


}