<?php

namespace App\Entity;

use App\Repository\FilmLikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmLikeRepository::class)]
class FilmLike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Film::class, inversedBy: 'likes')]
    private $film;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'likes')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
