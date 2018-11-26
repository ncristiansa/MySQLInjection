<!DOCTYPE html>
<html>
<head>
	<title>Login User</title>
</head>
<body>
<?php 
echo "<h2>Accede.</h2>";
echo "<form action='LoginInjection.php' method='POST' >";
echo "Usuario<br>";
echo "<input type='text' name='nom'><br>";
echo "password<br>";
echo "<input type='password' name='password'><br>";
echo "<input type='submit' value='Enviar' name='submit'><br>";
echo "</form>";
$nombre=$_POST["nom"];
$pass=$_POST["password"];
$conn = mysqli_connect('localhost','cristian','cristian123');
mysqli_select_db($conn, 'datos');
$consulta = "SELECT * FROM Login WHERE Usuario='$nombre' and Passwd=SHA2('$pass',512) ;";
$resultat = mysqli_query($conn, $consulta);
$registre = mysqli_fetch_assoc($resultat);
	if ($registre!=null) {
		echo $registre["Usuario"]." el usuario existe"; 
	}else{
		echo "El Usuario no existe";
	}
?>
</body>
</html>