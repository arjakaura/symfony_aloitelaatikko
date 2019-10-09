<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AloiteRepository")
 */
class Aloite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $aihe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kuvaus;

    /**
     * @ORM\Column(type="date")
     */
    private $kirjauspaiva;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nimi;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sahkoposti;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAihe(): ?string
    {
        return $this->aihe;
    }

    public function setAihe(string $aihe): self
    {
        $this->aihe = $aihe;

        return $this;
    }

    public function getKuvaus(): ?string
    {
        return $this->kuvaus;
    }

    public function setKuvaus(string $kuvaus): self
    {
        $this->kuvaus = $kuvaus;

        return $this;
    }

    public function getKirjauspaiva(): ?\DateTimeInterface
    {
        return $this->kirjauspaiva;
    }

    public function setKirjauspaiva(\DateTimeInterface $kirjauspaiva): self
    {
        $this->kirjauspaiva = $kirjauspaiva;

        return $this;
    }

    public function getNimi(): ?string
    {
        return $this->nimi;
    }

    public function setNimi(string $nimi): self
    {
        $this->nimi = $nimi;

        return $this;
    }

    public function getSahkoposti(): ?string
    {
        return $this->sahkoposti;
    }

    public function setSahkoposti(string $sahkoposti): self
    {
        $this->sahkoposti = $sahkoposti;

        return $this;
    }
}
