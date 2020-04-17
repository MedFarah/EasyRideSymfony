<?php

namespace EvenmentsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity(repositoryClass="EvenmentsBundle\Repository\evenementsRepository")
 */
class evenements
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */


    /**
     * @var string
     *
     * @ORM\Column(name="nom_evenements", type="string", length=255)
     */
    private $nom_evenements;


    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer")
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateeve	", type="date")
     */
    private $dateeve;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuxeve", type="string", length=255)
     */
    private $lieuxeve;



    /**
     * @var string
     *
     * @ORM\Column(name="descreptioneve", type="string", length=255)
     */
    private $descreptioneve;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNomEvenements()
    {
        return $this->nom_evenements;
    }

    /**
     * @param string $nom_evenements
     */
    public function setNomEvenements($nom_evenements)
    {
        $this->nom_evenements = $nom_evenements;
    }

    /**
     * @return int
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param int $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return \DateTime
     */
    public function getDateeve()
    {
        return $this->dateeve;
    }

    /**
     * @param \DateTime $dateeve
     */
    public function setDateeve($dateeve)
    {
        $this->dateeve = $dateeve;
    }

    /**
     * @return string
     */
    public function getLieuxeve()
    {
        return $this->lieuxeve;
    }

    /**
     * @param string $lieuxeve
     */
    public function setLieuxeve($lieuxeve)
    {
        $this->lieuxeve = $lieuxeve;
    }

    /**
     * @return string
     */
    public function getDescreptioneve()
    {
        return $this->descreptioneve;
    }

    /**
     * @param string $descreptioneve
     */
    public function setDescreptioneve($descreptioneve)
    {
        $this->descreptioneve = $descreptioneve;
    }

}

