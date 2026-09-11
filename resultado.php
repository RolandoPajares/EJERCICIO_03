<?php
$productos = [
	["nombre" => "Laptop", "precio" => 2500, "stock" => 5],
	["nombre" => "Mouse", "precio" => 50, "stock" => 10],
	["nombre" => "Teclado", "precio" => 120, "stock" => 0],
	["nombre" => "Monitor", "precio" => 800, "stock" => 3]
];

$totalInventario = 0;
foreach ($productos as $producto) {
	$totalInventario += $producto["precio"] * $producto["stock"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catálogo de productos</title>
	<link rel="stylesheet" href="css/estilos.css/estilos.css">
</head>
<body>
	<main class="contenedor">
		<a class="volver" href="index.php">&larr; Volver al inicio</a>
		<p class="etiqueta">Inventario actual</p>
		<h1>Catálogo de productos</h1>
		<p class="intro">El estado se calcula según el stock disponible.</p>

		<div class="tabla-contenedor">
			<table>
				<thead>
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($productos as $producto): ?>
						<?php $estado = $producto["stock"] > 0 ? "Disponible" : "Agotado"; ?>
						<tr>
							<td><?= htmlspecialchars($producto["nombre"], ENT_QUOTES, "UTF-8") ?></td>
							<td>$<?= number_format($producto["precio"], 2, ",", ".") ?></td>
							<td><?= $producto["stock"] ?></td>
							<td><span class="estado <?= strtolower($estado) ?>"><?= $estado ?></span></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<section class="resumen">
			<span>Valor total del inventario disponible</span>
			<strong>$<?= number_format($totalInventario, 2, ",", ".") ?></strong>
		</section>
	</main>
</body>
</html>
