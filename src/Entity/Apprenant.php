<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ApprenantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * attributes={
 *      "security"= "is_granted('ROLE_User')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 *      },
 * collectionOperations={
 *      "add_apprenant"={
 *               "security"="is_granted('ROLE_Admin')",
 *               "security_message"="Seul l'admin peut ajouter cette ressource",
 *               "method"="POST",
 *               "path"="/apprenants"
 *               
 *            },
 *      "GET"={
 *              "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur') or is_granted('ROLE_CM') ",
 *              "security_message"="Seul l'admin peut ajouter cette ressource",
 *              "method"="GET",
 *              
 *              "path"="/apprenants"
 *            }
 * 
 *      },
 * itemOperations={
 *          "get"={
 *              "method"="GET",
 *              "path"="apprenants/{id}",
 *              "requirements"={"id"="\d+"}
 *            },
 *          "put"={
 *              "path"="apprenants/{id}"   
 *           }
 *  }
 
 * 
 * )
 * 
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 */
class Apprenant extends User

{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="apprenants")
     */
    private $groupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }
}
