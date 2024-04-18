<?php

/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazaGuererosZ: string
{
  case Humano = 'Humano';
  case Namekiano = 'Namekiano';
  case SuperGuerrer = 'SuperGuerrer';
  case Androide = 'Androide';
  case DiosDeLaDestruccion = 'DiosDeLaDestruccion';
}


class SoldatZ
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public RazaGuererosZ $raza,
    public array $ataques
  ) {
  }

  public function retornarAtacMesFort(): string
  {
    $poder = 0;
    foreach ($this->ataques as $nombre => $poderAtaque) {
      if ($poderAtaque > $poder) {
        $poder = $poderAtaque;
      }
    }
    return "El ataque $nombre es el más poderoso con $poder de daño";
  }

  public function __toString(): string
  {
    return "El nom del soldat és $this->nombre";
  }
}


$guerrer1 = new SoldatZ('Goku', 35, RazaGuererosZ::SuperGuerrer, ['Kame' => 500, 'SuperKame' => 1000, 'BolaGenki' => 10000]);


echo $guerrer1;


class PoblacioSoldats
{
  static public array $soldatsAllistats = [];

  static public function allistarSoldat(SoldatZ $soldat): void
  {
    self::$soldatsAllistats[] = $soldat;
  }

  static public function recuentoRazaSegunSoldadosAlistados(): array
  {
    $conteoPersonajes = [];
    foreach (self::$soldatsAllistats as $soldat) {
      $razaActual = $soldat->raza->value;
      if ($conteoPersonajes[$razaActual]) {
        $conteoPersonajes[$razaActual]++;
      } else {
        $conteoPersonajes[$razaActual] = 1;
      }
    }
    return $conteoPersonajes;
  }
}


PoblacioSoldats::allistarSoldat($guerrer1);

echo '<br>';

print_r(PoblacioSoldats::recuentoRazaSegunSoldadosAlistados());
