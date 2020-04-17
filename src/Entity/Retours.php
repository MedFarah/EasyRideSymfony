<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retours
 *
 * @ORM\Table(name="retours", indexes={@ORM\Index(name="id_location", columns={"id_location"})})
 * @ORM\Entity
 */
class Retours
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
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="retard", type="boolean", nullable=false)
     */
    private $retard;

    /**
     * @var \DetailLocation
     *
     * @ORM\ManyToOne(targetEntity="DetailLocation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_location", referencedColumnName="id")
     * })
     */
    private $idLocation;


}

