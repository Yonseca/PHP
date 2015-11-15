<?php
define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

$connection = mysql_connect('DB_HOST','DB_USER','DB_PASSWORD');/*Le decimos la conexion que tiene que efectuar, para ello le decimos:
-> El Host al que tiene que conectar
-> El usuario con el que entrar para MYSQL
-> La contrasenya para entrar en el sistema*/
$db = mysql_select_db('DB_NAME',$connection);//Y por ultimo seleccionamos la base de datos con la que queremos trabajar

$User = $_POST['user'];
$Password = $_POST['pass'];

function signIn(){
  session_start();
  if(!empty($_POST['user'])){
    $query = mysql_query("SELECT * FROM login where user=".$_POST['user']." AND pass=".$_POST['pass'].");
    $row = mysql_fetch_array($query);
    if(!empty($row['user']) AND !empty($row['pass'])){
		$_SESSION['user'] = $row['pass'];
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
    }
	   else
	     {
		        echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	     }
  }
}

if(isset($_POST['submit']))
{
	SignIn();
}
?>
