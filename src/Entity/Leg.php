<?php

namespace App\Entity;

use App\Repository\LegRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LegRepository::class)
 */
class Leg
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
    private $legName;

    /**
     * @ORM\Column(type="text")
     */
    private $legDescription;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $legKilometers;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $legAccessible;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreatedLeg;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModifiedLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Stop::class, inversedBy="legStart")
     */
    private $startStop;

    /**
     * @ORM\ManyToOne(targetEntity=Stop::class, inversedBy="legEnd")
     * @ORM\JoinColumn(nullable=false)
     */
    private $endStop;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegName(): ?string
    {
        return $this->legName;
    }

    public function setLegName(string $legName): self
    {
        $this->legName = $legName;

        return $this;
    }

    public function getLegDescription(): ?string
    {
        return $this->legDescription;
    }

    public function setLegDescription(string $legDescription): self
    {
        $this->legDescription = $legDescription;

        return $this;
    }

    public function getLegKilometers(): ?string
    {
        return $this->legKilometers;
    }

    public function setLegKilometers(string $legKilometers): self
    {
        $this->legKilometers = $legKilometers;

        return $this;
    }

    public function isLegAccessible(): ?bool
    {
        return $this->legAccessible;
    }

    public function setLegAccessible(?bool $legAccessible): self
    {
        $this->legAccessible = $legAccessible;

        return $this;
    }

    public function getDateCreatedLeg(): ?\DateTimeInterface
    {
        return $this->dateCreatedLeg;
    }

    public function setDateCreatedLeg(\DateTimeInterface $dateCreatedLeg): self
    {
        $this->dateCreatedLeg = $dateCreatedLeg;

        return $this;
    }

    public function getDateModifiedLeg(): ?\DateTimeInterface
    {
        return $this->dateModifiedLeg;
    }

    public function setDateModifiedLeg(?\DateTimeInterface $dateModifiedLeg): self
    {
        $this->dateModifiedLeg = $dateModifiedLeg;

        return $this;
    }

    public function getStartStop(): ?Stop
    {
        return $this->startStop;
    }

    public function setStartStop(?Stop $startStop): self
    {
        $this->startStop = $startStop;

        return $this;
    }

    public function getEndStop(): ?Stop
    {
        return $this->endStop;
    }

    public function setEndStop(?Stop $endStop): self
    {
        $this->endStop = $endStop;

        return $this;
    }

}
