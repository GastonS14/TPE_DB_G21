<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<base href='http://localhost/TPE_DB_G21/'>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<title>Games</title>
</head>
<body class="fondo">
	<header>
			<nav class="navbar navbar-expand-md navbar-light bg-light">
		  		<a class="navbar-brand" href="evento">
		  			<h1>En un cumple events</h1>
		  		</a>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>
			  	<div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				     	<li class="nav-item">
				       		<a class="nav-link" href="evento">Eventos</a>
				     	</li>
				     	<li class="nav-item rojo">
				        	<a class="nav-link" href="category">Categorías</a>
				     	</li>
				     	<li class="nav-item rojo">
				        	<a class="nav-link" href="especiales">Especiales</a>
				     	</li>
				     	{if ($user_permiso==1)}
				     	<li class="nav-item active">
				        	<a class="nav-link" href="user">Usuario</a>
				     	</li>
				     	{/if}
				     	<li class="nav-item active">
				        	<a class="nav-link" href="logout">Cerrar sesión</a>
				     	</li>
				    </ul>
				</div>
			</nav>
	</header>