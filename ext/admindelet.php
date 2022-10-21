<?php
if(isset($_GET['idecita'])){ $idecita = $_GET['idecita']; }
try
{
require_once('conn/conn.php');
$delecit ="DELETE FROM `cita` WHERE `idecita`='$idecita';";
$deleres = $conn->query($delecit);
}
catch (Exception $e)
{
$error = $e->getMessage();
}


if($deleres)
{
	header("Location: admin.php?delete=on");
}

$conn->close();

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