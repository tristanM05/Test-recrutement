<?php

declare(strict_types=1);


namespace App;


class Movie
{
    public const CHILDREN = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private string $title;
    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $code)
    {
        return $this->priceCode = $code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

// 3 constantes CHILDREN, REGULAR et NEW_RELEASE qui représentent les différents codes de prix possibles pour un film
// une propriété title qui enregistre le titre du film
// une propriété priceCode qui enregistre le code de prix du film
// un constructeur __construct qui prend en paramètre le titre et le code de prix d'un film et qui les enregistre dans l'objet
// une méthode getPriceCode qui renvoie le code de prix du film
// une méthode setPriceCode qui permet de définir le code de prix d'un film
// une méthode getTitle qui renvoie le titre du film.

//piste d'amélioration

// créé la fonction getAmountDue dans la classe Movie au lieu du controller pour n epas le surcharger.

// <?php

// declare(strict_types=1);

// namespace App;

// class Movie
// {
//     public const CHILDREN = 2;
//     public const REGULAR = 0;
//     public const NEW_RELEASE = 1;

//     private string $title;
//     private int $priceCode;

//     public function __construct(string $title, int $priceCode)
//     {
//         $this->title = $title;
//         $this->priceCode = $priceCode;
//     }

//     public function getPriceCode(): int
//     {
//         return $this->priceCode;
//     }

//     public function setPriceCode(int $code): void
//     {
//         $this->priceCode = $code;
//     }

//     public function getTitle(): string
//     {
//         return $this->title;
//     }

//     public function getAmountDue(int $daysRented): float
//     {
//         $amount = 0.0;

//         switch ($this->priceCode) {
//             case self::REGULAR:
//                 $amount += 2;
//                 if ($daysRented > 2) {
//                     $amount += ($daysRented - 2) * 1.5;
//                 }
//                 break;
//             case self::NEW_RELEASE:
//                 $amount += $daysRented * 3;
//                 break;
//             case self::CHILDREN:
//                 $amount += 1.5;
//                 if ($daysRented > 3) {
//                     $amount += ($daysRented - 3) * 1.5;
//                 }
//                 break;
//         }

//         return $amount;
//     }
// }
