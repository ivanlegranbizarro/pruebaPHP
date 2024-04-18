<?php

/* 1. $color = matriz('blanco', 'verde', 'rojo', 'azul', 'negro');
Escriba un guión que muestre la siguiente cadena:
"El recuerdo de esa escena para mí es como un cuadro de película congelado para siempre en ese momento: la alfombra roja, el césped verde, la casa blanca, el cielo plomizo. El nuevo presidente y su primera dama. - Richard M. Nixon"
y las palabras 'rojo', 'verde' y 'blanco' provendrán de $color. */


$color = ['blanco', 'verde', 'rojo', 'azul', 'negro'];

$guion = "El recuerdo de esa escena para mí es como un cuadro de película congelado para siempre en ese momento: la alfombra $color[2], el césped $color[1], la casa $color[0], el cielo plomizo. El nuevo presidente y su primera dama. - Richard M. Nixon";


echo $guion;

$ceu = array("Italia" => "Roma", "Luxemburgo" => "Luxemburgo", "Bélgica" => "Bruselas", "Dinamarca" => "Copenhague", "Finlandia" => "Helsinki ", "Francia" => "París", "Eslovaquia" => "Bratislava", "Eslovenia" => "Ljubljana", "Alemania" => "Berlín", "Grecia" => "Atenas", "Irlanda" => "Dublín", "Países Bajos" => "Ámsterdam", "Portugal" => "Lisboa", "España" => "Madrid", "Suecia" => "Estocolmo", "Reino Unido" => "Londres ", "Chipre" => "Nicosia", "Lituania" => "Vilnius", "República Checa" => "Praga", "Estonia" => "Tallin", "Hungría" => "Budapest", "Letonia " => "Riga", "Malta" => "Valetta", "Austria" => "Viena", "Polonia" => "Varsovia");

asort($ceu);

foreach ($ceu as $pais => $capital) {
  echo "La capital de $pais es $capital" . '<br>';
}

/* 4. $x = matriz(1, 2, 3, 4, 5);
Elimine un elemento de la matriz PHP anterior. Después de eliminar el elemento, las claves enteras deben normalizarse. */

$x = [1, 2, 3, 4, 5];

unset($x[2]);

print_r($x);

echo '<br>';

$x = array_values($x);

print_r($x);
