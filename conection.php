<?php

function conectar(){
	$con = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=petit1415") 
	or die("Error de conexion".pg_last_error());
}
