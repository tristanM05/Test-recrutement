<?php

declare(strict_types=1);


namespace App;


class Rental
{
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    private Movie $movie;
    private int $daysRented;
}

// un constructeur __construct qui prend en paramètre un objet Movie et un entier représentant le nombre de jours de location, et qui les enregistre dans l'objet
// une méthode getDaysRented qui renvoie le nombre de jours de location
// une méthode getMovie qui renvoie l'objet Movie associé à la location
// une propriété movie qui enregistre l'objet Movie associé à la location
// une propriété daysRented qui enregistre le nombre de jours de location.