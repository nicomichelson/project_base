<?php

namespace App\Entity\Backend;

use App\Repository\Backend\NoticiaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoticiaRepository::class)
 */
class Noticia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publicado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_publicacion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $volanta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bajada;

    /**
     * @ORM\Column(type="text")
     */
    private $desarrollo;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mostrar_titulo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mostrar_bajada;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mostrar_volanta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_video;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $destacada;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $principal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicado(): ?bool
    {
        return $this->publicado;
    }

    public function setPublicado(?bool $publicado): self
    {
        $this->publicado = $publicado;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fecha_publicacion;
    }

    public function setFechaPublicacion(?\DateTimeInterface $fecha_publicacion): self
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    public function getVolanta(): ?string
    {
        return $this->volanta;
    }

    public function setVolanta(?string $volanta): self
    {
        $this->volanta = $volanta;

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

    public function getBajada(): ?string
    {
        return $this->bajada;
    }

    public function setBajada(?string $bajada): self
    {
        $this->bajada = $bajada;

        return $this;
    }

    public function getDesarrollo(): ?string
    {
        return $this->desarrollo;
    }

    public function setDesarrollo(string $desarrollo): self
    {
        $this->desarrollo = $desarrollo;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getMostrarTitulo(): ?bool
    {
        return $this->mostrar_titulo;
    }

    public function setMostrarTitulo(bool $mostrar_titulo): self
    {
        $this->mostrar_titulo = $mostrar_titulo;

        return $this;
    }

    public function getMostrarBajada(): ?bool
    {
        return $this->mostrar_bajada;
    }

    public function setMostrarBajada(?bool $mostrar_bajada): self
    {
        $this->mostrar_bajada = $mostrar_bajada;

        return $this;
    }

    public function getMostrarVolanta(): ?bool
    {
        return $this->mostrar_volanta;
    }

    public function setMostrarVolanta(?bool $mostrar_volanta): self
    {
        $this->mostrar_volanta = $mostrar_volanta;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getUrlVideo(): ?string
    {
        return $this->url_video;
    }

    public function setUrlVideo(?string $url_video): self
    {
        $this->url_video = $url_video;

        return $this;
    }

    public function getDestacada(): ?string
    {
        return $this->destacada;
    }

    public function setDestacada(?string $destacada): self
    {
        $this->destacada = $destacada;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrincipal(): ?string
    {
        return $this->principal;
    }

    public function setPrincipal(?string $principal): self
    {
        $this->principal = $principal;

        return $this;
    }
}
