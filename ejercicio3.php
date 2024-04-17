<?php


enum Raza: string
{
  case Humano = "Humano";
  case Namekiano = "Namekiano";
  case Superguerrer = "Superguerrer";
  case Androide = "Androide";
}

class GuerreroZ
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public Raza $raza,
    public array $ataques
  ) {
  }

  public function mostrarAtaqueMasFuerte(): string
  {
    $poderMax = 0;

    foreach ($this->ataques as $nombre => $poder) {
      if ($poder > $poderMax) {
        $poderMax = $poder;
      }
    }
    return  "El ataque más fuerte es: $nombre con un poder de $poderMax";
  }

  public function __toString(): string
  {
    return $this->nombre;
  }
}

class PlanetaVegeta
{
  static public array $poblacionZ = [];

  static public function registrarGuerrero(GuerreroZ $guerrero): void
  {
    self::$poblacionZ[] = $guerrero;
  }

  static public function recuentoGuerrerosPorRaza(Raza $raza): array
  {
    $conteoPersonajes = [];
    foreach (self::$poblacionZ as $guerrero) {
      if ($guerrero->raza == $raza) {
        $razaActual = $guerrero->raza->value;
        if ($conteoPersonajes[$razaActual]) {
          $conteoPersonajes[$razaActual]++;
        } else {
          $conteoPersonajes[$razaActual] = 1;
        }
      }
    }
    return $conteoPersonajes;
  }
}


$goku = new GuerreroZ("Goku", 17, Raza::Humano, ["KameHame" => 100, "SuperKameHame" => 500]);

$vegeta = new GuerreroZ("Vegeta", 17, Raza::Humano, ["CanoGarlick" => 100, "FinalFlash" => 500]);
echo $goku;

echo '<br>';

echo $goku->mostrarAtaqueMasFuerte();

echo PlanetaVegeta::registrarGuerrero($goku);
echo PlanetaVegeta::registrarGuerrero($vegeta);

echo '<br>';

print_r(PlanetaVegeta::recuentoGuerrerosPorRaza(Raza::Humano));
