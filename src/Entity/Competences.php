<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetencesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *  * routePrefix="/admin",
 * attributes={
 *      "security"= "is_granted('ROLE_Admin')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 *      },
 * collectionOperations={
 *       "GET","POST"
 *      },
 * itemOperations={
 *      "GET","PUT"  
 * }
 * )
 * @ORM\Entity(repositoryClass=CompetencesRepository::class)
 */
class Competences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Grpecompetences::class, inversedBy="competences")
     */
    private $grpecompetences;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGrpecompetences(): ?Grpecompetences
    {
        return $this->grpecompetences;
    }

    public function setGrpecompetences(?Grpecompetences $grpecompetences): self
    {
        $this->grpecompetences = $grpecompetences;

        return $this;
    }
}
