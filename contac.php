<?php
if(isset($_POST['emailadmin'])){ $emailadmin = $_POST['emailadmin'];}else{$emailadmin = '';}
if(isset($_POST['claveadmin'])){ $claveadmin = $_POST['claveadmin'];}else{$claveadmin = '';}
if(isset($_POST['showcita'])){ $showcita = $_POST['showcita'];}else{$showcita = '';}
try
{
require_once('ext/conn/conn.php');
$conn ->next_result();

?>
<?php 
include('ext/conn/conn.php');
if(isset($_POST["nombre"])){$nombre =$_POST["nombre"];}else{$nombre = '';}
if(isset($_POST["correo"])){$correo = $_POST["correo"];}else{$correo= '';}
if(isset($_POST["mensaje"])){$mensaje = $_POST["mensaje"];}else{$mensaje= '';}
if(isset($_POST["tel"])){$tel = $_POST["tel"];}else{$tel= '';}
if($nombre !== '' && $correo !== ''&& $tel !== ''){
  
    try{
        include('ext/conn/conn.php');
        $query= "CALL `insert_com` ('$correo','$nombre','$tel','$mensaje'";
        $result = $conn->query($query);

    }catch(Exception $e){
        $error = $e->getMessage();
    }
   // mysqli_free_result($result);
    mysqli_close($conn);
}else{
}
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
<meta charset="utf-8">
<title>INICIO</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.webmanifest">
<meta name="keywords" content="footer, address, phone, icons" />
<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<link rel="apple-touch-icon" href="icon.png">
<link rel="stylesheet" href="css/demo.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/index.css">
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
<!--<a href=""><i class="icon-users"></i> Conocenos</a>-->
<a href=""><i class="icon-phone"></i> Contactos</a>
<a href="acerca.php"><i class="icon-bubbles4"></i> Acerca de</a>
<a href="#especialidades"><i class="icon-aid-kit"></i> Especialidades</a>
</nav>
</header>
<h1>Direccion</h1>
Final Boulevard Los Próceres #23,
contiguo a la Basilica Guadalupe
San Salvador<br>
<h1>Teléfonos</h1>
(503) 2285-5647<br>
(503) 2296-7649<br>
<h1>Correo</h1>
health_for_all@gmail.com<br>
</div>
<div class="comen">
<form action="contac.php" method="POST">
<h1>Envienos su comentario</h1>
<input type="text" name="nombre" placeholder="NOMBRE" required>
<br><br>
<input type="email" name="correo" placeholder="ejemplocorreo@gmail.com" required>
<br><br>
<br><br>
<input type="tel" name="tel" placeholder="telefono" required>
<textarea name="mensaje" placeholder="MENSAJE" required></textarea>
<br>
<br>
<input class="botone" type="submit" value="Enviar">

<footer class="footer-distributed">
<div class="footer-left">
<h3>Health <span>For All</span></h3>
<p class="footer-links">
<a href="#">Inicio</a>-
<a href="#">Contactos</a>-
<a href="#">Acerca de </a>-
<a href="#">Especialidades</a>
</p>
<p class="footer-company-name">Copyright © Todos los derechos reservados 2018 || <a href="" class="correo">Health For All </a></p>
</div>
<div class="footer-center">
<div>
<i class="fa fa-map-marker"></i>
<p><span>21 Revolution Street</span> Paris, France</p>
</div>
<div>
<i class="fa fa-phone"></i>
<p>+503 74938329</p>
</div>
<div>
<i class="fa fa-envelope"></i>
<p><a href="mailto:support@company.com">health_for_al@.com</a></p>
</div>
</div>
<div class="footer-right">
<p class="footer-company-about">
<span>About the company</span>
Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
</p>
<div class="footer-icons">
<a href="#"><i class="icon-facebook"></i></a>
<a href="#"><i class="icon-twitter"></i></a>
<a href="#"><i class="icon-instagram"></i></a>
<a href="#"><i class="icon-mail2"></i></a>
</div>
</div>
</footer>

<?php
}
catch (Exception $e) { $error = $e->getMessage(); }
$conn->close();?>

<script src="js/vendor/modernizr-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>