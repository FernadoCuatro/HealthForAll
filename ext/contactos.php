<!doctype html>
<html class="no-js" lang="es">
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="../img/cruz.ico">
<title>INICIO</title>
<meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <meta name="keywords" content="footer, address, phone, icons" />
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/demo.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/contactos.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
  <meta name="theme-color" content="#fafafa">



<meta name="theme-color" content="#fafafa">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js
" ></script>
<script src="js/javascript.js"></script>

<header>
<h1>WELCOME TO</h1>
<img src="img/heal.png" class="logo">
<nav>
<a href="../index.php"><i class="icon-home"></i> Inicio</a>
<a href="especialidades.php"><i class="icon-aid-kit"></i> Especialidades</a>
<a href="acercade.php"><i class="icon-bubbles4"></i> Acerca de</a>
</nav>
</header>

<center>
<div class="div-contac">
<div class="div-contac1">
<img src="../img/info.ico"><br>
<span class="span0">Informacion</span><span class="span00"> de contacto</span><br>

<h3 class="h11">Urbanizacion madre selva, pasaje A, #5 Santa Elena, Antiguo Cuscatlán</h3>
<h3>health_for_all@gmail.com</h3>
<h3>+503 74938329</h3>

</div>
<div class="div-contac2">
<form action="" method="POST">
<img src="../img/correo.ico"><br>
<span class="span0">Envieranos su </span><span class="span00">Comentario</span>
<br><input type="text" name="nombre" placeholder="NOMBRE" required class="form-input" autocomplete="off">
<br>
<input type="email" name="correo" placeholder="ejemplocorreo@gmail.com" required autocomplete="off" class="form-input">
<br>
<input type="text" name="tel" id="1" placeholder="TELEFONO" minlength="8" maxlength="8" autocomplete="off" onkeypress="return numeros(event)" class="form-input"><br>
<textarea name="mensaje" placeholder="MENSAJE" required autocomplete="off" class="form-input"></textarea>
<br>
<br>
<input class="botone" type="submit" value="Enviar">
<br>
<?php
include('conn/conn.php');
if(isset($_POST["nombre"])){$nombre =$_POST["nombre"];}else{$nombre = '';}
if(isset($_POST["correo"])){$correo = $_POST["correo"];}else{$correo= '';}
if(isset($_POST["mensaje"])){$mensaje = $_POST["mensaje"];}else{$mensaje= '';}
if(isset($_POST["tel"])){$tel = $_POST["tel"];}else{$tel= '';}

try
{
if($nombre > '' && $correo > '' && $mensaje > '' && $tel > '' )
{
$sql = "INSERT INTO `comentario`(`idco`, `email`, `nombre`, `telefono`, `mensaje`) VALUES (NULL,'$correo','$nombre','$tel','$mensaje');";
$resultado = $conn->query($sql);
echo "<br><span class='msm'>Mensaje enviado con exito</span>";
$conn ->next_result();
}else{}
}

catch (Exception $e) { $error = $e->getMessage(); echo "no";}
?>
</form>
</div>
</div>
</center>


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