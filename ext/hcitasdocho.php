<?php
try
{
	require_once('conn/conn.php');
 if(isset($_POST['duiuser'])){ $duiuser = $_POST['duiuser'];}else{$duiuser = '';}
 if(isset($_POST['espe'])){ $espe = $_POST['espe'];}else{$espe = '';}
 if(isset($_POST['fechaci'])){ $fechaci = $_POST['fechaci'];}else{$fechaci = '';}
 if(isset($_POST['codigodoc'])){ $codigodoc = $_POST['codigodoc'];}else{$codigodoc = '';}

	$revpa = "SELECT * FROM `paciente` WHERE `Dui`='$duiuser';";
	$revpares =$conn->query($revpa);
	$revpafil = mysqli_num_rows($revpares); if ($revpafil>0) { } else  { header("Location: hcitasdoc.php?notpa=off"); }
	$conn ->next_result();
 $rev = "SELECT * FROM `doctor` WHERE `idempleado`= '$codigodoc';";
 $revres = $conn->query($rev);
 $revfil = mysqli_num_rows($revres); if ($revfil>0) { } else  { header("Location: hcitasdoc.php?notuser=null"); }
	$conn ->next_result();
	$verinfor = "SELECT * FROM `paciente` WHERE `Dui` = '$duiuser';";
	$verinforres = $conn->query($verinfor);
}
catch (Exception $e) { $error = $e->getMessage(); }

$horario = 
['10:00:00',
	'10:30:00', 
	'11:00:00', 
	'11:30:00', 
	'1:00:00', 
	'1:30:00', 
	'2:00:00', 
	'2:30:00', 
	'3:00:00', 
	'3:30:00', 
	'4:00:00', 
	'4:30:00'];
?>                                                                                                                                                     
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>DOCTOR</title>
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="footer, address, phone, icons" />
<link rel="stylesheet" href="../css/footer.css">
<link rel="manifest" href="site.webmanifest">
<link rel="stylesheet" href="../css/demo.css">
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/hcistasdoc.css">
</head>
<body>

<header>
<nav>
<a href="especialidades.php"><i class="icon-users"></i> Especialidades</a>
<a href="contactos.php"><i class="icon-phone"></i> Contactos</a>
<a href="acercade.php"><i class="icon-bubbles4"></i> Acerca de</a>
</nav>
</header>




<center>
<form action="hcitasdocres.php" method="post">
	<h2>Datos <span>Personales</span></h2><br>
<?php while($datos = $verinforres->fetch_assoc() ) { ?>
	<input class="form-input" type="text" name="duiuser" readonly value="<?php echo $duiuser;?>"><br>
	<input class="form-input" type="text" name="nameuser" readonly value="<?php echo $datos['nombre'];?>"><br>
	<input class="form-input" type="text" name="apellidouser" readonly value="<?php echo $datos['apellido'];?>"><br><br>
	<?php } ?>
<h2>Informacion <span>de Cita</span></h2><br>
	<input class="form-input" type="text" name="espe" readonly value="<?php echo $espe;?>">
	<input class="form-input" type="text" name="fechaci" readonly value="<?php echo $fechaci;?>">
 <input class="form-input" type="text" name="codigodoc" value="<?php echo $codigodoc;?>" readonly><br><br>
<h2>Horarios <span>Disponibles</span></h2><br>



	<select name="hourci" id="5" required>
	<option value="">HORA</option>
