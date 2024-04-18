<?php

enum Raza: string
{
  case HUMANO = "humano";
  case SUPERGUERRERO = "superguerrero";
  case NAMEKIANO = "namekiano";
  case ANDROIDE = "androide";
}

class GuerreroZ
{
  private static $guerreros = [];

  private string $nombre;
  private Raza $raza;
  private string $tipo;
  private array $ataques;

  public function __construct(string $nombre, Raza $raza, string $tipo, array $ataques)
  {
    $this->nombre = $nombre;
    $this->raza = $raza;
    $this->tipo = $tipo;
    $this->ataques = $ataques;

    self::$guerreros[] = $this;
  }

  public function ataqueMasPoderoso(): array
  {
    $ataqueMasPoderoso = null;
    $poderMasAlto = 0;

    foreach ($this->ataques as $nombreAtaque => $poderAtaque) {
      if ($poderAtaque > $poderMasAlto) {
        $ataqueMasPoderoso = $nombreAtaque;
        $poderMasAlto = $poderAtaque;
      }
    }

    if ($ataqueMasPoderoso !== null) {
      return [$ataqueMasPoderoso, $poderMasAlto];
    } else {
      return []; // No hay ataques
    }
  }

  public static function cuantosPersonajesPorRaza(): array
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
    return "Nombre: $this->nombre\nRaza: $this->raza\nTipo: $this->tipo\nAtaques: " . print_r($this->ataques, true);
  }
}


$goku = new GuerreroZ("Goku", Raza::HUMANO, "Superpoder", ["Superpoder 1", "Superpoder 2", "Superpoder 3"]);
echo $goku;
