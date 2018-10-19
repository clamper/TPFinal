<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/v4-shims.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <style>
        @media (min-width: 576px) {
            .card-columns {
                column-count: 1;
            }
        }
        
        @media (min-width: 576px) {
            .card-columns {
                column-count: 2;
            }
        }
        
        @media (min-width: 768px) {
            .card-columns {
                column-count: 3;
            }
        }
        
        @media (min-width: 992px) {
            .card-columns {
                column-count: 5;
            }
        }
        
        @media (min-width: 1200px) {
            .card-columns {
                column-count: 5;
            }
        }
    </style>




    <title>TP FINAL Terran - Vega</title>
</head>

<body>


    <?php

// $_SESSION['userType'] MANEJA EL TIPO DE USUARIO QUE ES


if (!isset($_SESSION['userType']))
	$_SESSION['userType'] = "public";


switch ($_SESSION['userType'])
{
	case "public":	require_once(VIEWS_PATH."publicnav.php");;
					break;

	case "user":	echo "<nav class='navbar navbar-light bg-light'>USER</nav>";
				
					break;

	case "admin":	echo "<nav class='navbar navbar-light bg-light'>ADMIN</nav>";
					break;
}


?>