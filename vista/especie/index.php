<?php
$Titulo = " Gestion de Especies";
include_once("../estructura/cabeceraBT.php");
include_once("../../configuracion.php");
$datos = data_submitted();

$obj= new ABMEspecie();
$lista = $obj->buscar(null);

?>
<h3>ABM - Especies</h3>
<div class="row float-left">
    <div class="col-md-12 float-left">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
      }
     ?>
    </div>
</div>


<div class="row float-right">

    <div class="col-md-12 float-right">
        <a class="btn btn-success" role="button" href="editar.php?accion=nuevo&id=-1">Nuevo</a>

    </div>
</div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>

<?php
 if( count($lista)>0){
    foreach ($lista as $objTabla) {
        echo '<tr><td>'.$objTabla->getId().'</td>';
        echo '<td>'.$objTabla->getDescripcion().'</td>';
        echo '<td><a class="btn btn-info" role="button" href="editar.php?accion=editar&id='.$objTabla->getId().'">editar</a>';
        echo '<a class="btn btn-primary" role="button" href="editar.php?accion=borrar&id='.$objTabla->getId().'">borrar</a></td></tr>';
	}
}

?>
        </tbody>
    </table>
</div>


<?php

include_once("../estructura/pieBT.php");
?>
