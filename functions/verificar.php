<?php
include('../includes/conexion.inc.php');
session_start();
try {
    $sql1 = $conexion->prepare("SELECT * FROM usuario WHERE username='{$_POST['username']}' and contrasena='{$_POST['contrasena']}'");
    $sql1->execute();
    if ($fila1 = $sql1->fetch()){
        $_SESSION['id_us']= $fila1[0];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['rol']=$fila1[3];
        if($_SESSION['rol']=='e'){
            header("location: ../dashboard.php");
        }
        if($_SESSION['rol']=='a'){
            header("location: ../dashboard_Admin.php");
        }
    }else{
        header("location: ../login.php?mesagge='NO'");
    }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>