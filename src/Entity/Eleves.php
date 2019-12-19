<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElevesRepository")
 */
class Eleves
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $lv2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remarque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $amenagement_pedagogique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EtablissementOrigine", inversedBy="eleves")
     */
    private $etablissement_origine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classe", inversedBy="eleves")
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnseignementComp", inversedBy="eleves")
     */
    private $enseignement_comp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getLv2(): ?string
    {
        return $this->lv2;
    }

    public function setLv2(?string $lv2): self
    {
        $this->lv2 = $lv2;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getAmenagementPedagogique(): ?string
    {
        return $this->amenagement_pedagogique;
    }

    public function setAmenagementPedagogique(?string $amenagement_pedagogique): self
    {
        $this->amenagement_pedagogique = $amenagement_pedagogique;

        return $this;
    }

    public function getEtablissementOrigine(): ?EtablissementOrigine
    {
        return $this->etablissement_origine;
    }

    public function setEtablissementOrigine(?EtablissementOrigine $etablissement_origine): self
    {
        $this->etablissement_origine = $etablissement_origine;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getEnseignementComp(): ?EnseignementComp
    {
        return $this->enseignement_comp;
    }

    public function setEnseignementComp(?EnseignementComp $enseignement_comp): self
    {
        $this->enseignement_comp = $enseignement_comp;

        return $this;
    }
}
