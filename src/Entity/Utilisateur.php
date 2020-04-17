<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="text", length=65535, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="text", length=65535, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", length=65535, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="text", length=65535, nullable=false)
     */
    private $nomcomplet;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="text", length=65535, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=65535, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="text", length=65535, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissance", type="text", length=65535, nullable=false)
     */
    private $datenaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=false)
     */
    private $datecreation = 'current_timestamp()';


}

