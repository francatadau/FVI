
<?php
include "lib/usuario.php";
$user=new usuario();
include "lib/seguridad.php";
$seguridad = new Seguridad();
include "lib/clases.php";
$clase= new Clases();
include "lib/libros.php";
$libro= new Libros();
include "lib/electronica.php";
$elec= new Electronica();
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/test.css">
  </head>
  <body>
      <nav>
        <ul>
          <li><a class="active" href="index.php">Inicio</a></li>
          <li><a href="listarArticulos.php">LISTAR ELECTRONICA</a></li>
          <li><a href="listarLibros.php">LISTAR LIBROS</a></li>
          <li><a href="listarClases.php">LISTAR CLASES PARTICULARES</a></li>

          <li><a href="insertarArticulo.php">insert ELECTR SERA PARTE PRIV</a></li>
          <li><a href="insertarLibro.php">insert LIBROS SERA PARTE PRIV</a></li>
          <li><a href="insertarClases.php">insert CLASES SERA PARTE PRIV</a></li>
          <!-- <li><a href="#actualizarEvento.php">VER ARTICULOS</a></li> -->
          <?php
          if ($seguridad->getUsuario()==null) {
            ?>
            <button type="button" onclick="location.href='login.php'">ves a login</button>
          <?php
          }else{


            ?>

    <div>
      <h2>Estoy dentro. Tu usuario es <?=$seguridad->getUsuario()?></h2>
      <form method="post" action="protegida.php">
        <input type="hidden" name="accion" value="logout">
        <input type="submit" value="LogOut">
      </form>
    </div>
    <?php
    if(isset($_POST["accion"])){
        if ($_POST["accion"]=="logout") {
        $seguridad->logOut();
        echo "<h2>LogOut, sesion cerrada</h2></br>";
        echo "<a href=index.php>Sal y vuelve al principio</a>";
        }
    }
    }
    ?>

    <br>
    <?php
  	$tabla=$elec->devolverTodosArticulos();
  	foreach ($tabla as $fila) {
  		echo "<article>";
  	    echo "<div>";
  	    echo "<img src='".$fila['imagen']."'>";
  	    echo "</div>";
  	    echo "<div>";
  	    echo "<b>Titulo: </b>".$fila["nombre"]."<br>";
  	    echo "<b>Descripcion: </b>".$fila["descripcion"]."<br>";
  	    echo "</div>";
  	    echo "</article>";
  	}
  ?>

  <br>  	<?php
  	$tabla=$clase->devolverTodasClases();
  	foreach ($tabla as $fila) {
  		echo "<article>";
  	    echo "<div>";
  	    echo "<img src='".$fila['imagen']."'>";
  	    echo "</div>";
  	    echo "<div>";
  	    echo "<b>Nombre: </b>".$fila["nombre"]."<br>";
  	    echo "<b>Descripcion: </b>".$fila["descripcion"]."<br>";
  	    echo "<b>Precio: </b>".$fila["precio"]."<br>";
  	    echo "</div>";
  	    echo "</article>";
  	}
  ?>

  <?php
  $tabla=$libro->devolverTodosLibros();
  foreach ($tabla as $fila) {
    echo "<article>";
      echo "<div>";
      echo "<img src='".$fila['imagen']."'>";
      echo "</div>";
      echo "<div>";
      echo "<b>Nombre: </b>".$fila["nombre"]."<br>";
      echo "<b>Descripcion: </b>".$fila["descripcion"]."<br>";
      echo "<b>Precio: </b>".$fila["precio"]."<br>";
      echo "</div>";
      echo "</article>";
  }
?>






        </ul>
      </nav>





</section>
</body>
</html>
