<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GrpecompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * * routePrefix="/admin",
 * attributes={
 *      "security"= "is_granted('ROLE_Admin')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 *      },
 * collectionOperations={
 *       "GET","POST",
 *      },
 * itemOperations={
 *      "GET","PUT","list_competences"={
 *         "method"="GET",
 *         "path"="/grpecompetences/{id}/competences",
 *         "controller" = GrpecompetencesController::class
 *         
 *      } 
 * }
 * )
 * @ORM\Entity(repositoryClass=GrpecompetencesRepository::class)
 */
class Grpecompetences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Competences::class, mappedBy="grpecompetences")
     */
    private $competences;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Competences[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setGrpecompetences($this);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getGrpecompetences() === $this) {
                $competence->setGrpecompetences(null);
            }
        }

        return $this;
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
}
