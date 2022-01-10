<?php

namespace App\Entity\Backend;

use App\Repository\Backend\CapituloRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CapituloRepository::class)
 * @ORM\Table(name="capitulo")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Capitulo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nroCapitulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $video;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publicado;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Programa::class, inversedBy="capitulos")
     * @ORM\JoinColumn(name="programa_id", referencedColumnName="id")
     */
    private $programa;

    public function __toString() {
        return $this->titulo;
    } 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNroCapitulo(): ?int
    {
        return $this->nroCapitulo;
    }

    public function setNroCapitulo(int $nroCapitulo): self
    {
        $this->nroCapitulo = $nroCapitulo;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getPublicado(): ?bool
    {
        return $this->publicado;
    }

    public function setPublicado(bool $publicado): self
    {
        $this->publicado = $publicado;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

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

    public function getPrograma(): ?Programa
    {
        return $this->programa;
    }

    public function setPrograma(?Programa $programa): self
    {
        $this->programa = $programa;

        return $this;
    }
}
