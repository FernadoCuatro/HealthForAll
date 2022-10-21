<?php
session_start();
if (isset($_SESSION['ad'])) {
try
{
require_once('conn/conn.php');
$admidatos = 'SELECT * FROM `cita`';
$admires = $conn->query($admidatos);
$conn ->next_result();
} catch (Exception $e) { $error = $e->getMessage(); }

include ("conn/conn.php");
if(isset($_POST['codigo'] )&& isset($_POST['fet'])){ $cod = $_POST['codigo'];}else{$cod = '';}
if(isset($_POST['fet'])){ $fect = $_POST['fet'];}else{$fect = '';}
if($cod > '' && $fect >''){
$registrs = "SELECT * FROM cita where idespecialidad = '$cod' and fecha = '$fect'" ;
}else if ($cod > ''){
$registrs = "SELECT * FROM cita where idespecialidad = '$cod' ";
}else if ($fect) {	
$registrs = "SELECT * FROM cita where fecha = '$fect' ";
}else{

}
$no="No hay citas reservadas";
error_reporting(0);
$registros = $conn->query($registrs);
$mostrar = mysqli_num_rows($registros);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" type="image/ico" href="../img/cruz.ico">
<title>ADMINISTRADOR</title>
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="footer, address, phone, icons" />
<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<link rel="manifest" href="site.webmanifest">
<link rel="stylesheet" href="../css/demo.css">
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<header>
<nav>
<a href="mantenimiento.php"><i class="fa fa-cog"></i> Mantenimiento</a>
<a href="update_admin.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
</nav>
</header>
<div class="tabla-cita">
<center>
<?php if (isset($_GET['delete']) == "on") { echo "<h3>Cita eliminada correctamente.</h3><br> <br/>"; } ?>
<form action="" method="POST">
<span class="span0">Mostrar todas </span><span class="span00">las Citas</span><br><br><br>
<select name="codigo">
<option value="">POR ESPECIALIDAD</option>
<option value="CARDIOLOGIA">CARDIOLOGIA</option>
<option value="DERMATOLOGIA">DERMATOLOGIA</option>
<option value="ODONTOLOGIA">ODONTOLOGIA</option>
<option value="NEFROLOGIA">NEFROLOGIA</option>
<option value="PEDIATRIA">PEDIATRIA</option>
<option value="GENERAL">ATENCION GENERAL</option>
</select>
<!--<input type="date" name="fech">
<input type="time" name="tiemp">-->
<input type="date" name="fet" class="fcita"><br><br>
<input type="submit" name="" value="Buscar" class="bucita">
</form><br>
<?php
if ($mostrar>0)
{
?>
<a class="impr" href="javascript:imprSelec('historial')">Imprimir citas</a>
<br><br>
<?php
}
?>
<?php 
if ($mostrar>0) {
?>
<div id="historial">
<center><img src="../img/hero.png" alt="hero" height="210px"></center>
<table border="1">
<thead>
<tr>
<td class="titulo">id cita</td>
<td class="titulo">Fecha</td>
<td class="titulo">Hora</td>
<td class="titulo">idespecialidad</td>
<td class="titulo">idempleado</td>
<td class="titulo">Dui</td>
<td class="titulo">Nombre</td>
<td class="titulo">Apellido</td>
<td class="titulo">eliminar</td>
</tr>
</thead>
<tbody>
<?php
while($registro3 = $registros->fetch_assoc( ) ){?>
<tr>
<td class="titulo2"><?php echo $registro3['idecita']; ?></td>
<td class="titulo2"><?php echo $registro3['fecha']; ?></td>
<td class="titulo2"><?php echo $registro3['hora']; ?></td>
<td class="titulo2"><?php echo $registro3['idespecialidad']; ?></td>
<td class="titulo2"><?php echo $registro3['idempleado']; ?></td>
<td class="titulo2"><?php echo $registro3['Dui']; $iduser = $registro3['Dui']; ?></td>
<?php 
$adminom = "SELECT * FROM `paciente` WHERE `Dui`='$iduser';";
$adminomres = $conn->query($adminom); 
while($datos2 = $adminomres->fetch_assoc() ) {
?>
<td class="titulo2"><?php echo $datos2['nombre']; ?></td>
<td class="titulo2"><?php echo $datos2['apellido']; ?></td>
<td class="titulo2"><a href="#" onclick="conf(<?php echo $registro3['idecita'];?>)" ><button><i class="icon-bin"></i> Eliminar</button></a></td>
<?php } ?>
</tr>
</div>
<?php } }else{
echo $no;
}
} else {
header("Location: ../index.php?out=si");
$conn->close();
} ?>
<script>
function imprSelec(historial) {
var ficha = document.getElementById(historial);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write(ficha.innerHTML);
ventimp.document.close();
ventimp.print();
ventimp.close();
}
function conf(id)
{
if(confirm('¿Eliminar?'))
{
window.location.href = "admindelet.php?idecita="+id;
}
}

</script>
</body>
</html>