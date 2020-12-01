<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
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
 * @ORM\Entity(repositoryClass=TagsRepository::class)
 */
class Tags
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\ManyToOne(targetEntity=Grptags::class, inversedBy="tags")
     */
    private $grptags;

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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getGrptags(): ?Grptags
    {
        return $this->grptags;
    }

    public function setGrptags(?Grptags $grptags): self
    {
        $this->grptags = $grptags;

        return $this;
    }
}
