<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeFormationRepository")
 */
class TypeFormation
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
    private $nom_type_formation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeFormation(): ?string
    {
        return $this->nom_type_formation;
    }

    public function setNomTypeFormation(string $nom_type_formation): self
    {
        $this->nom_type_formation = $nom_type_formation;

        return $this;
    }
}
