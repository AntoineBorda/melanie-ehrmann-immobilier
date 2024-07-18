<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $type = null;

    #[ORM\Column]
    private ?bool $isClosed = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress = null;

    #[ORM\Column(nullable: true)]
    private ?int $zipcode = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $district = null;

    #[ORM\Column(nullable: true)]
    private ?int $rentPrice = null;

    #[ORM\Column(nullable: true)]
    private ?int $rentCharge = null;

    #[ORM\Column(nullable: true)]
    private ?int $rentDeposit = null;

    #[ORM\Column(nullable: true)]
    private ?int $salePriceInclAgencyFee = null;

    #[ORM\Column(nullable: true)]
    private ?int $salePriceExclAgencyFee = null;

    #[ORM\Column(nullable: true)]
    private ?int $saleCharge = null;

    #[ORM\Column(nullable: true)]
    private ?int $propertyTax = null;

    #[ORM\Column(nullable: true)]
    private ?float $buyerFee = null;

    #[ORM\Column(nullable: true)]
    private ?int $agencyFee = null;

    #[ORM\Column(nullable: true)]
    private ?int $inventoryFee = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasFurniture = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasKitchen = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasTerrain = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasTerrace = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasBalcony = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasGarage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasCave = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasParking = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasElevator = null;

    #[ORM\Column(nullable: true)]
    private ?int $livingSpace = null;

    #[ORM\Column(nullable: true)]
    private ?int $officialSpace = null;

    #[ORM\Column(nullable: true)]
    private ?int $terrainSpace = null;

    #[ORM\Column(nullable: true)]
    private ?int $floor = null;

    #[ORM\Column(nullable: true)]
    private ?int $room = null;

    #[ORM\Column(nullable: true)]
    private ?int $bathroom = null;

    #[ORM\Column(nullable: true)]
    private ?int $bedroom = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $kitchenType = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $heatingType = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $heatingMode = null;

    #[ORM\Column(nullable: true)]
    private ?int $constructionYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setClosed(bool $isClosed): static
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(?string $district): static
    {
        $this->district = $district;

        return $this;
    }

    public function getRentPrice(): ?int
    {
        return $this->rentPrice;
    }

    public function setRentPrice(?int $rentPrice): static
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    public function getRentCharge(): ?int
    {
        return $this->rentCharge;
    }

    public function setRentCharge(?int $rentCharge): static
    {
        $this->rentCharge = $rentCharge;

        return $this;
    }

    public function getRentDeposit(): ?int
    {
        return $this->rentDeposit;
    }

    public function setRentDeposit(?int $rentDeposit): static
    {
        $this->rentDeposit = $rentDeposit;

        return $this;
    }

    public function getSalePriceInclAgencyFee(): ?int
    {
        return $this->salePriceInclAgencyFee;
    }

    public function setSalePriceInclAgencyFee(?int $salePriceInclAgencyFee): static
    {
        $this->salePriceInclAgencyFee = $salePriceInclAgencyFee;

        return $this;
    }

    public function getSalePriceExclAgencyFee(): ?int
    {
        return $this->salePriceExclAgencyFee;
    }

    public function setSalePriceExclAgencyFee(?int $salePriceExclAgencyFee): static
    {
        $this->salePriceExclAgencyFee = $salePriceExclAgencyFee;

        return $this;
    }

    public function getSaleCharge(): ?int
    {
        return $this->saleCharge;
    }

    public function setSaleCharge(?int $saleCharge): static
    {
        $this->saleCharge = $saleCharge;

        return $this;
    }

    public function getPropertyTax(): ?int
    {
        return $this->propertyTax;
    }

    public function setPropertyTax(?int $propertyTax): static
    {
        $this->propertyTax = $propertyTax;

        return $this;
    }

    public function getBuyerFee(): ?float
    {
        return $this->buyerFee;
    }

    public function setBuyerFee(?float $buyerFee): static
    {
        $this->buyerFee = $buyerFee;

        return $this;
    }

    public function getAgencyFee(): ?int
    {
        return $this->agencyFee;
    }

    public function setAgencyFee(?int $agencyFee): static
    {
        $this->agencyFee = $agencyFee;

        return $this;
    }

    public function getInventoryFee(): ?int
    {
        return $this->inventoryFee;
    }

    public function setInventoryFee(?int $inventoryFee): static
    {
        $this->inventoryFee = $inventoryFee;

        return $this;
    }

    public function hasFurniture(): ?bool
    {
        return $this->hasFurniture;
    }

    public function setHasFurniture(?bool $hasFurniture): static
    {
        $this->hasFurniture = $hasFurniture;

        return $this;
    }

    public function hasKitchen(): ?bool
    {
        return $this->hasKitchen;
    }

    public function setHasKitchen(?bool $hasKitchen): static
    {
        $this->hasKitchen = $hasKitchen;

        return $this;
    }

    public function hasTerrain(): ?bool
    {
        return $this->hasTerrain;
    }

    public function setHasTerrain(?bool $hasTerrain): static
    {
        $this->hasTerrain = $hasTerrain;

        return $this;
    }

    public function hasTerrace(): ?bool
    {
        return $this->hasTerrace;
    }

    public function setHasTerrace(?bool $hasTerrace): static
    {
        $this->hasTerrace = $hasTerrace;

        return $this;
    }

    public function hasBalcony(): ?bool
    {
        return $this->hasBalcony;
    }

    public function setHasBalcony(?bool $hasBalcony): static
    {
        $this->hasBalcony = $hasBalcony;

        return $this;
    }

    public function hasGarage(): ?bool
    {
        return $this->hasGarage;
    }

    public function setHasGarage(?bool $hasGarage): static
    {
        $this->hasGarage = $hasGarage;

        return $this;
    }

    public function hasCave(): ?bool
    {
        return $this->hasCave;
    }

    public function setHasCave(?bool $hasCave): static
    {
        $this->hasCave = $hasCave;

        return $this;
    }

    public function hasParking(): ?bool
    {
        return $this->hasParking;
    }

    public function setHasParking(?bool $hasParking): static
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    public function hasElevator(): ?bool
    {
        return $this->hasElevator;
    }

    public function setHasElevator(?bool $hasElevator): static
    {
        $this->hasElevator = $hasElevator;

        return $this;
    }

    public function getLivingSpace(): ?int
    {
        return $this->livingSpace;
    }

    public function setLivingSpace(?int $livingSpace): static
    {
        $this->livingSpace = $livingSpace;

        return $this;
    }

    public function getOfficialSpace(): ?int
    {
        return $this->officialSpace;
    }

    public function setOfficialSpace(?int $officialSpace): static
    {
        $this->officialSpace = $officialSpace;

        return $this;
    }

    public function getTerrainSpace(): ?int
    {
        return $this->terrainSpace;
    }

    public function setTerrainSpace(?int $terrainSpace): static
    {
        $this->terrainSpace = $terrainSpace;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(?int $floor): static
    {
        $this->floor = $floor;

        return $this;
    }

    public function getRoom(): ?int
    {
        return $this->room;
    }

    public function setRoom(?int $room): static
    {
        $this->room = $room;

        return $this;
    }

    public function getBathroom(): ?int
    {
        return $this->bathroom;
    }

    public function setBathroom(?int $bathroom): static
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(?int $bedroom): static
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getKitchenType(): ?string
    {
        return $this->kitchenType;
    }

    public function setKitchenType(?string $kitchenType): static
    {
        $this->kitchenType = $kitchenType;

        return $this;
    }

    public function getHeatingType(): ?string
    {
        return $this->heatingType;
    }

    public function setHeatingType(?string $heatingType): static
    {
        $this->heatingType = $heatingType;

        return $this;
    }

    public function getHeatingMode(): ?string
    {
        return $this->heatingMode;
    }

    public function setHeatingMode(?string $heatingMode): static
    {
        $this->heatingMode = $heatingMode;

        return $this;
    }

    public function getConstructionYear(): ?int
    {
        return $this->constructionYear;
    }

    public function setConstructionYear(?int $constructionYear): static
    {
        $this->constructionYear = $constructionYear;

        return $this;
    }
}
