<?php
$Titulo = " Especie ";
include_once("../estructura/cabeceraBT.php");
include_once("../../configuracion.php");
$datos = data_submitted();

$objCE = new ABMEspecie();
$objC = new ABMTigre();

$obj =NULL;
if (isset($datos['id']) && $datos['id'] <> -1){
    $listaTabla = $objC->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

$listaEspecie = $objCE->buscar(null);

?>	
<form method="post" action="accion.php">
    <input id="id" name ="id" type="hidden" value="<?php echo ($obj !=null) ? $obj->getId() : "-1"?>" readonly required >
    <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">
    <div class="row mb-12">
        <div class="col-sm-12 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Nombre:</label>
                <div class="input-group">
                    <input id="nombre" name ="nombre" type="text" class="form-control" value="<?php echo ($obj !=null) ? $obj->getNombre() : ""?>" required >

                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Especie:</label>
                <div class="input-group">

                    <select class="form-control" id="especie" name="especie" >
                        <?php
                        foreach ($listaEspecie as $especie):
                            if ($obj != null && $obj->getEspecie()->getId()==$especie->getId())
                                echo '<option selected value="'.$especie->getId().'">'.$especie->getDescripcion().' </option>';
                                else
                            echo '<option value="'.$especie->getId().'">'.$especie->getDescripcion().'</option>';
                        endforeach;
                        ?>
                    </select>


                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Peso:</label>
                <div class="input-group">
                    <input id="peso" name ="peso" type="text" class="form-control" value="<?php echo  ($obj !=null) ? $obj->getPeso() : "" ?>"  required>

                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Edad:</label>
                <div class="input-group">
                    <input id="edad" name ="edad" type="text"  class="form-control" value="<?php echo ($obj !=null) ? $obj->getEdad() : ""?>"  required>

                </div>
            </div>
        </div>
    </div>

	
	<input type="submit" class="btn btn-primary btn-block" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>">
</form>

<a href="index.php">Volver</a>

<?php
include_once("../estructura/pieBT.php");
?>