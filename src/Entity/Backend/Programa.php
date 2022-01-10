<?php

namespace App\Entity\Backend;

use App\Repository\Backend\ProgramaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * @ORM\Entity(repositoryClass=ProgramaRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Programa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resumen;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="programa_images", fileNameProperty="image")
     * @Assert\Image(
     *     maxSize = "2M",
     *     mimeTypes={"image/jpeg", "image/png"}
     * )
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horario;

    /**
     * @ORM\Column(type="integer")
     */
    private $orden;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Capitulo::class, mappedBy="programa", cascade={"persist", "remove"})
     */
    private $capitulos;

    public function __construct()
    {
        $this->capitulos = new ArrayCollection();
    }
    public function __toString() {

        if(is_null($this->getTitulo())){
            return 'NULL';
        }
        return $this->getTitulo();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getResumen(): ?string
    {
        return $this->resumen;
    }

    public function setResumen(?string $resumen): self
    {
        $this->resumen = $resumen;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getFechaModificacion(): ?\DateTimeInterface
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(?\DateTimeInterface $fechaModificacion): self
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    public function getHorario(): ?string
    {
        return $this->horario;
    }

    public function setHorario(string $horario): self
    {
        $this->horario = $horario;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

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

    /**
     * @return Collection|Capitulo[]
     */
    public function getCapitulos(): Collection
    {
        return $this->capitulos;
    }

    public function addCapitulo(Capitulo $capitulo): self
    {
        if (!$this->capitulos->contains($capitulo)) {
            $this->capitulos[] = $capitulo;
            $capitulo->setPrograma($this);
        }

        return $this;
    }

    public function removeCapitulo(Capitulo $capitulo): self
    {
        if ($this->capitulos->removeElement($capitulo)) {
            // set the owning side to null (unless already changed)
            if ($capitulo->getPrograma() === $this) {
                $capitulo->setPrograma(null);
            }
        }

        return $this;
    }
}
