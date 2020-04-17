<?php

namespace LivraisonBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="LivraisonBundle\Repository\LivraisonRepository")
 */
class Livraison
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
/**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat ="en cours";
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraison", type="datetime", nullable=true)
     */
    private $dateLivraison;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;


    public function __construct(){
$this->dateCreation = new \DateTime();
    }
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Livraison
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

/**
     * Set etat
     *
     * @param string $etat
     *
     * @return Livraison
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Livraison
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }




 /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return \DateTime
     */
    public function getDateLivraisonn()
    {
        return $this->dateLivraison;
    }

     /**
     * @return \DateTime
     */
    /**
     * Set prix
     *
     * @param \DateTime $date
     *
     * @return Livraison
     */
    public function setDateLivraisonn($date)
    {
         $this->dateLivraison = $date;
         return $this;
    }





    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Livraison
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Livraison
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }
}

