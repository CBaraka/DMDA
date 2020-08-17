<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
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
    private $pseudo;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    private $email;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    private $contenu;
    
    /**
    * @ORM\Column(type="boolean")
    */
    private $actif = false;
    
    /**
    * @ORM\Column(type="boolean")
    */
    private $rgpd = false;
    
    /**
    * @ORM\Column(type="datetime", nullable=true)
    */
    private $created_at;
    
    public function getId(): ?int
    {
    return $this->id;
    }
    
    public function getPseudo(): ?string
    {
    return $this->pseudo;
    }
    
    public function setPseudo(string $pseudo)
    {
    $this->pseudo = $pseudo;
    
    return $this;
    }
    
    public function getEmail(): ?string
    {
    return $this->email;
    }
    
    public function setEmail(string $email): self
    {
    $this->email = $email;
    
    return $this;
    }
    
    public function getContenu(): ?string
    {
    return $this->contenu;
    }
    
    public function setContenu(string $contenu): self
    {
    $this->contenu = $contenu;
    
    return $this;
    }
    
    public function getActif(): ?bool
    {
    return $this->actif;
    }
    
    public function setActif(bool $actif): self
    {
    $this->actif = $actif;
    
    return $this;
    }
    
    public function getRgpd(): ?bool
    {
    return $this->rgpd;
    }
    
    public function setRgpd(bool $rgpd): self
    {
    $this->rgpd = $rgpd;
    
    return $this;
    }
    
    public function getCreatedAt(): ?\DateTimeInterface
    {
    return $this->created_at;
    }
    
    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
    $this->created_at = $created_at;
    return $this;
    }
}
