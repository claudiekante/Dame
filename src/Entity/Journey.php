<?php

namespace App\Entity;

use App\Repository\JourneyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JourneyRepository::class)
 */
class Journey
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
    private $journeyName;

    /**
     * @ORM\Column(type="text")
     */
    private $journeyDescription;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $journeyDateStart;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="firstLegJourney")
     * @ORM\JoinColumn(nullable=false)
     */
    private $journeyFirstLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="secondLegJourney")
     */
    private $journeySecondLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="thirdLegJourney")
     */
    private $journeyThirdLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="fourthLegJourney")
     */
    private $journeyFourthLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="fifthLegJourney")
     */
    private $journeyFifthLeg;

    /**
     * @ORM\ManyToOne(targetEntity=Leg::class, inversedBy="sixthLegJourney")
     */
    private $journeySixthLeg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourneyName(): ?string
    {
        return $this->journeyName;
    }

    public function setJourneyName(string $journeyName): self
    {
        $this->journeyName = $journeyName;

        return $this;
    }

    public function getJourneyDescription(): ?string
    {
        return $this->journeyDescription;
    }

    public function setJourneyDescription(string $journeyDescription): self
    {
        $this->journeyDescription = $journeyDescription;

        return $this;
    }

    public function getJourneyDateStart(): ?\DateTimeInterface
    {
        return $this->journeyDateStart;
    }

    public function setJourneyDateStart(?\DateTimeInterface $journeyDateStart): self
    {
        $this->journeyDateStart = $journeyDateStart;

        return $this;
    }

    public function getJourneyFirstLeg(): ?Leg
    {
        return $this->journeyFirstLeg;
    }

    public function setJourneyFirstLeg(?Leg $journeyFirstLeg): self
    {
        $this->journeyFirstLeg = $journeyFirstLeg;

        return $this;
    }

    public function getJourneySecondLeg(): ?Leg
    {
        return $this->journeySecondLeg;
    }

    public function setJourneySecondLeg(?Leg $journeySecondLeg): self
    {
        $this->journeySecondLeg = $journeySecondLeg;

        return $this;
    }

    public function getJourneyThirdLeg(): ?Leg
    {
        return $this->journeyThirdLeg;
    }

    public function setJourneyThirdLeg(?Leg $journeyThirdLeg): self
    {
        $this->journeyThirdLeg = $journeyThirdLeg;

        return $this;
    }

    public function getJourneyFourthLeg(): ?Leg
    {
        return $this->journeyFourthLeg;
    }

    public function setJourneyFourthLeg(?Leg $journeyFourthLeg): self
    {
        $this->journeyFourthLeg = $journeyFourthLeg;

        return $this;
    }

    public function getJourneyFifthLeg(): ?Leg
    {
        return $this->journeyFifthLeg;
    }

    public function setJourneyFifthLeg(?Leg $journeyFifthLeg): self
    {
        $this->journeyFifthLeg = $journeyFifthLeg;

        return $this;
    }

    public function getJourneySixthLeg(): ?Leg
    {
        return $this->journeySixthLeg;
    }

    public function setJourneySixthLeg(?Leg $journeySixthLeg): self
    {
        $this->journeySixthLeg = $journeySixthLeg;

        return $this;
    }
}
