<?php

namespace App\Entity;

use App\Enum\GearBox;
use App\Enum\PlacesNumber;
use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min : 2)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[Assert\Length(min : 50)]
    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[Assert\NotBlank]

    #[ORM\Column]
    private ?float $monthlyPrice = null;

    #[ORM\Column]
    private ?float $dailyPrice = null;

    #[ORM\Column(length: 255)]
    private ?GearBox $GearBox = null;

    #[ORM\Column]
    private ?PlacesNumber $PlacesNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?float
    {
        return $this->monthlyPrice;
    }

    public function setMonthlyPrice(float $monthlyPrice): static
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(float $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getGearBox(): ?GearBox
    {
        return $this->GearBox;
    }

    public function setGearBox(GearBox $GearBox): static
    {
        $this->GearBox = $GearBox;

        return $this;
    }

    public function getPlacesNumber(): ?PlacesNumber
    {
        return $this->PlacesNumber;
    }

    public function setPlacesNumber(?PlacesNumber $PlacesNumber): static
    {
        $this->PlacesNumber = $PlacesNumber;

        return $this;
    }
}
