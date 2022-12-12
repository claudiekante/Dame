<?php

namespace App\Entity;

use App\Repository\StopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Leg::class, mappedBy="startStop")
     */
    private $legStart;

    /**
     * @ORM\OneToMany(targetEntity=Leg::class, mappedBy="endStop")
     */
    private $legEnd;

    public function __construct()
    {
        $this->legStart = new ArrayCollection();
        $this->legEnd = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Leg>
     */
    public function getLegStart(): Collection
    {
        return $this->legStart;
    }

    public function addLegStart(Leg $legStart): self
    {
        if (!$this->legStart->contains($legStart)) {
            $this->legStart[] = $legStart;
            $legStart->setStartStop($this);
        }

        return $this;
    }

    public function removeLegStart(Leg $legStart): self
    {
        if ($this->legStart->removeElement($legStart)) {
            // set the owning side to null (unless already changed)
            if ($legStart->getStartStop() === $this) {
                $legStart->setStartStop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Leg>
     */
    public function getLegEnd(): Collection
    {
        return $this->legEnd;
    }

    public function addLegEnd(Leg $legEnd): self
    {
        if (!$this->legEnd->contains($legEnd)) {
            $this->legEnd[] = $legEnd;
            $legEnd->setEndStop($this);
        }

        return $this;
    }

    public function removeLegEnd(Leg $legEnd): self
    {
        if ($this->legEnd->removeElement($legEnd)) {
            // set the owning side to null (unless already changed)
            if ($legEnd->getEndStop() === $this) {
                $legEnd->setEndStop(null);
            }
        }

        return $this;
    }
}
