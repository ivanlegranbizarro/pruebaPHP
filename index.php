<?php

enum Raza: string
{
  case SUPERGUERRERO = "superguerrero";
  case HUMANO = "humano";
  case ANDROIDE = "androide";
  case NAMEKIANO = "namekiano";
}

class GuerreroZ
{
  private static $guerreros = [];


  public function __construct(private string $nombre, private int $edad, private array $ataques, private Raza $raza)
  {

    self::$guerreros[] = $this;
  }

  public function ataqueMasPoderoso(): string
  {
    return max(array_map(function ($nombre, $valor) {
      return "$nombre:$valor";
    }, $this->ataques));
  }

  static public function cuantosPersonajesPorRaza(): array
  {
    $conteoPersonajes = [];
    foreach (self::$guerreros as $guerrero) {
      $razaActual = $guerrero->raza->value;
      if ($conteoPersonajes[$razaActual]) {
        $conteoPersonajes[$razaActual]++;
      } else {
        $conteoPersonajes[$razaActual] = 1;
      }
    }
    return $conteoPersonajes;
  }

  public function __toString(): string
  {
    return "Nombre: $this->nombre\nEdad: $this->edad";
  }
}


$goku = new GuerreroZ("Goku", 24, ["kamehameha", "kamehameha", "kamehameha", "kamehameha", "kamehameha"], Raza::HUMANO);

echo $goku;

echo '<br>';

$corpetit = new GuerreroZ('CorPetit', 400, ['QueTeMatoNiño' => 1000], Raza::NAMEKIANO);


$corpegran = new GuerreroZ('CorGran', 400, ['QueTeMatoNiño' => 1000], Raza::NAMEKIANO);

print_r(GuerreroZ::cuantosPersonajesPorRaza());
