<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "localhost";    // sera el valor de nuestra BD 
	$basededatos = "polizona_mercado";    // sera el valor de nuestra BD 
	$usuariodb = "Miguel";    // sera el valor de nuestra BD 
	$clavedb = "12345";    // sera el valor de nuestra BD 

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