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
        <div class="main">
            <h2>Bienvenido Administrador</h2>
        </div>
    </div>
<?php

?>