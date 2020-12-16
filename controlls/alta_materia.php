<?php
include('../includes/conexion.inc.php');
session_start();
try{
        $sql1=$conexion->prepare("INSERT INTO materia(id_mat, id_do, id_pre, id_hor, materia, sigla, cupo_min) VALUES(NULL , '".$_POST['id_do']."', '".$_POST['id_pre']."', '".$_POST['id_hor']."', '".$_POST['materia']."', '".$_POST['sigla']."', '".$_POST['cupo_min']."')");
        $sql1->execute();
        header("location: ../listarMaterias.php");

}catch(PDOException $e){
    print "Error: ".$e->getMessage()."<br/>";
    die();
}
?>
