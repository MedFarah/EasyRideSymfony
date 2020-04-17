<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="ref_user", columns={"ref_user"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var string
     *
     * @ORM\Column(name="ref_cmd", type="string", length=760, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refCmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cmd", type="date", nullable=false)
     */
    private $dateCmd;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_cmd", type="string", length=1000, nullable=false)
     */
    private $etatCmd;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_cmd", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixCmd;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_user", referencedColumnName="id")
     * })
     */
    private $refUser;


}

