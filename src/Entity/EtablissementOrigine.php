<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtablissementOrigineRepository")
 */
class EtablissementOrigine
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
    private $nom_etablissement_origine;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eleves", mappedBy="etablissement_origine")
     */
    private $eleves;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissementOrigine(): ?string
    {
        return $this->nom_etablissement_origine;
    }

    public function setNomEtablissementOrigine(string $nom_etablissement_origine): self
    {
        $this->nom_etablissement_origine = $nom_etablissement_origine;

        return $this;
    }

    /**
     * @return Collection|Eleves[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleves $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->setEtablissementOrigine($this);
        }

        return $this;
    }

    public function removeElefe(Eleves $elefe): self
    {
        if ($this->eleves->contains($elefe)) {
            $this->eleves->removeElement($elefe);
            // set the owning side to null (unless already changed)
            if ($elefe->getEtablissementOrigine() === $this) {
                $elefe->setEtablissementOrigine(null);
            }
        }

        return $this;
    }
}
