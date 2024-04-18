<?php

enum CategoriaProducto: string
{
  case Comida = 'Comida';
  case Bebida = 'Bebida';
  case Limpieza = 'Limpieza';
  case Higiene = 'Higiene';
  case Perfumeria = 'Perfumeria';
}

class Producto
{
  public function __construct(public string  $nombre, public string $descripcion, public float $precio, public CategoriaProducto $categoria)
  {
  }

  public function __toString()
  {
    return "Nombre: $this->nombre";
  }
}


class Tienda
{
  public function __construct(public string $nombre, public array $productos = [])
  {
  }

  public function darDeAltaProducto(Producto $producto)
  {
    $this->productos[] = $producto;
  }

  public function eliminarUnProducto(Producto $producto): void
  {
    foreach ($this->productos as $key => $value) {
      if ($value === $producto) {
        unset($this->productos[$key]);
      }
    }
  }

  public function consultarProductoPorNombre(string $nombreProducto): string
  {
    foreach ($this->productos as $producto) {
      if ($producto->nombre == $nombreProducto) {
        return "El producto $nombreProducto existe en la tienda. Y su precio es $producto->precio";
      }
      return "El producto $nombreProducto no existe en la tienda";
    }
  }

  public function listarProductosCategoria(string $categoria): string
  {
    foreach ($this->productos as $producto) {
      $productoDeEsaCategoria = [];
      if ($producto->categoria->value == $categoria) {
        $productoDeEsaCategoria[] = $producto->nombre;
      }
    }
    return implode(", ", $productoDeEsaCategoria);
  }


  public function listarProductosOrdenadosPorPrecioOporNombre(string $orden): array|string
  {
    if ($orden == 'nombre') {
      $listaNombreProductos = [];
      foreach ($this->productos as $producto) {
        $listaNombreProductos[] = $producto->nombre;
        asort($listaNombreProductos);
      }
      return $listaNombreProductos;
    }

    if ($orden == 'precio') {
      $listaPorPrecios = [];
      foreach ($this->productos as $producto) {
        $listaPorPrecios[$producto->nombre] = $producto->precio;
      }
      asort($listaPorPrecios);
      return $listaPorPrecios;
    }
    return "Introduzca 'nombre' o 'precio' para ordenar la lista";
  }
}


$producto1 = new Producto('Leche', 'Leche entera', 2.5, CategoriaProducto::Comida);

$producto2 = new Producto('Perrete', 'Perrete de gato', 5.5, CategoriaProducto::Comida);

$producto3 = new Producto('Agua', 'Agua mineral', 10, CategoriaProducto::Bebida);

echo $producto1;


$tienda1 = new Tienda('Carrefour');


echo '<br>';

$tienda1->darDeAltaProducto($producto1);
$tienda1->darDeAltaProducto($producto2);
$tienda1->darDeAltaProducto($producto3);

echo $tienda1->consultarProductoPorNombre('Leche');
echo '<br>';
echo $tienda1->consultarProductoPorNombre('Perrete');
echo '<br>';
echo $tienda1->listarProductosCategoria('Comida');

echo '<br>';

print_r($tienda1->listarProductosOrdenadosPorPrecioOporNombre('nombre'));

echo '<br>';

print_r($tienda1->listarProductosOrdenadosPorPrecioOporNombre('precio'));
