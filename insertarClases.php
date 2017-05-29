<?php
include "lib/seguridad.php";
$seguridad = new Seguridad();
if ($seguridad->getUsuario() == null) {
  header('Location: login.php');
}

$user=$seguridad->getUsuario();
include 'lib/usuario.php';
$comprobar=new usuario();
$resultado=$comprobar->buscarLogin($user);
$usuario=$resultado['id_usuario'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <link rel="stylesheet" href="./css/formulario.css">
  <link rel="stylesheet" href="./css/test.css">
</head>
<body>

</body>
</html>
<?php
if(isset($_POST["accion"])){
  include "lib/clases.php";
  $clase= new Clases();
	if($_POST["accion"]=="insertar"){
        if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["usuario"]) && !empty($_POST["etiqueta"])) {
          $tmp_name = $_FILES["imagen"]["tmp_name"];
          $name= basename($_FILES["imagen"]["name"]);
          $ruta="img/$name";
          move_uploaded_file($tmp_name, $ruta);
           $insercion=$clase->insertarClase($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["etiqueta"],$_POST["usuario"],$ruta);
                if (!$insercion) {
                echo "Ha fallado la insercion";
                //recuperar de la bbdd
                  }else{

                    echo "Articulo insertado correctamente";

                    // echo $value["categoria"]."<br>";
                  }

                  // echo "<a href='actualizarClases.php?titulo=".$value["titulo"]."&subtitulo=".$value["subtitulo"]."&descripcion=".$value["descripcion"]."&categoria=".$value["categoria"]." '>Actualizar Articulo</a><br>";

                  // echo "<a href='borrarClases.php?titulo=".$value["titulo"]."'>Borrar Articulo</a><br>";
                  }
        }else{
          header('Location: index.php');
        }

    }
if (empty($_POST)) {

?>
<section>
    <article class="parte2">
      <form class="" action="insertarClases.php" method="post" enctype="multipart/form-data">
        <h1>INSERTA UNA CLASE</h1>
        <input type="hidden" name="usuario" value="<?=$usuario?>">
        <input type="text" name="nombre" value="" placeholder="Introduce un nombre" required><br>
         <input type="text" name="descripcion" value="" placeholder="Introduce una descripcion" required><br>
       <!-- <textarea name="descripcion">


        </textarea><br> -->
        <input type="file" name="imagen" value="Elije archivo" placeholder="Introduce una imagen" required><br>

        <input type="text" name="precio" value="" placeholder="Introduce un precio" required><br>

        <select name="etiqueta">

          <option>Selecciona una etiqueta</option>
          <option>prueba</option>
          <option>papa</option>

        </select>


        <input type="hidden" name="accion" value="insertar">
        <input type="submit" name="" value="insertar">
        <a href="index.php">Volver</a>
      </form>

    </article>
  </section>
 <?php } ?>
</body>
</html>
