

<?php
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$mail = $_POST['correo'];	


	$host_db = "localhost";
	$user_db = "root";
	$pass_db ="";
	$db_name ="controluser";
	$table_name = "registro";
	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion -> connect_error) { 
		die ("La Concion Falló".$conexion -> connect_error);
	}
	$buscarUsuario = "SELECT * FROM $table_name WHERE username = '$user' ";
	$resultado = $conexion -> query($buscarUsuario);
	$count = mysqli_num_rows($resultado);

	if ($count == 1) {
		echo "<br/ El nombre de Usuario <br /> ";
		echo "<a href='registrar.html'> Por favor escoja un usuario diferente </a>";
	} 
	else{
		$query = "INSERT INTO registro Values('','$user', '$pass', '$mail')";
		 if ($conexion -> query($query) == true) {
			echo "<br />"."<h1>"."Usuario Creado Correctamente"."<h1/>";
			echo "<br>";
			echo "<h3>"."Bienvenido: ".$_POST['username']. "<h3/>";
			echo "<br>";
			echo "<br>";
			echo "<h3>"."Iniciar sesion"."<a href=iniciar.html'>Iniciar seccion <a/>"."</h3";
			}else
				echo "Error al crear el usaurio".$query."<br>".$conexion -> error;
	 }
			
?>
</body>
</html>