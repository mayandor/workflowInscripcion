<?php
    session_start();
    // si la session no existe entondes redirecciona añ index caso contrario deja pasar y se carga la pagina
    if (!isset($_SESSION['username'])){
        header("location: index.php");
    }
    include('includes/conexion.inc.php');
    include('includes/header.php');
    include('includes/sidebar.php');
?>
        <!-- Aqui va el contenido -->

    <div class="main">
        <!-- Aqui va el contenido -->
        <form action="controlls/alta_materia.php" method="POST" novalidate >
            <div>
                <label>Materia*</label>
                <div>
                      <input type="text" name="materia">
                </div>
            </div>
            <div>
                <label >Sigla*</label>
                <div>
                      <input type="text" name="sigla">
                </div>
            </div>
            <div>
                <label>Cupo minimo*</label>
                <div>
                      <input type="text" name="cupo_min">
                </div>
            </div>
            <div>
                <label>Docente*</label>
                <div>
                <select name="id_do">
                    <option>Seleccione opcion</option>
                    <?php 
                        try {
                            $sql = $conexion->prepare("SELECT * FROM docente d, usuario u WHERE d.id_us = u.id_us");
                            $sql->execute(); 
                            while($fila = $sql->fetch())
                            {                        
                    ?>
                      <option value="<?php echo $fila[0];?>"><?php echo $fila[6]." ".$fila[7];?></option>
                        <?php } ?>
                </select>
                </div>
            </div>
            <div>
                <label>Pre-requisito*</label>
                <div>
                <select name="id_pre">
                    <option>Seleccione opcion</option>
                    <?php 
                            $sql = $conexion->prepare("SELECT * FROM prerequisito p, materia m WHERE m.id_pre = p.id_pre");
                            $sql->execute(); 
                            while($fila = $sql->fetch())
                            {                        
                    ?>
                      <option value="<?php echo $fila[0];?>"><?php echo $fila[1];?></option>
                        <?php } ?>
                </select>
                </div>
            </div>
            <div>
                <label>Horario*</label>
                <div>
                <select name="id_hor">
                    <option>Seleccione opcion</option>
                    <?php 
                            $sql = $conexion->prepare("SELECT * FROM horario h, materia m WHERE m.id_hor = h.id_hor");
                            $sql->execute(); 
                            while($fila = $sql->fetch())
                            {                        
                    ?>
                      <option value="<?php echo $fila[0];?>"><?php echo $fila[1]."-".$fila[2];?></option>
                        <?php } ?>
                </select>
                </div>
            </div>
        <?php
        }catch(PDOException $e){
          print "Error: ".$e->getMessage()."<br/>";
          die();
                  }  
        ?>

                      <div>
                        <div >
                        <button type="submit" class="formboton">Adicionar</button>
                      </div>
                      </div>
                    </form>
    </div>
