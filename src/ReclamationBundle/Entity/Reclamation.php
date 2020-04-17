<?php

namespace ReclamationBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\FosUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="ReclamationBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @ORM\Column(name="typeReclamation", type="string", length=45, nullable=false)
     */
    private $typereclamation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReclamation", type="date", nullable=false)
     */
    private $datereclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250)
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string",nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string",  nullable=false)
     */
    private $description;

        /**
         * @var User
         *
         * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
         * })
         */
        private $idUser;

    /**
     * Reclamation constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTypereclamation()
    {
        return $this->typereclamation;
    }

    /**
     * @param string $typereclamation
     */
    public function setTypereclamation($typereclamation)
    {
        $this->typereclamation = $typereclamation;
    }

    /**
     * @return \DateTime
     */
    public function getDatereclamation()
    {
        return $this->datereclamation;
    }

    /**
     * @param \DateTime $datereclamation
     */
    public function setDatereclamation($datereclamation)
    {
        $this->datereclamation = $datereclamation;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param string $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }






}


