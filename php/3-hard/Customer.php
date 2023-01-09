<?php

declare(strict_types=1);


namespace App;


class Customer
{
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $each){
           $thisAmount = 0.0;

           /* @var $each Rental */
           // determines the amount for each line
           switch($each->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if($each->getDaysRented() > 2)
                       $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $each->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if($each->getDaysRented() > 3) {
                       $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    private string $name;
    private array $rentals = [];
}

// Ce code définit une classe "Customer" qui représente un client de location de films. La classe possède plusieurs méthodes :

// "__construct" qui prend en paramètre un nom de client et qui l'enregistre dans l'objet

// "addRental" qui permet d'ajouter une location à la liste des locations du client

// "getName" qui renvoie le nom du client

// "statement" qui génère un relevé de location pour le client en question.
// La méthode statement calcule le montant total dû par le client en fonction des locations qu'il a effectuées. 
// Elle calcule également le nombre de points de fidélité que le client a gagné en fonction de ses locations. Le relevé de location est retourné sous forme de chaîne de caractères.

// La classe "Customer" possède également deux propriétés :

// "name" qui enregistre le nom du client
// "rentals" qui est un tableau vide qui stockera les locations du client.
// La classe Customer utilise également la classe "Rental (Rental.php)", qui est responsable de représenter une location de film. Cette classe est utilisée dans la
// méthode addRental et dans la méthode statement pour accéder aux détails de chaque location.

// Enfin, la classe "Movie (Movie.php)" est également utilisée dans la méthode statement pour accéder au code de prix d'un film et pour calculer le montant dû pour chaque location.


// Piste d'optimisation

//1. diminution du code dans le controller après avoir déplacer la logique getAmountDue dans les class movie et rental


// class Customer
// {
//     public function __construct(string $name)
//     {
//         $this->name = $name;
//     }

//     public function addRental(Rental $rental): void
//     {
//         $this->rentals[] = $rental;
//     }

//     public function getName(): string
//     {
//         return $this->name;
//     }

//     public function statement(): string
//     {
//         $totalAmount = 0.0;
//         $frequentRenterPoints = 0;
//         $result = "Rental Record for " . $this->getName() . "\n";

//         foreach ($this->rentals as $rental) {
//             $thisAmount = $rental->getAmountDue();

//             $frequentRenterPoints++;

//             if ($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE
//                 && $rental->getDaysRented() > 1) {
//                 $frequentRenterPoints++;
//             }

//             $result .= "\t" . $rental->getMovie->getTitle() . "\t" . number_format($thisAmount, 1) . "\n";
//             $totalAmount += $thisAmount;
//         }

//         $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
//         $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

//         return $result;
//     }

//     private string $name;
//     private array $rentals = [];
// }

