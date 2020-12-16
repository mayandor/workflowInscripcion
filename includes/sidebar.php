<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="sidenav">
        <h1 class="titulo">SIA</h1>
        <img src="./img/birrete.png" alt="" width="60">
        <?php
            if($_SESSION['rol']=='e'){
        ?>
        <div id="menu">
        <ul>
            <li class="parent">
                <a href="#"><span class="material-icons">school</span>  Curso de Verano</a>
                <ul>
                    <li><a href="inscripcion.php">Inscripcion</a></li>
                    <li><a href="materias_inscritas.php">Materias inscritas</a></li>
                </ul>
            </li> 
        </ul>
        </div>
        <?php
        }
            if($_SESSION['rol']=='a'){
        ?>
        <div id="menu">
            <ul>
                <li><a href="listaEstudiantes.php"><span class="material-icons">groups</span>   Listar Estudiantes</a></li>
                <li><a href="listarMaterias.php"><span class="material-icons">layers</span>Listar Materias</a> </li>
                <li><a href="preview_Reportes.php"><span class="material-icons">text_snippet</span>   Reporte</a></li>
            </ul> 
        </div>
        <?php
        }
        ?>
    </div>