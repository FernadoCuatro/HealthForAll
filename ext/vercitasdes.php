<?php
session_start();
if (isset($_SESSION['sess']) && (isset($_GET['idecita']))) {
 try {
  require_once('conn/conn.php');
  if (isset($_GET['idecita'])) {
   $idecita = $_GET['idecita'];
  }
  $vcitas = "SELECT * FROM `cita`WHERE `idecita`='$idecita'";
  $vcitasres = $conn->query($vcitas);
 } catch (Exception $e) {
  $error = $e->getMessage();
 }

 
 ?>
 <!DOCTYPE html>
 <html lang="es">

 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/ico" href="../img/cruz.ico">
  <title>VER CITA</title>
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
  <link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/user.css">
 </head>

 <body>
  <header>
   <nav>
    <a href="vcitas.php"><i class="icon-users"></i> Atras</a>
    <a href="especialidades.php"><i class="icon-users"></i> Especialidades</a>
    <a href="contactos.php"><i class="icon-phone"></i> Contactos</a>
    <a href="acercade.php"><i class="icon-bubbles4"></i> Acerca de</a>
    <a href="xcsesuser.php"><i class="icon-users"></i> Cerrar sesión</a>
   </nav>
  </header>
  <div id="historial">
   <center><img src="../img/hero.png" alt="hero" height="100px"></center>
   <div class="conten">
    <center>
     <h1>Descripcion reservacion Cita:</h1>
     <?php while ($datosvcitas = $vcitasres->fetch_assoc()) { ?>
      <p>Fecha: <?php echo $datosvcitas['fecha']; ?></p>
      <p>Hora: <?php echo $datosvcitas['hora']; ?></p>
      <p>Especialidad: <?php echo $datosvcitas['idespecialidad']; ?></p>
      <h1>Descripcion Personal:</h1>
      <p><?php $iduser = $datosvcitas['Dui']; ?></p>
      <?php
        $adminom = "SELECT * FROM `paciente` WHERE `Dui`='$iduser';";
        $adminomres = $conn->query($adminom);
        while ($datos2 = $adminomres->fetch_assoc()) { ?>
       <p>Nombre: <?php echo $datos2['nombre']; ?></p>
       <p>Apellido: <?php echo $datos2['apellido']; ?></p> <?php } ?><?php } ?>
   </div>
  </div>
  </center>
  <div class="anun">
   <h2>Al tener necesidad de eliminar una cita se pide antentamente comunicarse con los adminitradores al numero <span class="t1">(+503)</span><span class="t2">2215-9823</span> y <span class="t1">(+503)</span><span class="t2">6422-9837</span>.</h2>
  </div>

  <div class="impr">
   <center><a class="impr" href="javascript:imprSelec('historial')">Imprimir citas</a></center>
  </div>

  <footer class="footer-distributed">
   <div class="footer-left">
    <h3>Health <span>For All</span></h3>
    <p class="footer-links">
     <a href="ext/especialidades.php">Especialidades || </a>
     <a href="ext/contactos.php"> Contactos || </a>
     <a href="ext/acercade.php"> Acerca de </a>
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
   </div>
  </footer>
 <?php $conn->close(); } else {
  header("Location: ../index.php?out=si");

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
 </script>
 </body>
 </html>