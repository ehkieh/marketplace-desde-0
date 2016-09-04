<?php
// src/AppBundle/Entity/Persona.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Persona extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=true)
    */
    protected $avatar;
    
    /**
     * @ORM\OneToMany(targetEntity="Trayecto", mappedBy="conductor") 
    */
    protected $trayectos;
    
    public function __construct()
    {
        parent::__construct();
        
        $avatars= array (

        "http://k33.kn3.net/taringa/E/3/2/B/1/2/StilesGamer/A14.png",
        "http://4.bp.blogspot.com/-_WhTFJwOUBk/U3bVPcAxzmI/AAAAAAAA3os/KFnTnXfahjE/s1600/8ACVgddF.png",
        "https://farm3.staticflickr.com/2898/14180990160_84d7fafd03_o.jpg",
            );
            
        $indexSel= rand(0, count($avatars) -1);
        $this->avatar = $avatars[$indexSel];
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Persona
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     * @return Persona
     */
    public function addTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos[] = $trayectos;

        return $this;
    }

    /**
     * Remove trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     */
    public function removeTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos->removeElement($trayectos);
    }

    /**
     * Get trayectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrayectos()
    {
        return $this->trayectos;
    }
}
