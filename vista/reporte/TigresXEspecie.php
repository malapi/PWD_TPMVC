<?php
include_once("../../configuracion.php");
require_once("../../utiles/phpchartdir.php");

# The labels for the pie chart
$labels = array();
# The data for the pie chart
$data = array();

$objCT = new ABMTigre();
$objCE = new ABMEspecie();
$listaEspecie = $objCE->buscar(null);
foreach ($listaEspecie as $especie):
    $param = array("idespecie"=>$especie->getId());
    $ListaTigres = $objCT->buscar($param);
    if(count($ListaTigres) > 0){
        $data[] =count($ListaTigres);
        $labels[]=$especie->getDescripcion();
    }
    
endforeach;

//print_r($labels);
//print_r($data);

# Create a PieChart object of size 360 x 300 pixels
$c = new PieChart(600, 400);

# Set the center of the pie at (180, 140) and the radius to 100 pixels
$c->setPieSize(180, 140, 100);

# Add a title to the pie chart
$c->addTitle("Distribución de Tigres por Especie");

# Draw the pie in 3D
$c->set3D();

# Set the pie data and the pie labels
$c->setData($data, $labels);

# Explode the 1st sector (index = 0)
$c->setExplode(0);

# Output the chart
header("Content-type: image/png");
print($c->makeChart2(PNG));


?>