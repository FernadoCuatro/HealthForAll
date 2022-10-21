<?php
if (isset($_POST['emailadmin'])) { $emailadmin = $_POST['emailadmin'];} else { $emailadmin = '';}
if (isset($_POST['claveadmin'])) { $claveadmin = $_POST['claveadmin'];} else { $claveadmin = '';}
if (isset($_POST['duicita'])) { $duicita = $_POST['duicita'];} else { $duicita = '';}
if (isset($_POST['pwcita'])) { $pwcita = $_POST['pwcita'];} else { $pwcita = '';}
try {
 require_once('ext/conn/conn.php');
 $conn->next_result();

 ?>
 <!doctype html>
 <html class="no-js" lang="es">

 <head>
  <meta charset="utf-8">
  <link rel="icon" type="image/ico" href="img/cruz.ico">
  <title>INICIO</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <meta name="keywords" content="footer, address, phone, icons" />
  <link rel="stylesheet" href="css/footer.css">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="css/demo.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <meta name="theme-color" content="#fafafa">
 </head>

 <body>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="js/javascript.js"></script>
  <header>
   <h1>BIENVENIDO A</h1>
   <img src="img/heal.png" class="logo">
   <nav>
    <a href="ext/especialidades.php"><i class="icon-aid-kit"></i> Especialidades</a>
    <a href="ext/contactos.php"><i class="icon-phone"></i> Contactos</a>
    <a href="ext/acercade.php"><i class="icon-bubbles4"></i> Acerca de</a>
   </nav>
  </header>
  <center>
   <div class="buttom">
    <div class="reserva">
     <h1>La Mejor atención y Servicio de Calidad lo Tienes Solo Aquí</h1><br>
     <h3 class="inf">Health For All te atendera de manera satisfactoria
      por medio de nuestro personal capacitado y dispuesto a atenderte a todo momento, realiza tu cita con nosotros ahora mismo, muy fácil, confiable y rapido.
     </h3>
    </div>
    <h4>
     <?php if (isset($_GET['delete']) == "on") {
       echo "<h4 class='archivo'>Cita eliminada correctamente. <br/><h4>";
      }
      if (isset($error1)) {
       echo $error1 . "<br/>";
      }
      if (isset($_GET['cita']) == "on") {
       echo "<h4 class='archivo'>Cita Reservada.</h4> <br/>";
      } else if (isset($_GET['cita']) == "off") {
       echo "<h4 class='archivo'>No se reservo su cita, intente mas tarde.</h4> <br/>";
      }
      if (isset($_GET['aggpa']) == "on") {
       echo "<h4 class='archivo'>Paciente Archivado. </h4><br/>";
      }
      if (isset($_GET['out']) == "si") {
       echo "<h4 class='archivo'>No puede ingresar, Inicie sesion. </h4><br/>";
      } ?></h4>
    <br><br>
    <div class="opbut">
     <a href="#" class="bot-cita" onclick="mostrar3(this); return false" />HACER CITA</a><br><br>
     <div id="oculto3" style="visibility:hidden">
      <a href="ext/hcitas.php" class="bot-oculto">PACIENTE</a>
      <a href="ext/hcitasdoc.php" class="bot-oculto">DOCTOR</a>
      <a href="ext/hcitasenfe.php" class="bot-oculto">ENFERMERIA</a>
     </div>
    </div>
    <div class="opbut">
     <a href="#" class="bot-cita" onclick="mostrar(this); return false" />ADMINISTRAR</a>
     <?php
      if ($emailadmin > '' && $claveadmin > '') {
       $sql = "SELECT * FROM empleado WHERE email = '$emailadmin' and contra = '$claveadmin';";
       $resultado = $conn->query($sql);
       $filas = mysqli_num_rows($resultado);
       if ($filas > 0) {
        session_start(); $_SESSION["ad"]="$emailadmin";
        header("Location: ext/admin.php");
       } else {
        echo  "<h4  class='error'>Error en el usuario, por favor vuelva a intentarlo.</h4>";
       }
      } ?>
     <div id="oculto" style="visibility:hidden">
      <br>
      <a href="ext/arpaci.php"><button class="archi">ARCHIVAR PACIENTE</button></a>
      <form action="index.php" method="post">
       <input type="email" name="emailadmin" id="email" required autocomplete="off" placeholder="EMAIL" class="input-admin">
       <input type="password" name="claveadmin" id="pw" required autocomplete="off" placeholder="***********" class="input-admin"><br>
       <button type="submit">INGRESAR</button>
      </form>
     </div>
    </div>
    <div class="opbut" class="oubut-q">
     <a href="#" class="bot-cita" onclick="mostrar2(this); return false" />VER CITAS</a>
     <?php
      if ($duicita !== '') {
       session_start();
       $_SESSION["vcitas"] = "$duicita";
       $verci = "SELECT * FROM `paciente` WHERE `Dui`='$duicita' and `clave`='$pwcita';";
       $vercires = $conn->query($verci);
       $vercifil = mysqli_num_rows($vercires);
       if ($vercifil > 0) {
        session_start();
        $_SESSION["sess"] = "$duicita";
        header("Location: ext/vcitas.php");
       } else {
        echo "<h4 class='error'>No se encuentran resultados en la busqueda del usuario.</h4>";
       }
      }
      ?>
     <div id="oculto2" style="visibility:hidden">
      <form action="" method="post"><br>
       <label for="showcita" class="showcita">
        <h4>Ingresa su DUI:</h4>
       </label>
       <input type="text" name="duicita" id="duicita" required autocomplete="off" class="input-admin" minlength="9" maxlength="10"><br>
       <label for="showcita" class="showcita">
        <h4>Ingresa su Contraseña:</h4>
       </label>
       <input type="password" name="pwcita" id="pwcita" required autocomplete="off" class="input-admin"><br>
       <button type="submit">Ver</button>
      </form>
     </div>
    </div>
   </div>
  </center>

  <center>
   <div class="conter-todo">
    <div class="cajas">
     <h1>Nuestras Especialidades</h1>
     <h3>Contamos con equipo de alta tecnologia a travez de nuestras remodeladas y modernas instalaciones.<br><br>Nuestros servicios de apoyo (Laboratorio Clínico, Rayos X, Ultrasonografìa entre otros). Nos permiten ofrecer un servicio más profesional y eficiente, en los diagnósticos médicos de cualquier enfermedad. <br><br>Una de nuestras principales ventajas para nuestros pacientes es que al contar con múltiples recursos de sofisticados equipos y accesorios, el paciente se beneficia ya que los tratamientos son oportunos e inmediatos. </h3>
    </div>


    <div class="especialidades">

     <div class="filas-espe">
      <img src="img/1x.jpg"><br>
      <span class="name">Nefrología</span><br>
      <span class="mini-name">Tratamiento y prevencion de enfermadades renales</span>
     </div>

     <div class="filas-espe">
      <img src="img/2x.jpg"><br>
      <span class="name">Cardiología</span><br>
      <span class="mini-name">Tratamiento y prevencion de enfermadades del corazon</span>
     </div>

     <div class="filas-espe">
      <img src="img/3x.jpg"><br>
      <span class="name">Dermatología</span><br>
      <span class="mini-name">Tratamiento y prevencion de enfermedades de la piel</span>
     </div>

     <div class="filas-espe">
      <img src="img/5x.jpg"><br>
      <span class="name">Odontología</span><br>
      <span class="mini-name">Tratamiento y prevencion de enfermedades de los dientes y ancias</span>
     </div>

     <div class="filas-espe">
      <img src="img/6x.jpg"><br>
      <span class="name">Medicina General</span><br>
      <span class="mini-name">Estudio de la vida y la salud</span>
     </div>

     <div class="filas-espe">
      <img src="img/7x.jpg"><br>
      <span class="name">Pediatría</span><br>
      <span class="mini-name">Tratamiento y prevencion de enfermadades en los niños</span>
     </div>
    </div>



   </div>
   </div>
  </center>


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
    </p>
    <div class="footer-icons">
     <a href="https://www.facebook.com/Health_for_all-102188101179595/?modal=admin_todo_tour" target="_blank"><i class="icon-facebook"></i></a>
     <a href="https://twitter.com/" target="_blank"><i class="icon-twitter"></i></a>
     <a href="https://www.instagram.com/accounts/login/?hl=es-la" target="_blank"><i class="icon-instagram"></i></a>
     <a href="ext/contactos.php"><i class="icon-mail2"></i></a>
    </div>
   </div>
  </footer>

 <?php
 } catch (Exception $e) {
  $error = $e->getMessage();
 }
 $conn->close(); ?>

 <script src="js/vendor/modernizr-3.7.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 <script>
  window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
 </script>
 <script src="js/plugins.js"></script>
 <script src="js/main.js"></script>
 </body>
 </html>