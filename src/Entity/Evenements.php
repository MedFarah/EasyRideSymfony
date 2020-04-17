<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity
 */
class Evenements
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
     * @var string
     *
     * @ORM\Column(name="nom_evenements", type="string", length=255, nullable=false)
     */
    private $nomEvenements;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateeve", type="date", nullable=false)
     */
    private $dateeve;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuxeve", type="string", length=255, nullable=false)
     */
    private $lieuxeve;

    /**
     * @var string
     *
     * @ORM\Column(name="descreptioneve", type="string", length=255, nullable=false)
     */
    private $descreptioneve;


}

