<?php

namespace App\Entity\Backend;

use App\Repository\Backend\NoticiaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoticiaRepository::class)
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(type="date", nullable=true)
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
    private $created_at;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
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
     * @Vich\UploadableField(mapping="noticia_images", fileNameProperty="imagen")
     *
     * @var File|null
     * 
     * @Assert\Image(
     *     maxSize = "20M",
     *     mimeTypes={"image/jpeg", "image/png","image/gif"}
     * )
     */
    private $imageFile;

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

    /**
     * @ORM\OneToMany(targetEntity=Documento::class, mappedBy="noticia", mappedBy="noticia", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $documentos;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="noticias")
     * @ORM\JoinTable(name="tags_x_noticias",
     *      joinColumns={@ORM\JoinColumn(name="noticia_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo_noticia;

   

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime();
    }

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

     /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTimeImmutable();
        }

        return $this;
    }
   /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
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

    /**
     * @return Collection|Documento[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Documento $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setNoticia($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->removeElement($documento)) {
            // set the owning side to null (unless already changed)
            if ($documento->getNoticia() === $this) {
                $documento->setNoticia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    public function getTipoNoticia(): ?string
    {
        return $this->tipo_noticia;
    }

    public function setTipoNoticia(string $tipo_noticia): self
    {
        $this->tipo_noticia = $tipo_noticia;

        return $this;
    }
}
