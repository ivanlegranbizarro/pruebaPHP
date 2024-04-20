<?php

enum GenerosLiterarios: string
{
  case Negra = 'Negra';
  case Ficcion = 'Ficción';
  case Poesia = 'Poesía';
  case Teatro = 'Teatro';
}

class Libro
{
  public function __construct(
    public string $titulo,
    public string $autor
  ) {
    $this->isbn = uniqid();
  }

  public function __toString(): string
  {
    return "El libro se titula $this->titulo";
  }
}


class Libreria
{

  static public array $libros = [];

  public function __construct(public string $nombre)
  {
  }

  public function addLibro(Libro $libro): void
  {
    self::$libros[] = $libro;
  }

  public function eliminarLibro(string $isbn): string
  {
    if (!empty(self::$libros)) {
      foreach (self::$libros as $key => $libro) {
        if ($libro->isbn == $isbn) {
          unset(self::$libros[$key]);
          return "El libro con isbn $isbn se eliminó correctamente";
        }
        return 'El libro no se encontró';
      }
    }
    return 'Lo sentimos. Aún no tenemos libros registrados';
  }
}

$libro1 = new Libro('El Señor de los anillos', 'JRR Tolkien');

echo $libro1;

echo '<br>';

$libreriaDocumenta = new Libreria('Documenta');

$libreriaDocumenta->addLibro($libro1);

echo $libreriaDocumenta->eliminarLibro($libro1->isbn);
