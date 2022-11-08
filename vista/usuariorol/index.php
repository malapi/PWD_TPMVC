<?php
$Titulo = " Gestion de Usuarios";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$obj= new ABMUsuario();
$lista = $obj->buscar(null);

?>
<h3>ABM - Roles de Usuarios</h3>
<div class="row float-left">
    <div class="col-md-12 float-left">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
      }
     ?>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Desabilitado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
  
<?php

 if( count($lista)>0){
    foreach ($lista as $objTabla) {
       // print_r($objTabla);
        echo '<tr><td>'.$objTabla->getidusuario().'</td>';
        echo '<td>'.$objTabla->getusnombre().'</td>';
        echo '<td>'.$objTabla->getusmail().'</td>';
        echo '<td>'.$objTabla->getusdeshabilitado().'</td>';
        echo '<td><a class="btn btn-info" role="button" href="editar.php?accion=editar&idusuario='.$objTabla->getidusuario().'">Roles</a></td></tr>';
  	}
}

?>
        </tbody>
    </table>
</div>


<?php

include_once("../estructura/pieBT.php");
?>
