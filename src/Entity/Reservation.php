<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TourPackage::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tourPackage;

    /**
     * @ORM\ManyToOne(targetEntity=Hotels::class, inversedBy="reservations")
     */
    private $hotel;

    /**
     * @ORM\OneToOne(targetEntity=Payement::class, inversedBy="reservations", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $payement;

    /**
     * @ORM\ManyToOne(targetEntity=Flight::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $flight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTourPackage(): ?TourPackage
    {
        return $this->tourPackage;
    }

    public function setTourPackage(?TourPackage $tourPackage): self
    {
        $this->tourPackage = $tourPackage;

        return $this;
    }

    public function getHotel(): ?Hotels
    {
        return $this->hotel;
    }

    public function setHotel(?Hotels $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getPayement(): ?Payement
    {
        return $this->payement;
    }

    public function setPayement(Payement $payement): self
    {
        $this->payement = $payement;

        return $this;
    }

    public function getFlight(): ?Flight
    {
        return $this->flight;
    }

    public function setFlight(?Flight $flight): self
    {
        $this->flight = $flight;

        return $this;
    }
}
