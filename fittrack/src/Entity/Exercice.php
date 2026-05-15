<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
#[Vich\Uploadable]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    // Champ virtual (pas en BDD) : c est le fichier uploade
    #[Vich\UploadableField(mapping: 'exercice_image', fileNameProperty: 'imageFile')]
    private ?File $imageFileUpload = null;

    // Champ en BDD : stocke le nom du fichier
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageFile = null;

    // Necessaire pour que VichUploader detecte les changements
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, SeanceExercice>
     */
    #[ORM\OneToMany(targetEntity: SeanceExercice::class, mappedBy: 'exercice', orphanRemoval: true)]
    private Collection $seanceExercices;

    public function __construct()
    {
        $this->seanceExercices = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function setImageFileUpload(?File $file = null): void
    {
        $this->imageFileUpload = $file;
        if ($file) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFileUpload(): ?File
    {
        return $this->imageFileUpload;
    }

    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    public function setImageFile(?string $imageFile): static
    {
        $this->imageFile = $imageFile;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getSeanceExercices(): Collection
    {
        return $this->seanceExercices;
    }

    public function addSeanceExercice(SeanceExercice $seanceExercice): static
    {
        if (!$this->seanceExercices->contains($seanceExercice)) {
            $this->seanceExercices->add($seanceExercice);
            $seanceExercice->setExercice($this);
        }
        return $this;
    }

    public function removeSeanceExercice(SeanceExercice $seanceExercice): static
    {
        if ($this->seanceExercices->removeElement($seanceExercice)) {
            if ($seanceExercice->getExercice() === $this) {
                $seanceExercice->setExercice(null);
            }
        }
        return $this;
    }
}
