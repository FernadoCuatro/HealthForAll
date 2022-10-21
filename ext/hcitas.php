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
 <link rel="manifest" href="site.webmanifest">
 <link rel="stylesheet" href="../css/normalize.css">
 <link rel="stylesheet" type="text/css" href="../css/footer.css">
 <link rel="stylesheet" href="../css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Doppio+One&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../css/main.css">
 <link rel="stylesheet" type="text/css" href="../css/hcitas.css">
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
  <form action="hcitasho.php" method="post">
   <?php if (isset($_GET['notpa']) == "off") {
    echo "<h3 class='archivo'>El paciente no esta Archivado.<br> <a href='arpaci.php'>Archivar Aqui</a><br/></h3>";
   } ?>

   <h2>Informacion <span>Personal</span></h2><br>
   <input type="text" name="duiuser" id="1" placeholder="DUI" minlength="9" maxlength="10" autocomplete="off" onkeypress="return numeros(event)" class="form-input"><br><br>
   <h2><span class="l1">Reservacion</span> <span class="letra">de cita</span> </h2><br>
   <select name="espe" id="5" required>
    <option value="">ESPECIALIDADES</option>
    <option value="CARDIOLOGIA">CARDIOLOGIA</option>
    <option value="DERMATOLOGIA">DERMATOLOGIA</option>
    <option value="ODONTOLOGIA">ODONTOLOGIA</option>
    <option value="NEFROLOGIA">NEFROLOGIA</option>
    <option value="PEDIATRIA">PEDIATRIA</option>
    <option value="GENERAL">ATENCION GENERAL</option>
   </select><br><br>
   <label for="4">
    <h3 class='archivo'>Fecha</h3>
   </label><br>
   <input type="date" name="fechaci" id="4" min=<?php date_default_timezone_set('America/Mexico_City'); setlocale(LC_TIME, 'es_MX.UTF-8'); $hoy = strftime("%Y-%m-%d"); echo $hoy; ?> required><br><br>
   <input type="submit" value="Ver horarios"><br>
   <div class="overlay">
    <div class="con">
     <br>
     <div class="field-set">
      <br>
     </div>
     <div class="other">
      <button class="btn submits frgt-pass" type="reset" onclick="">Limpiar</a></button>

      <a href="../index.php"><input type="button" value="Inicio" class="volver"></a>

     </div>
    </div>
   </div>
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