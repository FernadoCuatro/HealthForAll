<?php
try
{
require_once('conn/conn.php');
	if(isset($_POST['duiuser'])){ $duiuser = $_POST['duiuser'];}else{$duiuser = '';}
 if(isset($_POST['espe'])){ $espe = $_POST['espe'];}else{$espe = '';}
 if(isset($_POST['fechaci'])){ $fechaci = $_POST['fechaci'];}else{$fechaci = '';}
 if(isset($_POST['hourci'])){ $hourci = $_POST['hourci'];}else{$hourci = '';}
 if(isset($_POST['codigodoc'])){ $codigodoc = $_POST['codigodoc'];}else{$codigodoc = '';}
 
	$sql2 ="INSERT INTO `cita`(`idecita`, `fecha`, `hora`, `idespecialidad` , `idempleado`, `Dui`) VALUES (NULL,'$fechaci','$hourci','$espe','$codigodoc','$duiuser');";
 $resultado2 = $conn->query($sql2);
}
catch (Exception $e) { $error = $e->getMessage(); }

	$sql3 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$hourci' and `idespecialidad`='$espe'";
	$resultado3 = $conn->query($sql3);
	while($datos = $resultado3->fetch_assoc() ) {
	$idci = $datos['idecita'];

if($resultado2 == true)
{
	header("Location: ../index.php?cita=on&idcita=$idci");
}else{
	header("Location: ../index.php?cita=off");
}
}
?>
 