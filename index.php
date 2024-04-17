<?php


enum RazaDBZ
{
  case Humano;
  case Namekiano;
  case Androide;
  case Dios;
  case SuperGuerrer;
}

class PersonajeDBZ
{

  static array $personajes = [];

  public function __construct(
    private string $nombre,
    private int $edad,
    private RazaDBZ $raza,
    private array $ataques
  ) {
    self::$personajes[] = $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre(): string
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   */
  public function setNombre(string $nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of edad
   */
  public function getEdad(): int
  {
    return $this->edad;
  }

  /**
   * Set the value of edad
   */
  public function setEdad(int $edad): self
  {
    $this->edad = $edad;

    return $this;
  }

  /**
   * Get the value of raza
   */
  public function getRaza(): RazaDBZ
  {
    return $this->raza;
  }

  /**
   * Set the value of raza
   */
  public function setRaza(RazaDBZ $raza): self
  {
    $this->raza = $raza;

    return $this;
  }

  /**
   * Get the value of ataques
   */
  public function getAtaques(): array
  {
    return $this->ataques;
  }

  /**
   * Set the value of ataques
   */
  public function setAtaques(array $ataques): self
  {
    $this->ataques = $ataques;

    return $this;
  }

  public function obtenerElAtaqueMasFuerte(): string
  {
    $maxPoder = 0;
    $ataqueMasFuerte = "";
    foreach ($this->ataques as $ataque => $poder) {
      if ($poder > $maxPoder) {
        $maxPoder = $poder;
        $ataqueMasFuerte = $ataque;
      }
    }
    return $ataqueMasFuerte;
  }

  static public function devolverNumeroPersonajesDeCadaRaza(): string
  {
    $personajesPorRaza = [];
    foreach (self::$personajes as $personaje) {
      $personajesPorRaza[$personaje->getRaza()] = $personaje;
    }
    return implode(", ", $personajesPorRaza);
  }
}


$personaje1 = new PersonajeDBZ("Goku", 100, RazaDBZ::SuperGuerrer, ["Kamehameha" => 500, "SuperKamehameha" => 1000]);


$personaje2 = new PersonajeDBZ("Vegeta", 100, RazaDBZ::SuperGuerrer, ["Kamehameha" => 500, "SuperKamehameha" => 1000]);

echo $personaje1->obtenerElAtaqueMasFuerte();

echo '<br>';

echo PersonajeDBZ::devolverNumeroPersonajesDeCadaRaza();
