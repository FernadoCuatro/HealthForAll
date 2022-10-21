<?php
/*session_start();
if (isset($_SESSION['ad'])) {*/
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
    <a href="admin.php"><i class="fa fa-angle-double-left"></i> Atras</a>
    <form action="" method="post"><input type="submit" name="mostrar_doc"></form>
    <a href="update_admin.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
   </nav>
  </header>

  <body>

  
  <form accept="" method="POST"> 
    <input type="submit" name="mostrar_doc" value="Doctores">
      <input type="submit" name="mostrar_enfe" value="Doctores">
    <?php
if(isset($_POST['mostrar_doc'] )){

   try {
     require_once('conn/conn.php');
     $datos3 = 'SELECT * FROM `paciente`';
     $datos3res = $conn->query($datos3);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="pac" id="pac">
    <h1 class="heroname">Lista de<span> Pacientes</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td>Dui</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Editar</td>
        <td>Eliminar</td>
       </tr>
      </thead>
      <?php while ($datos3mue = $datos3res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td><?php echo $datos3mue['Dui'] ?></td>
         <td><?php echo $datos3mue['nombre'] ?></td>
         <td><?php echo $datos3mue['apellido'] ?></td>
         <td><a href="edmantepac.php?id=<?php echo $datos3mue['Dui']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
         <td><a href="elmantepac.php?id=<?php echo $datos3mue['Dui']; ?>"><button class="botdoc"><i class="fa fa-trash "></i>  Eliminar</button></a></td>
        </tr>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
<?php  } ?>

 <?php
if(isset($_POST['mostrar_enfe'] )){

   try {
     require_once('conn/conn.php');
     $datos6 = 'SELECT * FROM `empleado`';
     $datos6res = $conn->query($datos6);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="emple" id="emple">
    <h1 class="heroname">Lista de<span> Empleados</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td>Idempleado</td>
        <td>Email</td>
        <td>Editar</td>
      </thead>
      <?php while ($datos6mue = $datos6res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td><?php echo $datos6mue['idempleado'] ?></td>
         <td><?php echo $datos6mue['email'] ?></td>
         <td><a href="edmanteemple.php?id=<?php echo $datos6mue['idempleado']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
<?php  } ?>

  </form>

  




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
     <a href="contactos.php"><i class="icon-mail2"></i></a>
    </div>
   </div>
  </footer>

  <?php /*} else {
   header("Location: ../index.php?out=si");
  } */?>
  </body>
 </html>