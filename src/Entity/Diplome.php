<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeFormation", inversedBy="diplomes")
     */
    private $type_formation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Classe", mappedBy="diplome")
     */
    private $classes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EnseignementComp", mappedBy="diplome")
     */
    private $enseignementComps;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->enseignementComps = new ArrayCollection();
    }

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

    /**
     * @return Collection|Classe[]
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
            $class->setDiplome($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        if ($this->classes->contains($class)) {
            $this->classes->removeElement($class);
            // set the owning side to null (unless already changed)
            if ($class->getDiplome() === $this) {
                $class->setDiplome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EnseignementComp[]
     */
    public function getEnseignementComps(): Collection
    {
        return $this->enseignementComps;
    }

    public function addEnseignementComp(EnseignementComp $enseignementComp): self
    {
        if (!$this->enseignementComps->contains($enseignementComp)) {
            $this->enseignementComps[] = $enseignementComp;
            $enseignementComp->setDiplome($this);
        }

        return $this;
    }

    public function removeEnseignementComp(EnseignementComp $enseignementComp): self
    {
        if ($this->enseignementComps->contains($enseignementComp)) {
            $this->enseignementComps->removeElement($enseignementComp);
            // set the owning side to null (unless already changed)
            if ($enseignementComp->getDiplome() === $this) {
                $enseignementComp->setDiplome(null);
            }
        }

        return $this;
    }
}
