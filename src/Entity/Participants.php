<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participants
 *
 * @ORM\Table(name="participants", indexes={@ORM\Index(name="IDX_7169709263FECAEA", columns={"idEvenements"}), @ORM\Index(name="IDX_71697092FE6E88D7", columns={"idUser"})})
 * @ORM\Entity
 */
class Participants
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Evenements
     *
     * @ORM\ManyToOne(targetEntity="Evenements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenements", referencedColumnName="id")
     * })
     */
    private $idevenements;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;


}

