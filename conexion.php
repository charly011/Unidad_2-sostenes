<?php

$servidor = "localhost";
$usuario = " idolized-laugh-php@localhost";
$password = "";
$base_datos = "idolized_laugh_php_agenda";
$puerto = 3310;

$conn = new mysqli(
    $servidor,
    $usuario,
    $password,
    $base_datos,
    $puerto
);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
