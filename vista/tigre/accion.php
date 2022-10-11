<?php
include_once("../estructura/cabeceraBT.php");
include_once("../../configuracion.php");
$datos = data_submitted();
$resp = false;
$objTrans = new ABMTigre();
//print_r($datos);
if (isset($datos['accion'])){
    $resp = $objTrans->abm($datos);
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    //echo $mensaje;
    echo("<script>location.href = './index.php?msg=$mensaje';</script>");
}
?>
