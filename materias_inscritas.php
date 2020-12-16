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
    $sql1 = $conexion->prepare("SELECT * FROM materia m, horario h, inscripcion i, estudiante e WHERE e.id_us= {$_SESSION['id_us']} and i.id_es = e.id_es and m.id_mat = i.id_mat and h.id_hor = m.id_hor");
    $sql1->execute(); 
?>

    <div class="main">
        <!-- Aqui va el contenido -->
        <table>
            <thead>
                <td>MATERIA</td>
                <td>SIGLA</td>
                <td>HORARIO</td>
                <td>DIAS</td>
            </thead>
        <?php
        while($fila = $sql1->fetch())
        {
            echo "<tr>";
            echo "<td>".$fila[4]."</td>";
            echo "<td>".$fila[5]."</td>";
            echo "<td>".$fila[8]." - ".$fila[9]."</td>";
            echo "<td>".$fila[10]."</td>";
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