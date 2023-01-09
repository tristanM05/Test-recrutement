<?php

function convertSize($bytes, $precision = 2) {
  $kilobytes = $bytes / 1024;

  if ($kilobytes < 1024) {
    return round($bytes, $precision) . ' KB';
  }

  $megabytes = $kilobytes / 1024;

  if ($megabytes < 1024) {
    return round($megabytes, $precision) . ' MB';
  }

  $gigabytes = $megabytes / 1024;

  if ($gigabytes < 1024) {
    return round($gigabytes, $precision) . ' GB';
  }

  $terabytes = $gigabytes / 1024;

  if ($terabytes < 1024) {
    return round($terabytes, $precision) . ' TB';
  }

  $petabytes = $terabytes / 1024;

  if ($petabytes < 1024) {
    return round($petabytes, $precision) . ' TB';
  }

  $exabytes = $petabytes / 1024;

  if ($exabytes < 1024) {
    return round($exabytes, $precision) . ' EB';
  }

  $zettabytes = $exabytes / 1024;

  if ($zettabytes < 1024) {
    return round($zettabytes, $precision) . ' ZB';
  }

  $yottabytes = $zettabytes / 1024;

  if ($yottabytes < 1024) {
    return round($yottabytes, $precision) . ' ZB';
  }

  $hellabyte = $yottabytes / 1024;

  if ($hellabyte < 1024) {
    return round($hellabyte, $precision) . ' HB';
  }
  
  return $bytes . ' B';
}


// Le code contient une fonction PHP appelée "convertSize" qui prend en paramètre un nombre de bytes et une précision. La fonction convertit 
// ces bytes en kilobytes, mégabytes, gigabytes, terabytes, petabytes, exabytes, zettabytes, yottabytes ou hellabytes (unités de stockage de données) en fonction de 
// leur taille, et renvoie le résultat sous forme de chaîne de caractères avec l'unité appropriée. Si aucune conversion n'est possible, la fonction renvoie 
// le nombre de bytes avec l'unité "B". La précision spécifiée détermine le nombre de chiffres significatifs à afficher après la virgule pour chaque unité.
// En conclusion cette fonction permet de convertir des bytes en une unité de stockage de données plus lisible pour l'utilisateur.

// Piste d'optimisation:

//1. Utilisez la notation de la puissance de 2 plutôt que de diviser et de multiplier par 1024 pour convertir les tailles de fichiers. Par exemple,
// utilisez $kilobytes = $bytes / pow(2, 10) au lieu de $kilobytes = $bytes / 1024. Cela rend le code plus facile à lire et à comprendre.

//2. Utilisez un tableau associatif pour associer les préfixes (KB, MB, GB, etc.) aux tailles de fichiers. Cela rend le code plus facile à mettre à jour et à maintenir, 
//car vous n'avez pas à ajouter de nouvelles lignes de code chaque fois que vous voulez ajouter un nouveau préfixe. 

//3. Utilisez un seul return à la fin de la fonction plutôt que plusieurs return dispersés dans le code. Cela rend le code plus facile à lire et à comprendre.

// <?php

// function convertSize($bytes, $precision = 2) {
//   if (!is_int($bytes) || $bytes < 0) {
//     return '';
//   }

//   $prefixes = [
//     'B'  => 0,
//     'KB' => 10,
//     'MB' => 20,
//     'GB' => 30,
//     'TB' => 40,
//     'PB' => 50,
//     'EB' => 60,
//     'ZB' => 70,
//     'YB' => 80,
//   ];

//   foreach ($prefixes as $prefix => $exponent) {
//     if ($bytes < pow(2, $exponent)) {
//       break;
//     }
//   }

//   return number_format($bytes / pow(2, $exponent), $precision, '.', '') . ' ' . $prefix;
// }