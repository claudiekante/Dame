<?php

namespace App\Entity;

use App\Repository\StopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StopRepository::class)
 */
class Stop
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
    private $stopName;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6)
     */
    private $stopLatitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6)
     */
    private $stopLongitude;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $stopPluscode;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreatedStop;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModifiedStop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStopName(): ?string
    {
        return $this->stopName;
    }

    public function setStopName(string $stopName): self
    {
        $this->stopName = $stopName;

        return $this;
    }

    public function getStopLatitude(): ?string
    {
        return $this->stopLatitude;
    }

    public function setStopLatitude(string $stopLatitude): self
    {
        $this->stopLatitude = $stopLatitude;

        return $this;
    }

    public function getStopLongitude(): ?string
    {
        return $this->stopLongitude;
    }

    public function setStopLongitude(string $stopLongitude): self
    {
        $this->stopLongitude = $stopLongitude;

        return $this;
    }

    public function getStopPluscode(): ?string
    {
        return $this->stopPluscode;
    }

    public function setStopPluscode(?string $stopPluscode): self
    {
        $this->stopPluscode = $stopPluscode;

        return $this;
    }

    public function getDateCreatedStop(): ?\DateTimeInterface
    {
        return $this->dateCreatedStop;
    }

    public function setDateCreatedStop(\DateTimeInterface $dateCreatedStop): self
    {
        $this->dateCreatedStop = $dateCreatedStop;

        return $this;
    }

    public function getDateModifiedStop(): ?\DateTimeInterface
    {
        return $this->dateModifiedStop;
    }

    public function setDateModifiedStop(\DateTimeInterface $dateModifiedStop): self
    {
        $this->dateModifiedStop = $dateModifiedStop;

        return $this;
    }
}
