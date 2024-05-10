<?php

namespace App\Entity;

use App\Repository\PayementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PayementRepository::class)
 */
class Payement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $payementTotal;

    /**
     * @ORM\Column(type="date")
     */
    private $payementDate;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, mappedBy="payement", cascade={"persist", "remove"})
     */
    private $reservations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayementTotal(): ?string
    {
        return $this->payementTotal;
    }

    public function setPayementTotal(string $payementTotal): self
    {
        $this->payementTotal = $payementTotal;

        return $this;
    }

    public function getPayementDate(): ?\DateTimeInterface
    {
        return $this->payementDate;
    }

    public function setPayementDate(\DateTimeInterface $payementDate): self
    {
        $this->payementDate = $payementDate;

        return $this;
    }

    public function getReservations(): ?Reservation
    {
        return $this->reservations;
    }

    public function setReservations(Reservation $reservations): self
    {
        // set the owning side of the relation if necessary
        if ($reservations->getPayement() !== $this) {
            $reservations->setPayement($this);
        }

        $this->reservations = $reservations;

        return $this;
    }
}
