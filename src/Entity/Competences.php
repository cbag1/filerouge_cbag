<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"competences:read"}},
 *  denormalizationContext={"groups"={"competences:write"}},
 * routePrefix="/admin",
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
     * @Groups({"competences:read","competences:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"competences:read","competences:write"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"competences:read","competences:write"})
     */
    private $description;


    /**
     * @ORM\OneToMany(targetEntity=Niveau::class, mappedBy="competences", cascade={"persist"})
     *  @ApiSubresource
     * @Assert\Count(
     *      min = 3,
     *      max = 3,
     *      maxMessage = "Vous devez entré 3 Niveaux pour permettre l'ajout d'une competenee",
     * )
     *  @Groups({"competences:read", "competences:write"})
     */
     
    private $niveaux;

    /**
     * @ORM\ManyToMany(targetEntity=Grpecompetences::class, mappedBy="competences")
     */
    private $grpecompetences;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->grpecompetences = new ArrayCollection();
    }

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

 
    /**
     * @return Collection|Niveau[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setCompetences($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getCompetences() === $this) {
                $niveau->setCompetences(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Grpecompetences[]
     */
    public function getGrpecompetences(): Collection
    {
        return $this->grpecompetences;
    }

    public function addGrpecompetence(Grpecompetences $grpecompetence): self
    {
        if (!$this->grpecompetences->contains($grpecompetence)) {
            $this->grpecompetences[] = $grpecompetence;
            $grpecompetence->addCompetence($this);
        }

        return $this;
    }

    public function removeGrpecompetence(Grpecompetences $grpecompetence): self
    {
        if ($this->grpecompetences->removeElement($grpecompetence)) {
            $grpecompetence->removeCompetence($this);
        }

        return $this;
    }
}
