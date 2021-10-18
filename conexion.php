<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','classicmodels');

$enlaces = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if(!$enlaces){
	exit("Error en conexion: " . mysqli_connect_error());
}

function consulta($enlaces, $sql){
	$res = mysqli_query($enlaces, $sql);

	if(!$res){
		exit("Error en consulta: " . mysqli_error($enlaces));
	}
	
	return $res;
}
?>