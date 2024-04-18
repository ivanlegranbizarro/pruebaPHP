<?php

/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazaDeGuerrersDelEspai: string
{
  case Humano = 'Humano';
  case Namekiano = 'Namekiano';
  case Superguerrers = 'Superguerrers';
  case Androides = 'Androides';
  case DiosesDeLaGuerra = 'DiosesDeLaGuerra';
}

class GuerreroDelEspacio
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public RazaDeGuerrersDelEspai $raza,
    public array $ataques
  ) {
  }

  public function atacMesFort(): string
  {
    $poder = 0;

    foreach ($this->ataques as $nombreDelAtaque => $poderDelAtaque) {
      if ($poderDelAtaque >  $poder) {
        $poder = $poderDelAtaque;
      }
    }
    return "El ataque $nombreDelAtaque es el más poderoso con $poder puntos de daño";
  }

  public function __toString()
  {
    return "El personaje se llama $this->nombre";
  }
}


$personaje1 = new GuerreroDelEspacio('Goku', 35, RazaDeGuerrersDelEspai::Superguerrers, ['Kame' => 500, 'SuperKame' => 1000, 'BolaGenki' => 10000]);


echo $personaje1;


class CensoDeGuerrsDelEspai
{
  static public array $censo = [];


  static public function allistamentDeGuerrer(GuerreroDelEspacio $guerrero): void
  {
    self::$censo[] = $guerrero;
  }

  static public function recompteDeGuerrersSegonsRaça(): array|string
  {
    if (!empty(self::$censo)) {
      $razasAlistados = [];
      foreach (self::$censo as $soldado) {
        $razaActual = $soldado->raza->value;
        if ($razasAlistados[$razaActual]) {
          $razasAlistados[$razaActual]++;
        } else {
          $razasAlistados[$razaActual] = 1;
        }
      }
      return $razasAlistados;
    }
    return 'No hay soldados alistados';
  }
}

echo $personaje1->atacMesFort();

echo '<br>';

CensoDeGuerrsDelEspai::allistamentDeGuerrer($personaje1);


print_r(CensoDeGuerrsDelEspai::recompteDeGuerrersSegonsRaça());
