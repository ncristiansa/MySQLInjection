<!DOCTYPE html>
<html>
<head>
	<title>Login User</title>
</head>
<body>
<?php 
	echo "<h2>Accede</h2>";
	//Formulario
		echo "<form action='Login.php' method='POST' >";
			echo "Usuario<br>";
			echo "<input type='text' name='nom'><br>";
			echo "password<br>";
			echo "<input type='password' name='password'><br>";
			echo "<input type='submit' value='Enviar' name='submit'><br>";
		echo "</form>";

			$nombre=$_POST["nom"];
			$pass=$_POST["password"];
			$login="mysql:host=localhost;dbname=datos";
			$conn = new PDO($login,"cristian","cristian123");
	$stmt = $conn->prepare("SELECT * FROM Login WHERE Usuario=:nombre and Passwd=SHA2(:pass,512)");
	$stmt->bindValue(':nombre',$nombre);
	$stmt->bindValue(':pass',$pass);
	$stmt->execute();
	$result=$stmt->rowCount();
			if ($result==1) {
				echo "Hola soy: $nombre";
			}else{
				echo "Usuario no encontrado";
			}
?>
</body>
</html>