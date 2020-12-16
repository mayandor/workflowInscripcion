<?php
include('../includes/conexion.inc.php');
session_start();
try{
    echo $_GET['id_ins'];
    $sql=$conexion->prepare("DELETE FROM inscripcion WHERE id_ins={$_GET['id_ins']}");
    $sql->execute();
    header("location: ../inscripcion.php");
    
}catch(PDOException $e){
    print "Error: ".$e->getMessage()."<br/>";
    die();
}
?>
