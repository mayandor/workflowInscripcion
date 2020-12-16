<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consulta.css"></link>
    <title>Inscripcion</title>
</head>
<?php
    session_start();
    // si la session no existe entondes redirecciona añ index caso contrario deja pasar y se carga la pagina
    if (!isset($_SESSION['username'])){
        header("location: index.php");
    }
?>
    <div>
        <?php include('includes/header.php')?>
        <?php include('includes/sidebar.php')?>
        <!-- Aqui va el contenido -->
        <div class="">
<?php 
include('includes/conexion.inc.php');
try {
    $sql1 = $conexion->prepare("SELECT * FROM estudiante e, usuario u WHERE u.id_us = e.id_us");
    $sql1->execute(); 
?>

    <div class="main">
        <!-- Aqui va el contenido -->
        <table>
            <thead>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>USERNAME</td>
                <td>EMAIL</td>
            </thead>
        <?php
        while($fila = $sql1->fetch())
        {
            echo "<tr>";
            echo "<td>".$fila[6]."</td>";
            echo "<td>".$fila[7]."</td>";
            echo "<td>".$fila[3]."</td>";
            echo "<td>".$fila[8]."</td>";
            echo "</tr>";
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