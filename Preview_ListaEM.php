<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consulta.css"></link>
    <title>Inscripcion</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("location: index.php");
    }
?>
    <div>
        <?php include('includes/header.php')?>
        <?php include('includes/sidebar.php')?>
        <div class="">
<?php
include('includes/conexion.inc.php');
try {
    $sql1 = $conexion->prepare("
                                    select u.username as a, u.nombre as b, u.apelido as c, count(u.username) as d
                                    from usuario u, estudiante e, inscripcion i
                                    where u.id_us = e.id_us and e.id_es = i.id_es
                                    group by u.username, u.nombre, u.apelido
                                ");
    $sql1->execute();
?>

    <div class="main">
        <div>
            <h1>Lista Estudiantes y materias</h1>
        </div>
        <button onclick="window.location.href='Reporte_Est.php'">Generar Reporte</button>
        <table>
            <thead>
                <td>ID</td>
                <td>USERNAME</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>CANTIDAD MATERIAS</td>
            </thead>
        <?php
            $i = 1;
            while($fila = $sql1->fetch())
            {
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$fila['a']."</td>";
                echo "<td>".$fila['b']."</td>";
                echo "<td>".$fila['c']."</td>";
                echo "<td>".$fila['d']."</td>";
                $i++;
            }
            }catch(PDOException $e){
            print "Error: ".$e->getMessage()."<br/>";
            die();
            }
        ?>
        </table>
        </div>
        </div>
    </div>