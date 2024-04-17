<?php
/* Crea un programa que gestione una biblioteca. El programa debe permitir:

Dar de alta libros: título, autor, ISBN, género, fecha de publicación.
Dar de baja libros por ISBN.
Consultar información de un libro por ISBN.
Listar todos los libros de un género específico.
Listar todos los libros ordenados por título o por autor.
Prestar un libro a un usuario (asociando el ISBN del libro con el nombre del usuario).
Devolver un libro prestado (eliminando la asociación entre el libro y el usuario).
Consultar qué libros tiene prestados un usuario determinado. */


enum Genero: string
{
  case Terror = "Terror";
  case Comedia = "Comedia";
  case Amor = "Amor";
  case Ficcion = "Ficcion";
}

class Libro
{
  public function __construct(
    public string $titulo,
    public string $autor,
    public int $isbn,
    public Genero $genero,
    public DateTime $publicacion
  ) {
  }
}


class Biblioteca
{
  static private array $libros = [];

  static public function agregarLibro(Libro $libro): void
  {
    self::$libros[] = $libro;
  }

  static public function eliminarLibro(int $isbn): string
  {
    foreach (self::$libros as $libro) {
      if ($libro->isbn === $isbn) {
        unset(self::$libros[$libro]);
        break;
      }
      return "Libro no encontrado";
    }
    return "Libro eliminado";
  }

  static public function encontrarLibro(int $isbn): string
  {
    foreach (self::$libros as $libro) {
      if ($libro->isbn == $isbn) {
        return $libro->titulo;
      }
    }
    return "Libro no encontrado";
  }

  static public function librosPorUnGenero(Genero $genero): string
  {
    $librosPorUnGenero = [];
    foreach (self::$libros as $libro) {
      if ($libro->genero == $genero) {
        $librosPorUnGenero[] = $libro->titulo;
      }
    }
    if (count($librosPorUnGenero) > 0) {
      return implode(", ", $librosPorUnGenero);
    } else {
      return "No se encontraron libros de ese genero";
    }
  }
}


$it = new Libro("IT", "Stephen King", 123456789, Genero::Terror, new DateTime("2010-01-01"));
$lord_of_the_rings = new Libro("Lord of the Rings", "J. R. R. Tolkien", 987654321, Genero::Ficcion, new DateTime("2000-01-01"));


Biblioteca::agregarLibro($it);
Biblioteca::agregarLibro($lord_of_the_rings);

echo Biblioteca::encontrarLibro(123456789);
