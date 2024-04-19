<?php

/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazaGuerreros: string
{
  case Humano = 'Humano';
  case Namekiano = 'Namekiano';
  case Androide = 'Androide';
  case SuperGuerrer = 'SuperGuerrer';
}

class GuerrerosDeDragonBallZeta
{

  public function __construct(public string $nombre, public int $edad, public RazaGuerreros $raza, public array $ataques)
  {
  }

  public function ataqueMasPoderoso(): string
  {
    $poder = 0;
    foreach ($this->ataques as $nombreAtaque => $poderAtaque) {
      if ($poderAtaque > $poder) {
        $poder = $poderAtaque;
      }
    }
    return "El ataque más poderoso es $nombreAtaque con $poder de daño";
  }

  public function __toString()
  {
    return "El nombre del personaje es: $this->nombre";
  }
}


$goku = new GuerrerosDeDragonBallZeta('Goku', 35, RazaGuerreros::SuperGuerrer, ['KameHame' => 500, 'SuperKameHame' => 1000, 'BolaGenki' => 10000]);


echo $goku;

echo '<br>';

echo $goku->ataqueMasPoderoso();


class ReclutasZ
{

  static array $reclutas = [];

  static public function addRecluta(GuerrerosDeDragonBallZeta $guerrero): void
  {
    self::$reclutas[] = $guerrero;
  }

  static public function recuentoPorRazasReclutadas(): array|string
  {
    if (!empty(self::$reclutas)) {
      $razasReclutadas = [];
      foreach (self::$reclutas as $recluta) {
        $razaActual = $recluta->raza->value;
        if ($razasReclutadas[$razaActual]) {
          $razasReclutadas[$razaActual]++;
        } else {
          $razasReclutadas[$razaActual] = 1;
        }
      }
      return $razasReclutadas;
    }

    return 'Lo sentimos, aún no hay reclutas';
  }
}


ReclutasZ::addRecluta($goku);

echo '<br>';

print_r(ReclutasZ::recuentoPorRazasReclutadas());
