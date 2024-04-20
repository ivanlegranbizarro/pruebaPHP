<?php
/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */

require_once 'RazasGuerrers.php';


class DBGuerreros
{
  public function __construct(public string $nombre, public int $edad, public RazasDeGuerrerosDelEspacioZeta $raza, public array $ataques)
  {
  }

  public function atacMesFort()
  {
    $poder = 0;
    foreach ($this->ataques as $nombreAtaque => $poderAtaque) {
      if ($poderAtaque > $poder) {
        $poder = $poderAtaque;
      }
    }
    return "El ataque más poderoso es $nombreAtaque con $poder de daño";
  }

  public function __toString(): string
  {
    return "$this->nombre";
  }
}


class PlanetaGuerrers
{
  public function __construct(public string $nombre, public array $guerreros = [])
  {
  }

  public function naceUnGuerrero(DBGuerreros $guerrero)
  {
    $this->guerreros[] = $guerrero;
  }

  public function recuentoPorRazasEnElPlaneta(): array
  {
    $razasDeGuerreros = [];
    if (!empty($this->guerreros)) {
      foreach ($this->guerreros as $guerrero) {
        $razaRecorridaAhora =  $guerrero->raza->value;
        if (isset($razasDeGuerreros[$razaRecorridaAhora])) {
          $razasDeGuerreros[$razaRecorridaAhora]++;
        } else {
          $razasDeGuerreros[$razaRecorridaAhora] = 1;
        }
      }
    }
    return $razasDeGuerreros;
  }
}


$a18 = new DBGuerreros('A18', 28, RazasDeGuerrerosDelEspacioZeta::Androide, ['TeReviento' => 500, 'TeRevientoPlus' => 700]);

echo $a18;

echo '<br>';

$planetaVegeta = new PlanetaGuerrers('Planeta Vegeta');

$planetaVegeta->naceUnGuerrero($a18);

print_r($planetaVegeta->recuentoPorRazasEnElPlaneta());
