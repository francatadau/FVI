<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

      <script src="js/index5.js"></script>

  </head>
  <body>

<?php
//Archivo de conexión ae la base de datos



//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001
	//donde el nombre sea igual a $consultaBusqueda,
	//o el apellido sea igual a $consultaBusqueda,
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$conexion = mysqli_connect("34.210.93.31", "administrador", "Grupo4flovei", "fvi");
	$consulta = mysqli_query($conexion,"SELECT * FROM sacarUT WHERE
	nombre LIKE '%$consultaBusqueda%'");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = '<p style="position: absolute; top: 7%;">No hay ningún dato para <strong>'.$consultaBusqueda.'</strong></p>';
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo '<p style="position: absolute; top: 7%;"> Mostrando resultados para <strong>'.$consultaBusqueda.'</strong></p>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados['nombre'];
			$descripcion = $resultados['descripcion'];
			$precio = $resultados['precio'];
			$etiqueta = $resultados['etiqueta'];
			$usuario = $resultados['usuario'];
		  $telefono = $resultados['telefono'];


			//Output
			$mensaje .= '
			<article>
      <div class="card">
      ' . "<img src=".$resultados['imagen'].">".'
        <div class="card-title">
          <a href="javascript:;" class="toggle-info btn">
            <span class="left"></span>
            <span class="right"></span>
          </a>
          <h2>
              ' . $nombre . '
              <small> ' . $precio . ' €</small>
          </h2>
        </div>
        <div class="card-flap flap1">
          <div class="card-description">
            ' . $descripcion . ' <br>
            <strong>Usuario:</strong> ' . $usuario . '<br>
            <strong>Telefono:</strong> ' . $telefono . '<br>
          </div>
          <div class="card-flap flap2">
          <strong>Precio:</strong> ' . $precio . '<br>
          <strong>Etiqueta:</strong> ' . $etiqueta . '<br>
            <div class="card-actions">

              <a href="#" class="btn">Read more</a>
            </div>
          </div>
        </div>
        </div>
      </article>';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
</body>
</html>
