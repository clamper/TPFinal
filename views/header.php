<!doctype html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

     <title>TP FINAL Terran - Vega</title>
</head>
<body>


<?php

// $_SESSION['userType'] MANEJA EL TIPO DE USUARIO QUE ES


if (!isset($_SESSION['userType']))
	$_SESSION['userType'] = "public";


switch ($_SESSION['userType'])
{
	case "public":	echo "<nav class='navbar navbar-light bg-light'>PUBLIC</nav>";
					break;

	case "user":	echo "<nav class='navbar navbar-light bg-light'>USER</nav>";
				
					break;

	case "admin":	echo "<nav class='navbar navbar-light bg-light'>ADMIN</nav>";
					break;
}


?>
