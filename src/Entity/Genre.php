<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'genre', targetEntity: film::class)]
    private $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, film>
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(film $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
            $name->setGenre($this);
        }

        return $this;
    }

    public function removeName(film $name): self
    {
        if ($this->name->removeElement($name)) {
            // set the owning side to null (unless already changed)
            if ($name->getGenre() === $this) {
                $name->setGenre(null);
            }
        }

        return $this;
    }
}