<?php
	$hora0 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[0]' and `idespecialidad`='$espe';";
	$hora0res = $conn->query($hora0); $hora0fil = mysqli_num_rows($hora0res); $conn ->next_result();
	if($hora0fil > 0) { } else {	?><option value="10:00:00">10:00am</option><?php	}
	$hora1 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[1]' and `idespecialidad`='$espe';";
	$hora1res = $conn->query($hora1); $hora1fil = mysqli_num_rows($hora1res); $conn ->next_result();
	if($hora1fil > 0) { } else {	?><option value="10:30:00">10:30am</option><?php	} 
	$hora2 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[2]' and `idespecialidad`='$espe';";
	$hora2res = $conn->query($hora2); $hora2fil = mysqli_num_rows($hora2res); $conn ->next_result();
	if($hora2fil > 0) { } else {	?><option value="11:00:00">11:00am</option><?php	} 
	$hora3 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[3]' and `idespecialidad`='$espe';";
	$hora3res = $conn->query($hora3); $hora3fil = mysqli_num_rows($hora3res); $conn ->next_result();
	if($hora3fil > 0) { } else {	?><option value="11:30:00">11:30am</option><?php	} 
	$hora4 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[4]' and `idespecialidad`='$espe';";
	$hora4res = $conn->query($hora4); $hora4fil = mysqli_num_rows($hora4res); $conn ->next_result();
	if($hora4fil > 0) { } else {	?><option value="1:00:00">1:00pm</option><?php	} 
	$hora5 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[5]' and `idespecialidad`='$espe';";
	$hora5res = $conn->query($hora5); $hora5fil = mysqli_num_rows($hora5res); $conn ->next_result();
	if($hora5fil > 0) { } else {	?><option value="1:30:00">1:30pm</option><?php	}
	$hora6 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[6]' and `idespecialidad`='$espe';";
	$hora6res = $conn->query($hora6); $hora6fil = mysqli_num_rows($hora6res); $conn ->next_result();
	if($hora6fil > 0) { } else {	?><option value="2:00:00">2:00pm</option><?php	}
	$hora7 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[7]' and `idespecialidad`='$espe';";
	$hora7res = $conn->query($hora7); $hora7fil = mysqli_num_rows($hora7res); $conn ->next_result();
	if($hora7fil > 0) { } else {	?><option value="2:30:00">2:30pm</option><?php	} 
	$hora8 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[8]' and `idespecialidad`='$espe';";
	$hora8res = $conn->query($hora8); $hora8fil = mysqli_num_rows($hora8res); $conn ->next_result();
	if($hora8fil > 0) { } else {	?><option value="3:00:00">3:00pm</option><?php	}
	$hora9 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[9]' and `idespecialidad`='$espe';";
	$hora9res = $conn->query($hora9); $hora9fil = mysqli_num_rows($hora9res); $conn ->next_result();
	if($hora9fil > 0) { } else {	?><option value="3:30:00">3:30pm</option><?php	} 
	$hora10 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[10]' and `idespecialidad`='$espe';";
	$hora10res = $conn->query($hora10); $hora10fil = mysqli_num_rows($hora10res); $conn ->next_result();
	if($hora10fil > 0) { } else {	?><option value="4:00:00">4:00pm</option><?php	} 
	$hora11 = "SELECT * FROM `cita` WHERE `fecha`='$fechaci' and `hora`='$horario[11]' and `idespecialidad`='$espe';";
	$hora11res = $conn->query($hora11); $hora11fil = mysqli_num_rows($hora11res); $conn ->next_result();
	if($hora11fil > 0) { } else {	?><option value="4:30:00">4:30pm</option><?php	} 
	if(
		$hora0fil > 0 && 
		$hora2fil > 0 && 
		$hora3fil > 0 && 
		$hora4fil > 0 && 
		$hora5fil > 0 &&
		$hora6fil > 0 &&
		$hora7fil > 0 &&
		$hora8fil > 0 && 
		$hora9fil > 0 &&
		$hora10fil > 0 && 
		$hora11fil > 0)
	{?> <option disabled ><h3 class='archivo'>No hay horarios disponibles</h3></option> <?php }
	?>
	</select>
<br>

	<input type="submit" value="Hacer cita">

	<a href="hcitasdoc.php"><input type="button" value="Atras" class="volver"></a>
	<a href="../index.php"><input type="button" value="Inicio" class="volver"></a>
<br><br>
</form>
</center>
<?php

?>
<footer class="footer-distributed">
   <div class="footer-left">
    <h3>Health <span>For All</span></h3>
    <p class="footer-links">
     <a href="especialidades.php">Especialidades || </a>
     <a href="contactos.php"> Contactos || </a>
     <a href="acercade.php"> Acerca de </a>
    </p>
    <p class="footer-company-name">Copyright © Todos los derechos reservados 2018 || <a href="" class="correo">Health For All </a></p>
   </div>
   <div class="footer-center">
    <div>
     <i class="fa fa-map-marker"></i>
     <p><span>Urbanizacion madre selva, pasaje A, #5</span> Santa Elena, Antiguo Cuscatlán</p>
    </div>
    <div>
     <i class="fa fa-phone"></i>
     <p>+503 74938329</p>
    </div>
    <div>
     <i class="fa fa-envelope"></i>
     <p><a href="mailto:support@company.com">health_for_all@gmail.com</a></p>
    </div>
   </div>
   <div class="footer-right">
    <p class="footer-company-about">
     <span>Mas Informacion</span>
     Buscanos en nuestras redes sociales para ver los avances en tecnologia para dar una mejor atención en cada una de nuestras especialidades, ademas de consejos practicos que ayudan a tu salud.
    </p>
    <div class="footer-icons">
     <a href="https://www.facebook.com/Health_for_all-102188101179595/?modal=admin_todo_tour" target="_blank"><i class="icon-facebook"></i></a>
     <a href="https://twitter.com/" target="_blank"><i class="icon-twitter"></i></a>
     <a href="https://www.instagram.com/accounts/login/?hl=es-la" target="_blank"><i class="icon-instagram"></i></a>
     <a href="ext/contactos.php"><i class="icon-mail2"></i></a>
    </div>
   </div>
  </footer>
</body>
</html>