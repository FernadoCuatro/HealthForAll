<?php
if(isset($_GET['id'] )){ $copac = $_GET['id'];}else{$copac = '';}
if(isset($_POST['name'])){ $name = $_POST['name'];}else{$name = '';}
if(isset($_POST['ape'])){ $ape = $_POST['ape'];}else{$ape = '';}
$pac=$copac;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="icon" type="image/ico" href="../img/cruz.ico">
 <title>EDITAR DOCTOR</title>
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="manifest" href="site.webmanifest">
 <link rel="stylesheet" href="../css/normalize.css">
 <link rel="stylesheet" type="text/css" href="../css/footer.css">
 <link rel="stylesheet" href="../css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../css/main.css">
 <link rel="stylesheet" type="text/css" href="../css/editdoc.css">
</head>

<body>

 <header>
  <nav>
   <a href="mantenimiento.php"><i class="fa fa-angle-double-left"></i> Regresar</a>
  </nav>
 </header>

<div class="divedit"><br><br><br><br>
<span class="tittle1">Editar Datos </span><span class="tittle2">de Pacientes</span><br>
<form action="" method="POST">
<input type="text" name="name" class="form-input" autocomplete="off" placeholder="NOMBRE" required=""><br>
<input type="text" name="ape" class="form-input" autocomplete="off" placeholder="APELLIDO" required=""><br>
<input type="submit" name="update" value="Modificar" class="actualizar">
<br>
<?php
include ("conn/conn.php");
if ($pac > '' && $name > '' && $ape > '') {
$sql = "SELECT * FROM paciente WHERE Dui = '$copac'";
$resultado = $conn->query($sql);
$filas = mysqli_num_rows($resultado);
if ($filas>0) {
$sql = "UPDATE paciente SET nombre = '$name', apellido = '$ape' Where Dui = '$pac';";
$resultado = $conn->query($sql);
header("Location: mantenimiento.php");
}else{
	echo "<br>El codigo de enfermera no exite";
}
}
?>

</form>
</div>

</body>

</html>