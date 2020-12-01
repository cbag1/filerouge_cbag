<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * attributes={
 *      "security"= "is_granted('ROLE_Admin')",
 *      "security_message"="Seul le formateur a access à cette ressource"
 *      },
 * )
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 */
class Formateur extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
