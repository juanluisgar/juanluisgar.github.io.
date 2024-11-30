<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST['valor'];
    $timestamp = date('Y-m-d H:i:s');
    
    $datos = json_decode(file_get_contents('datos.json'), true);
    $datos[] = ['timestamp' => $timestamp, 'valor' => $valor];
    
    // Mantener solo los últimos 100 registros
    if (count($datos) > 100) {
        $datos = array_slice($datos, -100);
    }
    
    file_put_contents('datos.json', json_encode($datos));
    echo "Datos guardados correctamente";
} else {
    echo "Método no permitido";
}
?>
