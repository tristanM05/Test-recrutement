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