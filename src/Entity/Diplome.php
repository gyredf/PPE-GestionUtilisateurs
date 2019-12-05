<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomeRepository")
 */
class Diplome
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_diplome;

    /**
     * @ORM\Column(type="integer")
     */
    private $lv2_obligatoire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeFormation")
     */
    private $type_formation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nom_diplome;
    }

    public function setNomDiplome(string $nom_diplome): self
    {
        $this->nom_diplome = $nom_diplome;

        return $this;
    }

    public function getLv2Obligatoire(): ?int
    {
        return $this->lv2_obligatoire;
    }

    public function setLv2Obligatoire(int $lv2_obligatoire): self
    {
        $this->lv2_obligatoire = $lv2_obligatoire;

        return $this;
    }

    public function getTypeFormation(): ?TypeFormation
    {
        return $this->type_formation;
    }

    public function setTypeFormation(?TypeFormation $type_formation): self
    {
        $this->type_formation = $type_formation;

        return $this;
    }
}
