<?php include 'includes/plantilla_pdf_est.php'; ?>
<?php
try {
        $conexion = new PDO('mysql:host=localhost;dbname=academico',"ejemplo", "123456");
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    $sql = $conexion->prepare("select u.username as a, u.nombre as b, u.apelido as c, count(u.username) as d
                                from usuario u, estudiante e, inscripcion i
                                where u.id_us = e.id_us and e.id_es = i.id_es
                                group by u.username, u.nombre, u.apelido");
    $sql->execute();
    $co=1;
    while($fila = $sql->fetch()){
            $vusername[$co]=$fila['a'];
            $vname[$co]=$fila['b'];
            $vapellido[$co]=$fila['c'];
            $vcont[$co]=$fila['d'];
            $co++;
    }
    $pdf = new PDF;
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,10,'Nro.',1,0,'C',1);
    $pdf->Cell(60,10,'Username',1,0,'C',1);
    $pdf->Cell(40,10,'Nombre',1,0,'C',1);
    $pdf->Cell(40,10,'Apellido',1,0,'C',1);
    $pdf->Cell(40,10,'Cant. Materias',1,1,'C',1);
      /* $pdf->Cell(20,6,'Retirados Mujeres',1,0,'C',1);
    $pdf->Cell(20,6,'Retirados Varones',1,0,'C',1);
    $pdf->Cell(10,6,'Total',1,1,'C',1); */
    $pdf->SetFont('Arial','',10);
    for ($i=1; $i <count($vusername)+1 ; $i++){
        //id
        $pdf->Cell(10,6,$i,1,0,'C');
        //username
        $pdf->Cell(60,6,$vusername[$i],1,0,'C');
        //Nombre
        $pdf->Cell(40,6,$vname[$i],1,0,'C');
        //Apellido
        $pdf->Cell(40,6,$vapellido[$i],1,0,'C');
        //Cantidad
        $pdf->Cell(40,6,$vcont[$i],1,1,'C');
    }
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',6);
    $pdf->Output();
?>