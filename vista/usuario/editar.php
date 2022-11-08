<?php
$Titulo = " Especie ";
include_once("../estructura/cabeceraBT.php");
$datos = data_submitted();

$objC = new ABMUsuario();
$obj =NULL;
if (isset($datos['idusuario']) && $datos['idusuario'] <> -1){
    $listaTabla = $objC->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}
?>	
<form method="post" action="accion.php" name="formulario" id="formulario">
    <input id="idusuario" name ="idusuario" type="hidden" value="<?php echo ($obj !=null) ? $obj->getidusuario() : "-1"?>" readonly required >
    <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">
    
    
    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Nombre:</label>
                <div class="input-group">
                <input id="usnombre" name="usnombre" type="text" class="form-control" value="<?php echo ($obj !=null) ? $obj->getusnombre() : ""?>" required >
                </div>
            </div>
        </div>
    </div>

   
    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="uspass" class="control-label">Pass:</label>
                <div class="input-group">
                <input id="uspass" name="uspass" type="password" class="form-control" value="<?php echo ($obj !=null) ? $obj->getuspass() : ""?>" required >
             </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="usmail" class="control-label">Correo:</label>
                <div class="input-group">
                <input id="usmail" name="usmail" type="text" class="form-control" value="<?php echo ($obj !=null) ? $obj->getusmail() : ""?>" required >
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="usdeshabilitado" class="control-label">Desabilitado:</label>
                <div class="input-group">
                <input id="usdeshabilitado" name="usdeshabilitado" type="datetime-local" class="form-control" value="<?php echo ($obj !=null) ? $obj->getusdeshabilitado() : ""?>"  >
            </div>
            </div>
        </div>
    </div>


     
      
	<input type="button" class="btn btn-primary btn-block" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" onclick="formSubmit()">
</form>
<a href="index.php">Volver</a>

<script>

function formSubmit()
{
    var password =  document.getElementById("uspass").value;
    var passhash = CryptoJS.MD5(password).toString();
    document.getElementById("uspass").value = passhash;

    setTimeout(function(){ 
        document.getElementById("formulario").submit();

	}, 500);
   
   
}
</script>


<?php
include_once("../estructura/pieBT.php");
?>