<?php

enum SegundoGeneroLiterario: string
{
  case Negra = 'Negra';
  case Terror = 'Terror';
  case Comedia = 'Comedia';
  case Teatro = 'Teatro';
  case Poesia = 'Poesía';
  case Fantasia = 'Fantasía';
}

class SegundaLibreria
{
  public string $isbn;

  static public array $libros = [];

  public function __construct(
    public string $titulo,
    public string $autor,
    public SegundoGeneroLiterario $genero,

  ) {
    $this->isbn = uniqid();
  }

  static public function registrarLibro(SegundaLibreria $libro): void
  {
    self::$libros[] = $libro;
  }

  static public function eliminarLibro(string $isbn): string
  {
    if (!empty(self::$libros)) {
      foreach (self::$libros as $key => $libro) {
        if ($libro->isbn == $isbn) {
          unset(self::$libros[$key]);
          return 'El libro se eliminó con éxito';
        }
      }
    }
    return 'Lo sentimos, aún no hay libros registrados';
  }

  static function buscarLibroPorIsbn(string $isbn): string
  {
    if (!empty(self::$libros)) {
      foreach (self::$libros as $libro) {
        if ($libro->isbn == $isbn) {
          return "El libro que buscas es $libro->titulo de $libro->autor";
        }
      }
    }
    return 'Lo sentimos, aún no hay libros registrados';
  }

  public function __toString()
  {
    return "El libro se titulta $this->titulo";
  }
}


$libro1 = new SegundaLibreria('El Señor de los anillos', 'Tolkien', SegundoGeneroLiterario::Fantasia);

echo $libro1;

echo '<br>';

SegundaLibreria::registrarLibro($libro1);

echo SegundaLibreria::buscarLibroPorIsbn($libro1->isbn);
