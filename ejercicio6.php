<?php

/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazaDBZ: string
{
  case Humano = 'Humano';
  case Namekiano = 'Namekiano';
  case SuperGuerrer = 'SuperGuerrer';
  case Androide = 'Androide';
  case DiosDeLaGuerra = 'DiosDeLaGuerra';
}

class GZ
{
  public function __construct(public string $nombre, public int $edad, public RazaDBZ $raza, public array $ataques)
  {
  }

  public function mayorPoder(): string
  {
    $poder = 0;
    foreach ($this->ataques as $nombreAtaque => $poderAtaque) {
      if ($poderAtaque > $poder) {
        $poder = $poderAtaque;
      }
    }
    return "El ataque más poderoso es $nombreAtaque con $poder de daños";
  }

  public function __toString(): string
  {
    return "Nombre: $this->nombre";
  }
}


class GZS
{
  static public array $guerrersAllistats = [];


  static public function allistarGuerrer(GZ $guerrer)
  {
    self::$guerrersAllistats[] = $guerrer;
  }

  static public function recompteGuerrersSegonsRaça(): array
  {
    if (!empty(self::$guerrersAllistats)) {
      $razasEncontradas = [];
      foreach (self::$guerrersAllistats as $guerrer) {
        $razaActual = $guerrer->raza->value;
        if (isset($razasEncontradas[$razaActual])) {
          $razasEncontradas[$razaActual]++;
        } else {
          $razasEncontradas[$razaActual] = 1;
        }
      }
      return $razasEncontradas;
    }
  }
}

$guerreroz = new GZ('Vegeta', 37, RazaDBZ::SuperGuerrer, ['Galic Attack' => 500, 'Final Flash' => 1000]);

echo $guerreroz;

echo '<br>';

GZS::allistarGuerrer($guerreroz);

echo '<br>';

print_r(GZS::recompteGuerrersSegonsRaça());
