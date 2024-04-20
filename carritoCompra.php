<?php


enum CategoriaProducto: string
{
  case Alimentacion = "Alimentación";
  case  Perfumeria = "Perfumería";
  case Congelados = "Congelados";
  case Jugueteria = "Juguetería";
  case Limpieza = "Limpieza";
}


class Producto
{

  public string $id;
  public function __construct(
    public string $nombre,
    public string $descripcion,
    public float $precio,
    public CategoriaProducto $categoria
  ) {
    $this->id = uniqid();
  }
}

class CarritoCompra
{
  static public $contador = 1;
  public int $id;
  public function __construct(public array $productos = [])
  {
    $this->id = self::$contador;
    self::$contador++;
  }

  public function addToCarrito(Producto $producto): void
  {
    $this->productos[] = $producto;
  }

  public function sacarDelCarrito(Producto $producto): string
  {
    if (!empty($this->productos)) {
      $productoBuscado = array_search($producto, $this->productos);
      if ($productoBuscado !== false) {
        unset($this->productos[$productoBuscado]);
        return "El producto con id $producto->id se eliminó correctamente";
      }
      return 'El producto no estaba en el carrito';
    }
    return 'Lo sentimos, no hay productos en el carrito';
  }

  public function __toString()
  {
    return "El carrito tiene el id $this->id";
  }
}


$producto1 = new Producto('Escoba', 'Escoba para barrer. Fantástica', 3.4, CategoriaProducto::Limpieza);


$carrito1 = new CarritoCompra();
$carrito2 = new CarritoCompra();

echo $carrito1;

echo '<br>';

echo $carrito2;


$carrito1->addToCarrito($producto1);

echo '<br>';

echo $carrito1->sacarDelCarrito($producto1);
