<?php
$Titulo = " Usuario Rol ";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$objC = new ABMUsuario();
$obj =NULL;
if (isset($datos['idusuario']) && $datos['idusuario'] <> -1){
    $listaTabla = $objC->darRoles($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

$objr = new ABMRol();
$listaRol = $objr->buscar(null);

?>	
<div class="row float-left">
    <div class="col-md-12 float-left">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
      }
     ?>
    </div>
</div>

<h3>ABM - Agregar Roles</h3>


<div class="row float-right">
    <div class="col-md-12 float-right">
<?php 
if( count($listaRol)>0){
    foreach ($listaRol as $obj) {
        echo '<a class="btn btn-success" role="button" href="accion.php?accion=nuevo_rol&idrol='.$obj->getidrol().'&idusuario='.$datos['idusuario'].'">Agregar Rol '.$obj->getrodescripcion().'</a>';
    }
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
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
  
<?php
 if( count($listaTabla)>0){
    foreach ($listaTabla as $objTabla) {
        echo '<tr><td>'.$objTabla->getobjrol()->getidrol().'</td>';
        echo '<td>'.$objTabla->getobjrol()->getrodescripcion().'</td>';
        echo '<td><a class="btn btn-info" role="button" href="accion.php?accion=borrar_rol&idusuario='.$objTabla->getobjusuario()->getidusuario().'&idrol='.$objTabla->getobjrol()->getidrol().'">borrar</a></td></tr>';
    }
}

?>
        </tbody>
    </table>
</div>

<a href="index.php">Volver</a>

<?php
include_once("../estructura/pieBT.php");
?>