<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "chicvenue");

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


// Obtener los datos de la tarjeta desde la solicitud POST
$nombreTitular = $_GET['nombre_titular'];
$numeroTarjeta = $_GET['numero_tarjeta'];
$vencimiento = $_GET['vencimiento'];
$cvv = $_GET['cvv'];
$idCliente = $_GET['id_cliente'];
$nomBanco = $_GET['nom_banco'];

// Preparar la consulta de inserción
$query = "INSERT INTO tarjeta_bancaria (Nombre_tit_tar, numero_tarjeta, vencimiento, cvv, id_cliente, nom_banco) 
          VALUES ('$nombreTitular', '$numeroTarjeta', '$vencimiento', '$cvv', '$idCliente', '$nomBanco')";


// Ejecutar la consulta
if (mysqli_query($conexion, $query)) {
    // La inserción fue exitosa
    echo json_encode(['success' => true]);
} else {
    // Ocurrió un error durante la inserción
    echo json_encode(['success' => false, 'error' => mysqli_error($conexion)]);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>