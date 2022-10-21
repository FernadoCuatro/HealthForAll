<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" type="image/ico" href="../img/cruz.ico">
 <title>PACIENTE</title>
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
 <link rel="stylesheet" type="text/css" href="../css/arpaci.css">
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
  <form action="" method="post">
   <?php if (isset($notexis)) {
    echo $notexis . "<br/>";
   }
   if (isset($duiex)) {
    echo $duiex . "<br/>";
   } ?>
   <?php
   if (isset($_POST['duiuser'])) {
    $duiuser = $_POST['duiuser'];
   } else {
    $duiuser = '';
   }
   if (isset($_POST['nombreuser'])) {
    $nameuser = $_POST['nombreuser'];
   } else {
    $nameuser = '';
   }
   if (isset($_POST['apellidouser'])) {
    $apellidouser = $_POST['apellidouser'];
   } else {
    $apellidouser = '';
   }
   if (isset($_POST['claveuser'])) {
    $claveuser = $_POST['claveuser'];
   } else {
    $claveuser = '';
   }
   if (isset($_POST['codigoemple'])) {
    $codigoemple = $_POST['codigoemple'];
   } else {
    $codigoemple = '';
   }
   try {
    require_once('conn/conn.php');
    if ($duiuser > '' and $nameuser > '' and $apellidouser > '' and $codigoemple > '') {
     $sql0 = "SELECT * FROM `empleado` WHERE `idempleado`='$codigoemple'";
     $resultado0 = $conn->query($sql0);
     $filas0 = mysqli_num_rows($resultado0);
     if ($filas0 > 0) {
      $sqlv05 = "SELECT * FROM `paciente` WHERE `Dui`='$duiuser';";
      $resultadov05 = $conn->query($sqlv05);
      $filasv05 = mysqli_num_rows($resultadov05);
      if ($filasv05 > 0) {
       $duiex = "<h3 class='archivo'>El DUI ingresado ya existe.</h3>";
      } else {
       $sql = "INSERT INTO `paciente`(`Dui`, `nombre`, `apellido`, `clave`) VALUES ('$duiuser','$nameuser','$apellidouser','$claveuser')";
       $resultado = $conn->query($sql);
       header("Location: ../index.php?aggpa=on");
      }
     } else {
      $notexis = "<h3 class='archivo'> El codigo de empleado no existe.</h3>";
     }
    }
   } catch (Exception $e) {
    $error = $e->getMessage();
   }
   ?>
   <?php if (isset($notexis)) {
    echo $notexis . "<br/>";
   }
   if (isset($duiex)) {
    echo $duiex . "<br/>";
   } ?>
   <h2>Agregar <span>Paciente</span></h2><br>
   <input type="text" name="duiuser" id="1" required autocomplete="off" placeholder="DUI" minlength="9" maxlength="10" autocomplete="off" onkeypress="return numeros(event)" class="form-input"><br>
   <input type="text" name="nombreuser" id="2" required autocomplete="off" placeholder="NOMBRE" class="form-input"><br>
   <input type="text" name="apellidouser" id="3" required autocomplete="off" placeholder="APELLIDO" class="form-input"><br>
   <input type="password" name="claveuser" id="5" required autocomplete="off" placeholder="CONTRASEÑA" class="form-input" minlength="5" maxlength="20"><br>
   <input type="text" name="codigoemple" id="4" required autocomplete="off" placeholder="Nº DOCTOR O Nº ENFERMERA" class="form-input">
   <br><br>
   <input type="submit" value="Archivar Paciente"><br>
   <a href="../index.php"><input type="button" value="Inicio" class="volver"></a>
  </form>
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
 <script src="js/numero.js"></script>
</body>

</html>