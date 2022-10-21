<?php
if(isset($_GET['id'])){ $idecita = $_GET['id']; }
$comen=$idecita;
if ($comen > '') {
require_once('conn/conn.php');
$delecit ="DELETE  FROM `comentario` WHERE `idco` ='{$comen}';";
$deleres = $conn->query($delecit);
if($deleres)
{
header("Location: mantenimiento.php?delete=on");
}
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Borrar</title>
</head>
<body>
</body>
</html>