<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnseignementCompRepository")
 */
class EnseignementComp
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
    private $nom_enseignement_comp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\diplome")
     */
    private $diplome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEnseignementComp(): ?string
    {
        return $this->nom_enseignement_comp;
    }

    public function setNomEnseignementComp(string $nom_enseignement_comp): self
    {
        $this->nom_enseignement_comp = $nom_enseignement_comp;

        return $this;
    }

    public function getDiplome(): ?diplome
    {
        return $this->diplome;
    }

    public function setDiplome(?diplome $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }
}
