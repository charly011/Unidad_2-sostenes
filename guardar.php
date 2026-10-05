<?php

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: p1.php");
    exit;
}

$titulo = trim($_POST['titulo'] ?? '');
$fecha = $_POST['fecha'] ?? '';
$hora = $_POST['hora'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$descripcion = trim($_POST['descripcion'] ?? '');

if ($titulo === '' || $fecha === '' || $hora === '' || $categoria === '') {
    header("Location: p1.php?error=campos");
    exit;
}

$sql = "INSERT INTO eventos 
        (titulo, fecha, hora, categoria, descripcion)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->bind_param(
    "sssss",
    $titulo,
    $fecha,
    $hora,
    $categoria,
    $descripcion
);


if ($stmt->execute()) {

    header("Location: index.php?guardado=1");
    exit;

} else {

    header("Location: index.php?error=1");
    exit;
}

$stmt->close();
$conn->close();

?>