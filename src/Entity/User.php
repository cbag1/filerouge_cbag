<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "apprenant" = "Apprenant", "formateur" = "Formateur", "admin" ="Admin", "cm"= "CM"})
 * @ApiResource(
 * routePrefix="/admin/users/",
 * attributes={
 *      "security"= "is_granted('ROLE_Admin')",
 *      "security_message"="Seul l'admin a acces à cette ressource"},
 * 
 *     normalizationContext={"groups":{"users:read"}} ,
 *     denormalizationContext={"groups":{"users:write"}} ,    
 *  
 * collectionOperations={
 *      "add_user"={
 *               "method"="POST",
 *               "path"="",
 *               "deserialize"=false
 *          },
 *      "GET"={
 *              "method"="GET",
 *              "path"=""
 *            }
 * 
 *      },

 * itemOperations={"PUT","DELETE",
 *          "get"={
 *              "method"="GET",
 *              "path"="/{id}",
 *              "requirements"={"id"="\d+"}
 *            },
 *          "put"={
 *              "method"="PUT",
 *              "path"="/{id}",
 *              "requirements"={"id"="\d+"}  
 *           }
 *  }
 * )
 * 
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Groups({"users:read","users:write"})
     */
    protected $username;

    /**
     * 
     */
    protected $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @SerializedName("password")
     */
    protected $plainPassword;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="user")
     * @Groups({"users:read","users:write"})
     */
    protected $profil;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:read","users:write"})
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:read","users:write"})
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:read","users:write"})
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"users:read","users:write"})
     */
    protected $email;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"users:read","users:write"})
     */
    private $archive = false;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"users:read","users:write"})    
     */
    private $avatar;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_' . $this->profil->getLibelle();

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */


    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getAvatar()
    {  
    $avatar = @stream_get_contents($this->avatar);
    @fclose($this->avatar);
    return base64_encode($avatar);
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
