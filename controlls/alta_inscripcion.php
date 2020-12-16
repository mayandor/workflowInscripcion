<?php
include('../includes/conexion.inc.php');
session_start();
try{
    //Para el id del estudiante
    $sql=$conexion->prepare("SELECT e.id_es FROM estudiante e, usuario u WHERE u.id_us = e.id_us and u.id_us= '{$_SESSION['id_us']}'");
    $sql->execute();
    $fila= $sql->fetch();
    //contar cuantas veces se incribio
    $sql3=$conexion->prepare("SELECT COUNT(*) FROM inscripcion i, estudiante e WHERE i.id_es= e.id_es and e.id_us='{$_SESSION['id_us']}'");
    $sql3->execute();
    $fila3= $sql3->fetch();
    echo $fila3[0];
    if($fila3[0] < 2){
        $id_mat = $_GET['id_mat'];
        $id_es = $fila[0];
        $sql1=$conexion->prepare("INSERT INTO inscripcion(id_ins, id_mat, id_es) VALUES(NULL , '$id_mat', '$id_es')");
        $sql1->execute();
        header("location: ../inscripcion.php");
    }else{
        header("location: ../inscripcion.php?mesagge='NO'");
    }
}catch(PDOException $e){
    print "Error: ".$e->getMessage()."<br/>";
    die();
}
?>
