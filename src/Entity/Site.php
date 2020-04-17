<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity
 */
class Site
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
     * @ORM\Column(name="emplacement", type="string", length=255, nullable=false)
     */
    private $emplacement;

    /**
     * @var float
     *
     * @ORM\Column(name="langitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $langitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude;


}

