<?php

$HOST='localhost';
$USER='root';
$PASSWORD='';
$DB='chat-sweet';

$CONECTION = mysqli_connect($HOST,$USER,$PASSWORD,$DB);

// Verificar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
}

?>