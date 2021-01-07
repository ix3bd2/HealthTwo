<?php

namespace App\Entity;

use App\Repository\MedicijnenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnenRepository::class)
 */
class Medicijnen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255 )
     */
    private $naam;
    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $url;
    /**
     * @ORM\Column(type="text")
     */

    private $werking;

    /**
     * @ORM\Column(type="text")
     */
    private $bijwerking;

    /**
     * @ORM\Column(type="decimal",precision=8,scale=2)
     */
    private $prijs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verzekerd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }
    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
    public function getWerking(): ?string
    {
        return $this->werking;
    }

    public function setWerking(string $werking): self
    {
        $this->werking = $werking;

        return $this;
    }

    public function getBijwerking(): ?string
    {
        return $this->bijwerking;
    }

    public function setBijwerking(string $bijwerking): self
    {
        $this->bijwerking = $bijwerking;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(float $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getVerzekerd(): ?bool
    {
        return $this->verzekerd;
    }

    public function setVerzekerd(bool $verzekerd): self
    {
        $this->verzekerd = $verzekerd;

        return $this;
    }
}
