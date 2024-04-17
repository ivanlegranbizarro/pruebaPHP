<?php


enum RazasZ: string
{
  case Humano = 'Humano';
  case Androide = 'Androide';
  case Namekiano = 'Namekiano';
  case Superguerrer = 'Superguerrer';
  case FamiliaFreezer = 'FamiliaFreezer';
}

class Guerrero
{
  public function __construct(
    public string $nombre,
    public int $edad,
    public RazasZ $raza,
    public array $ataques
  ) {
  }

  public function ataqueMasFuerte(): string
  {
    $poderTotal = 0;
    foreach ($this->ataques as $nombre => $poder) {
      if ($poder > $poderTotal) {
        $poderTotal = $poder;
      }
    }
    return "El ataque {$nombre} es el más poderoso con {$poder} de poder";
  }


  public function __toString()
  {
    return $this->nombre;
  }
}


class ReinoZ
{

  static public array $guerrerosZ = [];

  static public function addGuerreros(Guerrero $guerrero): void
  {
    self::$guerrerosZ[] = $guerrero;
  }

  static public function recuentoGuerrerosZPorTipo(RazasZ $raza): array|string
  {
    $conteoPersonajeZeta = [];

    foreach (self::$guerrerosZ as $guerrero) {
      if ($guerrero->raza == $raza) {
        $razaActual = $guerrero->raza->value;
        if ($conteoPersonajeZeta[$razaActual]) {
          $conteoPersonajeZeta[$razaActual]++;
        } else {
          $conteoPersonajeZeta[$razaActual] = 1;
        }
      }
    }
    if (!empty($conteoPersonajeZeta)) {
      return $conteoPersonajeZeta;
    } else {
      return 'No hay guerreros de esa raza';
    }
  }
}

$guerrero1 = new Guerrero('Goku', 20, RazasZ::Humano, ['Ataque1' => 100, 'Ataque2' => 500]);


echo $guerrero1;

echo '<br>';

echo  $guerrero1->ataqueMasFuerte();

ReinoZ::addGuerreros($guerrero1);

echo '<br>';

echo ReinoZ::recuentoGuerrerosZPorTipo(RazasZ::Androide);
