<?php


enum GeneroLibro: string
{
  case Terror = 'Terror';
  case Fantasia = 'Fantasía';
  case Comedia = 'Comedia';
  case Ficción = 'Ficción';
  case AutoBiografia = 'AutoBiografía';
}

class Libro
{
  public function __construct(
    public int $isbn,
    public string $titulo,
    public string $autor,
    public GeneroLibro $genero,
  ) {
  }

  public function __toString(): string
  {
    return "Título del libro: $this->titulo. Autor: $this->autor";
  }
}


$libro1 = new Libro(1, 'El Señor de los anillos', 'JRR Tolkien', GeneroLibro::Fantasia);


echo $libro1;

echo '<br>';


class Biblioteca
{

  public function __construct(public string $nombre, public array $libros = [])
  {
  }

  public function addLibro(Libro $libro): void
  {
    $this->libros[] = $libro;
  }

  public function eliminarLibro(int $isbn): string
  {
    foreach ($this->libros as $key => $libro) {
      if ($libro->isbn == $isbn) {
        unset($this->libros[$key]);
        return 'El libro se eliminó del catálogo';
      }
    }
    return 'No hay ningún libro con ese ISBN';
  }

  public function consultarLibroPorIsbn(int $isbn): Libro|string
  {
    foreach ($this->libros as $libro) {
      if ($libro->isbn == $isbn) {
        return $libro;
      }
    }
    return 'Lo sentimos. No hay ningún libro con ese isbn';
  }

  public function listarPorGenerosRegistrados(): array|string
  {
    if (!empty($this->libros)) {
      $totalGenerosRegistrados = [];
      foreach ($this->libros as $libro) {
        $generoRecorrido = $libro->genero->value;
        if ($totalGenerosRegistrados[$generoRecorrido]) {
          $totalGenerosRegistrados[$generoRecorrido]++;
        } else {
          $totalGenerosRegistrados[$generoRecorrido] = 1;
        }
      }
      return $totalGenerosRegistrados;
    }
    return 'No tienes libros registrados todavía';
  }
}


$biblioteca1 = new Biblioteca('Biblioteca Antoni Martín');

$biblioteca1->addLibro($libro1);

// echo $biblioteca1->eliminarLibro(1);


echo $biblioteca1->consultarLibroPorIsbn(1);

echo '<br>';

print_r($biblioteca1->listarPorGenerosRegistrados());
