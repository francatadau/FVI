<?php
include "lib/seguridad.php";
$seguridad=new Seguridad();
  if($seguridad->getUsuario()==null){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página protegida</title>
    <link rel="stylesheet" href="./css/test.css">
    <style>
    form{
      position: absolute;
      border: solid;
      text-align: center;
      bottom: 1px;
    }
    </style>
  </head>
  <body>
    <?php
    if(isset($_POST["accion"])){
        if ($_POST["accion"]=="logout") {
        $seguridad->logOut();
        header('Location: index.php');
        }
    }
    ?>
  </body>
</html>
