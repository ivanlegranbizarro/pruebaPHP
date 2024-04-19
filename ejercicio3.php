<?php
/* Crear guerrero zeta con nombre, edad, raza, ataques.
1) Un método para que cada personaje devuelva su ataque más fuerte
2) Un método para que se recuenten los guerreros según su raza */


enum RazasGT: string
{
  case Humano = 'Humano';
  case Namekiano = 'Namekiano';
  case Androide = 'Androide';
  case SuperGuerrer = 'SuperGuerrer';
}

class GuerrerosGT
{
  public function __construct(public string $nombre, public int $edad, public RazasGT $raza, public array $ataques)
  {
  }

  public function atacMesPoderos(): string
  {
    $poder = 0;
    foreach ($this->ataques as $nomAtac => $poderAtac) {
      if ($poderAtac > $poder) {
        $poder = $poderAtac;
      }
    }
    return "El nombre del ataque es $nomAtac y su poder es $poder de daño";
  }

  public function __toString(): string
  {
    return "El guerrero se llama $this->nombre";
  }
}
class PlanetaDeGuerrers
{

  public function __construct(public string $nombre, public array $guerrerosDelPlaneta = [])
  {
  }

  public function enregistrarGuerrer(GuerrerosGT $guerrero): void
  {
    $this->guerrerosDelPlaneta[] = $guerrero;
  }

  public function contarRazasDeGuerreros(): array
  {
    $razaDeGuerreros = [];

    foreach (RazasGT::cases() as $razas) {
      $razaDeGuerreros[$razas->value] = 0;
    }

    foreach ($this->guerrerosDelPlaneta as $guerrero) {
      $razaActual = $guerrero->raza->value;
      if (isset($razaDeGuerreros[$razaActual])) {
        $razaDeGuerreros[$razaActual]++;
      }
    }

    return $razaDeGuerreros;
  }
}

$vegeta = new GuerrerosGT('Vegeta', 37, RazasGT::SuperGuerrer, ['Cano Galick' => 500, 'Final Flash' => 900]);

$reyVegeta = new GuerrerosGT('Rey Vegeta', 57, RazasGT::SuperGuerrer, ['Cano Galick' => 500, 'Final Flash' => 900]);

echo $vegeta;

echo '<br>';

echo $vegeta->atacMesPoderos();

echo '<br>';

$planeta1 = new PlanetaDeGuerrers('Planeta Vegeta');

$planeta1->enregistrarGuerrer($vegeta);
$planeta1->enregistrarGuerrer($reyVegeta);


print_r($planeta1->contarRazasDeGuerreros());
