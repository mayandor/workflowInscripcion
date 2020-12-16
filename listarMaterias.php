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
    $sql = $conexion->prepare("SELECT * FROM materia m, horario h WHERE h.id_hor = m.id_hor");
    $sql->execute(); 
?>

    <div class="main">
        <!-- Aqui va el contenido -->
        <a href="formMateria.php" type="submit" class="botonNew">NUEVO</a>
        <table>
            <thead>
                <td>MATERIA</td>
                <td>SIGLA</td>
                <td>HORARIO</td>
                <td>DIAS</td>
                <td>CUPO MINIMO</td>
                <td>CANTIDAD DE INSCRITOS</td>
                <td>OPERACIONES</td>
            </thead>
        <?php
        while($fila = $sql->fetch())
        {
            $sql1 = $conexion->prepare("SELECT COUNT(*) FROM materia m, inscripcion i WHERE m.id_mat= i.id_mat and m.id_mat= '$fila[0]'");
            $sql1->execute();
            $fila1 = $sql1->fetch();
            echo "<tr>";
            echo "<td>".$fila[4]."</td>";
            echo "<td>".$fila[5]."</td>";
            echo "<td>".$fila[8]." - ".$fila[9]."</td>";
            echo "<td>".$fila[10]."</td>";
            echo "<td>".$fila[6]."</td>";
            echo "<td>".$fila1[0]."</td>";
            ?>
                <td>
                    <a href="controlls/eliminarMateria.php?id_mat=<?php echo urlencode($fila[0])?>"><span class="material-icons">delete</span></a>
                </td>
        </tr>
            <?php
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