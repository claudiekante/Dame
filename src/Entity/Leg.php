<?php

namespace App\Entity;

use App\Repository\LegRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $startStop;

    /**
     * @ORM\ManyToOne(targetEntity=Stop::class, inversedBy="legEnd")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $endStop;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeyFirstLeg")
     */
    private $firstLegJourney;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeySecondLeg")
     */
    private $secondLegJourney;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeyThirdLeg")
     */
    private $thirdLegJourney;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeyFourthLeg")
     */
    private $fourthLegJourney;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeyFifthLeg")
     */
    private $fifthLegJourney;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="journeySixthLeg")
     */
    private $sixthLegJourney;

    public function __construct()
    {
        $this->firstLegJourney = new ArrayCollection();
        $this->secondLegJourney = new ArrayCollection();
        $this->thirdLegJourney = new ArrayCollection();
        $this->fourthLegJourney = new ArrayCollection();
        $this->fifthLegJourney = new ArrayCollection();
        $this->sixthLegJourney = new ArrayCollection();
    }
    

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

    /**
     * @return Collection<int, Journey>
     */
    public function getFirstLegJourney(): Collection
    {
        return $this->firstLegJourney;
    }

    public function addFirstLegJourney(Journey $firstLegJourney): self
    {
        if (!$this->firstLegJourney->contains($firstLegJourney)) {
            $this->firstLegJourney[] = $firstLegJourney;
            $firstLegJourney->setJourneyFirstLeg($this);
        }

        return $this;
    }

    public function removeFirstLegJourney(Journey $firstLegJourney): self
    {
        if ($this->firstLegJourney->removeElement($firstLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($firstLegJourney->getJourneyFirstLeg() === $this) {
                $firstLegJourney->setJourneyFirstLeg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journey>
     */
    public function getSecondLegJourney(): Collection
    {
        return $this->secondLegJourney;
    }

    public function addSecondLegJourney(Journey $secondLegJourney): self
    {
        if (!$this->secondLegJourney->contains($secondLegJourney)) {
            $this->secondLegJourney[] = $secondLegJourney;
            $secondLegJourney->setJourneySecondLeg($this);
        }

        return $this;
    }

    public function removeSecondLegJourney(Journey $secondLegJourney): self
    {
        if ($this->secondLegJourney->removeElement($secondLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($secondLegJourney->getJourneySecondLeg() === $this) {
                $secondLegJourney->setJourneySecondLeg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journey>
     */
    public function getThirdLegJourney(): Collection
    {
        return $this->thirdLegJourney;
    }

    public function addThirdLegJourney(Journey $thirdLegJourney): self
    {
        if (!$this->thirdLegJourney->contains($thirdLegJourney)) {
            $this->thirdLegJourney[] = $thirdLegJourney;
            $thirdLegJourney->setJourneyThirdLeg($this);
        }

        return $this;
    }

    public function removeThirdLegJourney(Journey $thirdLegJourney): self
    {
        if ($this->thirdLegJourney->removeElement($thirdLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($thirdLegJourney->getJourneyThirdLeg() === $this) {
                $thirdLegJourney->setJourneyThirdLeg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journey>
     */
    public function getFourthLegJourney(): Collection
    {
        return $this->fourthLegJourney;
    }

    public function addFourthLegJourney(Journey $fourthLegJourney): self
    {
        if (!$this->fourthLegJourney->contains($fourthLegJourney)) {
            $this->fourthLegJourney[] = $fourthLegJourney;
            $fourthLegJourney->setJourneyFourthLeg($this);
        }

        return $this;
    }

    public function removeFourthLegJourney(Journey $fourthLegJourney): self
    {
        if ($this->fourthLegJourney->removeElement($fourthLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($fourthLegJourney->getJourneyFourthLeg() === $this) {
                $fourthLegJourney->setJourneyFourthLeg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journey>
     */
    public function getFifthLegJourney(): Collection
    {
        return $this->fifthLegJourney;
    }

    public function addFifthLegJourney(Journey $fifthLegJourney): self
    {
        if (!$this->fifthLegJourney->contains($fifthLegJourney)) {
            $this->fifthLegJourney[] = $fifthLegJourney;
            $fifthLegJourney->setJourneyFifthLeg($this);
        }

        return $this;
    }

    public function removeFifthLegJourney(Journey $fifthLegJourney): self
    {
        if ($this->fifthLegJourney->removeElement($fifthLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($fifthLegJourney->getJourneyFifthLeg() === $this) {
                $fifthLegJourney->setJourneyFifthLeg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journey>
     */
    public function getSixthLegJourney(): Collection
    {
        return $this->sixthLegJourney;
    }

    public function addSixthLegJourney(Journey $sixthLegJourney): self
    {
        if (!$this->sixthLegJourney->contains($sixthLegJourney)) {
            $this->sixthLegJourney[] = $sixthLegJourney;
            $sixthLegJourney->setJourneySixthLeg($this);
        }

        return $this;
    }

    public function removeSixthLegJourney(Journey $sixthLegJourney): self
    {
        if ($this->sixthLegJourney->removeElement($sixthLegJourney)) {
            // set the owning side to null (unless already changed)
            if ($sixthLegJourney->getJourneySixthLeg() === $this) {
                $sixthLegJourney->setJourneySixthLeg(null);
            }
        }

        return $this;
    }

}
