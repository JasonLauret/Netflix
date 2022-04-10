<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++){
            $film = new Film();
            $film->setTitre("Film n°$i")
                    ->setDescription("Description du film n°$i")
                    ->setImage("https://via.placeholder.com/200x250")
                    ->setDuree("2h00");
            $manager->persist($film);
        }
        $manager->flush();
    }
}
