<!-- <div> -->
<?php
include('dashboard.php');
?>
<!-- </div> -->
    <div class="cuerpo">
        <form action="functions/procesar.php" enctype="multipart/form-data" method="post">
        <input type="text" name="ci" value="<?php echo $_GET['id']?>" hidden>
        <label for="imagen">Imagen:</label>
        <input id="imagen" name="foto" size="30" type="file">
        <input name="submit" type="submit" value="Guardar">
        </form>
    </div>
</div>
</div>
</body>
</html>
