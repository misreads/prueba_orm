<?php

namespace PersonaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="perfil")
 */

class Perfil
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

    private $nombre_perfil;

    /**
     *@ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
     *
     */

    private $fecha_creacion;

    /**
     *@ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
     */

    private $fecha_modificacion;

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
    public function getNombrePerfil()
    {
        return $this->nombre_perfil;
    }

    /**
     * @param mixed $nombre_perfil
     */
    public function setNombrePerfil($nombre_perfil)
    {
        $this->nombre_perfil = $nombre_perfil;
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