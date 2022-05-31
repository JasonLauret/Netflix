<?php

namespace App\Entity;
use App\Entity\User;
use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $duree;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $movie;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'films')]
    private $genre;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $releaseYear;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $likeIt;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $dontLike;

    #[ORM\OneToMany(mappedBy: 'film', targetEntity: FilmLike::class)]
    private $likes;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getMovie(): ?string
    {
        return $this->movie;
    }

    public function setMovie(?string $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(?int $releaseYear): self
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getLikeIt(): ?int
    {
        return $this->likeIt;
    }

    public function setLikeIt(?int $likeIt): self
    {
        $this->likeIt = $likeIt;

        return $this;
    }

    public function getDontLike(): ?int
    {
        return $this->dontLike;
    }

    public function setDontLike(?int $dontLike): self
    {
        $this->dontLike = $dontLike;

        return $this;
    }

    /**
     * @return Collection<int, FilmLike>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(FilmLike $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setFilm($this);
        }

        return $this;
    }

    public function removeLike(FilmLike $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getFilm() === $this) {
                $like->setFilm(null);
            }
        }

        return $this;
    }
        
    /**
     * Permet de savoir si cet article est liké par un utilisateur
     *
     * @param  User $user
     * @return bool
     */
    public function isLikeByUsers (User $user) {
        foreach($this->likes as $like) {
            if ($like->getUser() === $user){
                return true;
            }else{
                return false;
            }
        }
    }
}
