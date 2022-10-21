<?php
session_start();
if (isset($_SESSION['ad'])) {
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
    <a href="update_admin.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
   </nav>
  </header>

  <body><center>
    <form action="" method="post" class="form_mate">
    <input type="submit" name="mostrar_doc" value="Mostrar Doctores">
    <input type="submit" name="mostrar_enfe" value="Mostrar Enfermeras">
    <input type="submit" name="mostrar_paci" value="Mostrar Pacientes">
    <input type="submit" name="mostrar_emple" value="Mostrar Empleados">
    <input type="submit" name="mostrar_espe" value="Mostrar Especialidades">
    <input type="submit" name="mostrar_comen" value="Mostrar Comentarios">
    </form>
    </center>
    <?php
    if(isset($_POST['mostrar_doc'] )){
      try {
     require_once('conn/conn.php');
     $datos1 = 'SELECT * FROM `doctor`';
     $datos1res = $conn->query($datos1);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="doc" id="doc">
    <h1 class="heroname">Lista de<span> Doctores</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td class="name">Dui</td>
        <td  class="name">Nombre</td>
        <td class="name">Apellido</td>
        <td class="name">Idempleado</td>
        <td class="name">Editar</td>
      </thead>
      <?php while ($datos1mue = $datos1res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2" ><?php echo $datos1mue['Dui'] ?></td>
         <td class="name2" ><?php echo $datos1mue['nombre'] ?></td>
         <td class="name2" ><?php echo $datos1mue['apellido'] ?></td>
         <td class="name2" ><?php echo $datos1mue['idempleado'] ?></td>
         <td class="name2" ><a href="edmantedoc.php?id=<?php echo $datos1mue['iddoctor']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>



     <?php
    if(isset($_POST['mostrar_enfe'] )){
      try {
     require_once('conn/conn.php');
     $datos2 = 'SELECT * FROM `enfermera`';
     $datos2res = $conn->query($datos2);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="enfe" id="enfe">
    <h1 class="heroname">Lista de<span> Enfermeria</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td class="name">Dui</td>
        <td class="name">Nombre</td>
        <td class="name">Apellido</td>
        <td class="name">Idempleado</td>
        <td class="name">Editar</td>
       </tr>
      </thead>
      <?php while ($datos2mue = $datos2res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2"><?php echo $datos2mue['Dui'] ?></td>
         <td class="name2"><?php echo $datos2mue['nombre'] ?></td>
         <td class="name2"><?php echo $datos2mue['apellido'] ?></td>
         <td class="name2"><?php echo $datos2mue['idempleado'] ?></td>
         <td class="name2"><a href="edmanteenfe.php?id=<?php echo $datos2mue['idenfermera']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
        </tr>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>


    <?php
    if(isset($_POST['mostrar_paci'] )){
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
        <td  class="name" >Dui</td>
        <td class="name" >Nombre</td>
        <td class="name" >Apellido</td>
        <td class="name" >Editar</td>
       </tr>
      </thead>
      <?php while ($datos3mue = $datos3res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2"><?php echo $datos3mue['Dui'] ?></td>
         <td class="name2"><?php echo $datos3mue['nombre'] ?></td>
         <td class="name2"><?php echo $datos3mue['apellido'] ?></td>
         <td class="name2"><a href="edmantepac.php?id=<?php echo $datos3mue['Dui']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
        </tr>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>


     <?php
    if(isset($_POST['mostrar_emple'] )){
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
        <td class="name" >Id empleado</td>
        <td class="name" >Email</td>
        <td class="name" >Editar</td>
      </thead>
      <?php while ($datos6mue = $datos6res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2"><?php echo $datos6mue['idempleado'] ?></td>
         <td class="name2"><?php echo $datos6mue['email'] ?></td>
         <td class="name2"><a href="edmanteemple.php?id=<?php echo $datos6mue['idempleado']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Editar</button></a></td>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>

     <?php
    if(isset($_POST['mostrar_espe'] )){
        try {
     require_once('conn/conn.php');
     $datos4 = 'SELECT * FROM `especialidad`';
     $datos4res = $conn->query($datos4);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="espe" id="espe">
    <h1 class="heroname">Lista de<span> Especialidades</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td class="name" >Id Especialidad</td>
        <td class="name" >Nombre</td>
      </thead>
      <?php while ($datos4mue = $datos4res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2"><?php echo $datos4mue['idespecialidad'] ?></td>
         <td class="name2"><?php echo $datos4mue['nombre'] ?></td>
        </tr>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>

    <?php
    if(isset($_POST['mostrar_comen'] )){
        try {
     require_once('conn/conn.php');
     $datos5 = 'SELECT * FROM `comentario`';
     $datos5res = $conn->query($datos5);
     $conn->next_result();
    } catch (Exception $e) {
     $error = $e->getMessage();
    }
    ?>
   <div class="com" id="com">
    <h1 class="heroname">Lista de<span> Comentarios</span></h1>
    <div class="arg">
     <table class="cen">
      <thead>
       <tr>
        <td class="name" >Id Comentario</td>
        <td class="name" >Email</td>
        <td class="name" >Nombre</td>
        <td class="name" >Telefono</td>
        <td class="name" >Mensaje</td>
        <td class="name" >Eliminar</td>
      </thead>
      <?php while ($datos5mue = $datos5res->fetch_assoc()) { ?>
       <tbody>
        <tr>
         <td class="name2"><?php echo $datos5mue['idco'] ?></td>
         <td class="name2"><?php echo $datos5mue['email'] ?></td>
         <td class="name2"><?php echo $datos5mue['nombre'] ?></td>
         <td class="name2"><?php echo $datos5mue['telefono'] ?></td>
         <td class="name2"><?php echo $datos5mue['mensaje'] ?></td>
         <td class="name2"><a href="elmantecom.php?id=<?php echo $datos5mue['idco']; ?>"><button class="botdoc"><i class="fa fa-pencil"></i>  Eliminar</button></a></td>
        </tr>
       </tbody>
      <?php } ?>
     </table>
    </div>
   </div>
    <?php } ?>


  </body>
<?php } else {
   header("Location: ../index.php?out=si");
  } ?>

 </html>