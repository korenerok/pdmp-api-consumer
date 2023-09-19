<?php 


echo("test");

$resultados = [
  ['fecha' => '2022-01-15', 'dato' => 'Resultado 1'],
  ['fecha' => '2022-03-10', 'dato' => 'Resultado 2'],
  ['fecha' => '2023-05-20', 'dato' => 'Resultado 3'],
  ['fecha' => '2023-08-05', 'dato' => 'Resultado 4'],
];

// Ordena los resultados por fecha
usort($resultados, function($a, $b) {
  return strcmp($a['fecha'], $b['fecha']);
});

// Define el número de resultados por página
$resultados_por_pagina = 2;

// Divide los resultados en páginas por año
$paginas = [];
$pagina_actual = [];
$año_actual = null;

foreach ($resultados as $resultado) {
  $año = date('Y', strtotime($resultado['fecha']));
  
  if ($año != $año_actual) {
      if (!empty($pagina_actual)) {
          $paginas[] = $pagina_actual;
      }
      $pagina_actual = [];
      $año_actual = $año;
  }
  
  $pagina_actual[] = $resultado;
}

// Agrega la última página
if (!empty($pagina_actual)) {
  $paginas[] = $pagina_actual;
}

// Implementa la lógica de paginación para mostrar los resultados de cada página
$pagina_actual = 1;

while ($pagina_actual <= count($paginas)) {
  echo "Página $pagina_actual:<br>";
  foreach ($paginas[$pagina_actual - 1] as $resultado) {
      echo $resultado['dato'] . "<br>";
  }
  $pagina_actual++;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  test
</body>
</html>