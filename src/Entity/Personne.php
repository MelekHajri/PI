<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne implements UserInterface
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
    private $nomPrenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numtel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaisssance;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="personne")
     */
    private $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    public function setNomPrenom(string $nomPrenom): self
    {
        $this->nomPrenom = $nomPrenom;

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

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getSexe(): ?bool
    {
        return $this->sexe;
    }

    public function setSexe(?bool $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaisssance(): ?\DateTimeInterface
    {
        return $this->dateNaisssance;
    }

    public function setDateNaisssance(\DateTimeInterface $dateNaisssance): self
    {
        $this->dateNaisssance = $dateNaisssance;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setPersonne($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getPersonne() === $this) {
                $review->setPersonne(null);
            }
        }

        return $this;
    }
    public function getUsername(): string
    {
        return $this->email; // Utilisez l'e-mail comme nom d'utilisateur
    }

    public function getPassword(): ?string
    {
        return $this->mdp; // Retourne le mot de passe
    }

    public function getRoles(): array
    {
        // Retourne un tableau de rôles
        return ['ROLE_USER']; // Par exemple, tous les utilisateurs ont le rôle ROLE_USER
    }
    public function getSalt()
    {
        // Vous pouvez renvoyer null si vous ne prévoyez pas d'utiliser de sel pour le hachage du mot de passe
        return null;
    }

    public function eraseCredentials()
    {
        // Vous pouvez implémenter cette méthode si vous devez effacer des informations sensibles de l'utilisateur
        // Par exemple, vous pouvez effacer le mot de passe en mémoire après l'authentification
        $this->mdp = null;
    }
}

