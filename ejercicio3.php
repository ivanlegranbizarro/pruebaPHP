<?php

/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazaDeGuerrer: string
{
  case Humano = 'Humano';
  case GuerrerEspai = 'GuerrerEspai';
  case Namekiano = 'Namekiano';
  case Androide = 'Androide';
  case DiosDeLaLucha = 'DiosDeLaLucha';
}

class GuerrerDelEspai
{

  public function __construct(public string $nombre, public int $edad, public RazaDeGuerrer $raza, public array $ataques)
  {
  }

  public function mostrarAtaqueMasFuerte(): string
  {
    $poderMayor = 0;

    foreach ($this->ataques as $nombre => $poderAtaque) {
      if ($poderAtaque > $poderMayor) {
        $poderMayor = $poderAtaque;
      }
    }
    return "El mayor ataque es {$nombre} y si daño es {$poderAtaque}";
  }

  public function __toString(): string
  {
    return $this->nombre;
  }
}

$goku = new GuerrerDelEspai('SonGoku', 35, RazaDeGuerrer::GuerrerEspai, ['KameHame' => 500, 'SuperKameHame' => 1000, 'BolaGenki' => 10000]);

echo $goku;

class PoblacionGuerrersZ
{

  static public array $poblacion = [];

  static public function reclutarGuerrero(GuerrerDelEspai $guerrer): void
  {
    self::$poblacion[] = $guerrer;
  }

  static public function recontarGuerreroSegunRaza(): array|string
  {
    if (!empty(self::$poblacion)) {
      $todasLasRazas = [];
      foreach (RazaDeGuerrer::cases() as $raza) {
        $todasLasRazas[$raza->value] = 0;
      }
      foreach (self::$poblacion as $guerrero) {
        $razaActual = $guerrero->raza->value;
        if ($todasLasRazas[$razaActual]) {
          $todasLasRazas[$razaActual]++;
        } else {
          $todasLasRazas[$razaActual] = 1;
        }
      }
      return $todasLasRazas;
    }
    return 'No hay guerreros en la población';
  }
}

PoblacionGuerrersZ::reclutarGuerrero($goku);

echo '<br>';

print_r(PoblacionGuerrersZ::recontarGuerreroSegunRaza());
