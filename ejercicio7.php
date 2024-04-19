<?php


enum GeneroLiterario: string
{
  case Terror = 'Terror';
  case Ficción = 'Ficción';
  case Biografía = 'Biografía';
  case Poesia = 'Poesía';
  case Fantasia = 'Fantasía';
}

class Libro
{
  public function __construct(public string $titulo, public string $autor, public int $isbn, public DateTime $publicación, public GeneroLiterario $genero)
  {
  }

  public function __toString(): string
  {
    return "El título del libro es $this->titulo";
  }
}



class Biblioteca
{

  public function __construct(public string $nombre, public array $libros = [])
  {
  }

  public function altaLibro(Libro $libro): void
  {
    $this->libros[] = $libro;
  }

  public function bajaLibro(Libro $libro): string
  {
    foreach ($this->libros as $key => $value) {
      if ($libro->isbn == $value->isbn) {
        unset($this->libros[$key]);
        return 'El libro se eliminó con éxito';
      }
    }
    return 'El libro no se ha encontrado';
  }

  public function buscarLibroPorIsbn(int $isbn): string
  {
    foreach ($this->libros as $libro) {
      if ($libro->isbn == $isbn) {
        return "El libro $libro->titulo es del autor $libro->autor";
      }
    }
  }

  public function listarPorGenero(): array|string
  {
    if (!empty($this->libros)) {
      $generosRegistrados = [];
      foreach ($this->libros as $libro) {
        $generoRecorrido = $libro->genero->value;
        if (isset($generosRegistrados[$generoRecorrido])) {
          $generosRegistrados[$generoRecorrido]++;
        } else {
          $generosRegistrados[$generoRecorrido] = 1;
        }
      }
      return $generosRegistrados;
    }
    return 'Lo siento, aún no hay libros registrados';
  }
}



$libro = new Libro('El Señor de los anillos', 'Tolkien', 1, new DateTime('1954-07-29'), GeneroLiterario::Fantasia);

$biblioteca1 = new Biblioteca('Biblioteca del Prat');

$biblioteca1->altaLibro($libro);

echo $biblioteca1->buscarLibroPorIsbn(1);

echo '<br>';

print_r($biblioteca1->listarPorGenero());
