<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "68.70.164.26";    // sera el valor de nuestra BD 
	$basededatos = "polizona_in13";    // sera el valor de nuestra BD 
	$usuariodb = "polizona_in13";    // sera el valor de nuestra BD 
	$clavedb = "Siete*Dos=21";    // sera el valor de nuestra BD 

	//Lista de Tablas
    $tabla_db1 = "embarques"; 	   // tabla de usuarios
    $tabla_db2 = "financieras";
    $tabla_db3 = "encadenamientos";
    $vista='totaltodas';
	

	error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>
