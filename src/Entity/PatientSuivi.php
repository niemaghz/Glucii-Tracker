<?php

namespace App\Entity;

use App\Repository\PatientSuiviRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientSuiviRepository::class)
 */
class PatientSuivi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="insuline")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\Column(type="float")
     */
    private $insuline;

    /**
     * @ORM\Column(type="float")
     */
    private $glucide;

    /**
     * @ORM\Column(type="float")
     */
    private $glycemie;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getInsuline(): ?float
    {
        return $this->insuline;
    }

    public function setInsuline(float $insuline): self
    {
        $this->insuline = $insuline;

        return $this;
    }

    public function getGlucide(): ?float
    {
        return $this->glucide;
    }

    public function setGlucide(float $glucide): self
    {
        $this->glucide = $glucide;

        return $this;
    }

    public function getGlycemie(): ?float
    {
        return $this->glycemie;
    }

    public function setGlycemie(float $glycemie): self
    {
        $this->glycemie = $glycemie;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
