<?php
include('../includes/conexion.inc.php');
session_start();
try{
    echo $_GET['id_mat'];
    $sql=$conexion->prepare("DELETE FROM materia WHERE id_mat={$_GET['id_mat']}");
    $sql->execute();
    header("location: ../listarMaterias.php");
    
}catch(PDOException $e){
    print "Error: ".$e->getMessage()."<br/>";
    die();
}
?>
