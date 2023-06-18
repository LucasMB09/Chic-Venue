<?php
    session_start();

    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");

    // Función para obtener el valor de 'activado' del cliente
    function obtenerValorActivadoDelCliente($clienteId) {
        global $conexion;

        // Prepara y ejecuta la consulta para obtener el valor de 'activado' del cliente
        $query = "SELECT activado FROM cliente WHERE id_cliente = '$clienteId' AND activado = 1";
        $resultado = mysqli_query($conexion, $query);

        // Verifica si se obtuvo un resultado válido
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $activado = $fila['activado'];
            return $activado;
        }

        // Si no se encuentra el cliente o no se obtiene el resultado, retorna null o un valor por defecto
        return null;
    }

    // Verificar si el cliente actual está activado o no
    $clienteId = obtenerClienteId(); // Obtener el ID del cliente actual desde donde lo obtengas
    $activado = obtenerValorActivadoDelCliente($clienteId);

    if ($activado === '1') {
        // El cliente está activado
        // Realiza las acciones correspondientes
        echo '1'; // Devuelve '1' como respuesta para indicar que el cliente está activado
    } else {
        // El cliente no está activado
        // Realiza las acciones correspondientes
        echo '0'; // Devuelve '0' como respuesta para indicar que el cliente no está activado
    }

    // Función para obtener el ID del cliente actualmente en uso
    function obtenerClienteId() {
        // Lógica para obtener el ID del cliente actualmente en uso
        // Por ejemplo, si tienes una variable de sesión `clienteId`, puedes obtener su valor así:
        if (isset($_SESSION['clienteId'])) {
            return $_SESSION['clienteId'];
        }

        // Si no se encuentra el cliente en la sesión, retorna null o un valor por defecto
        return null;
    }
?>