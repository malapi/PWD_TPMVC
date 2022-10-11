<?php
$Titulo = " Inicio ";
include_once("../estructura/cabeceraBT.php");
?>
<link rel="stylesheet" href="../css/delahome.css" >

<p class="heading0">ChartDirector 7.0 (PHP Edition)</p>

<p class="heading0"><a href="https://www.advsofteng.com/download.html" target="_blank"> Descargar ChartDirector 7.0 </a></p>
<p class="heading1">Instalación de ChartDirector para PHP</p>
<hr class="separator">
<p class="heading1aa">Compatibilidad de versiones de PHP</p><div class="content">
ChartDirector para PHP requiere PHP 5.0 o posterior. ChartDirector ha sido probado hasta PHP 8.1, que es la última versión de PHP al momento de escribir este documento.
</div>
<p class="heading1a">Extracción de la distribución de ChartDirector</p>
<div class="content">
ChartDirector para PHP es compatible con Windows, Linux y macOS. Verifique que la distribución de ChartDirector que ha descargado sea para la edición del sistema operativo de PHP que está utilizando. Si no está seguro del tipo de PHP que está usando, puede usar <a href="../../phpini.php" target="_blank">phpinfo</a> para averiguarlo. <br>
<br>
<div class="greyblock">
<b>Nota para Windows </b> : como Windows de 64 bits también puede ejecutar aplicaciones de 32 bits, no es raro que PHP de 32 bits se instale en Windows de 64 bits. Si utiliza Windows PHP de 32 bits, debe utilizar la edición de Windows (32 bits) de "ChartDirector for PHP", incluso si el sistema operativo es Windows de 64 bits.
</div><br>
Para comenzar, puede extraer los archivos de la distribución de ChartDirector al directorio HTML de su servidor web.
</div><p class="heading1a">Instalación de ChartDirector para PHP</p><div class="content">
ChartDirector para PHP se implementa como una extensión de PHP en "ChartDirector/lib". También hay un archivo de inclusión "phpchartdir.php", que interactúa con los scripts PHP con la extensión PHP ChartDirector.
<br>
Para instalar la extensión de PHP de ChartDirector, simplemente agregue una línea al archivo de configuración de PHP y luego reinicie PHP.
<br><br>
<ul> <li><b>Configure PHP para cargar la extensión ChartDirector</b><br><br>
Para configurar PHP para cargar la extensión ChartDirector, simplemente agregue la siguiente línea al archivo de configuración de PHP, generalmente llamado <a href="../../php.ini" target="_blank" >php.ini</a>.<br><br> .
<div class="indentedblock">
    
<code>extension=<wbr>/path/<wbr>to/<wbr>ChartDirector/<wbr>lib/<wbr>phpchartdir###.dll</code> <br>
<code>extension=C:<wbr>/xampp<wbr>/htdocs<wbr>/chartdir_php_win32<wbr>/ChartDirector<wbr>/lib<wbr>/phpchartdir710.dll</code>
</div><br>
En lo anterior, reemplace "/path/to" por el directorio de ruta real que contiene la distribución de ChartDirector. Tenga en cuenta que la ruta es una ruta del sistema de archivos que comienza desde la raíz del sistema de archivos. No es una ruta URL que comienza desde el directorio HTML del servidor web.<br><br>
El "phpchartdir###.dll" depende de su versión de PHP, la configuración de seguridad de subprocesos y el sistema operativo de acuerdo con la siguiente tabla. Puede usar <a href="../../phpini.php" target="_blank" >phpinfo</a> para determinar el tipo de PHP que está usando.<br><br>
<div class="overflowblock"> 
    <table border="1" cellpadding="5" cellspacing="0" width="100%"> 
    <tr><th rowspan="2">PHP Version</th><th colspan="2" style="text-align:center">Windows</th><th colspan="2" style="text-align:center">Linux, macOS</th></tr> 
    <tr><th style="text-align:center">No seguro para subprocesos</th><th style="text-align:center">A salvo de amenazas</th><th style="text-align:center">No seguro para subprocesos</th><th style="text-align:center">A salvo de amenazas</th></tr> 
    <tr ><td colspan="5" style="text-align:center">Son varias otras las versiones compratibles</td></tr>
    <tr><td>7.0.x</td><td style="text-align:center">phpchartdir700nts.dll</td><td style="text-align:center">phpchartdir700.dll</td><td style="text-align:center">phpchartdir700.dll</td><td style="text-align:center">phpchartdir700mt.dll</td></tr> 
    <tr><td>7.1.x</td><td style="text-align:center">phpchartdir710nts.dll</td><td style="text-align:center">phpchartdir710.dll</td><td style="text-align:center">phpchartdir710.dll</td><td style="text-align:center">phpchartdir710mt.dll</td></tr> 
    <tr ><td colspan="5" style="text-align:center">Son varias otras las versiones compratibles</td></tr>
 </table> </div><br>
<div class="greyblock">
Aunque la declaración de extensión solo hace referencia a un archivo, depende de otros archivos en "ChartDirector/lib". Si desea copiar el archivo de extensión a otro directorio, debe copiar todo (incluido el subdirectorio de fuentes en la edición Linux de ChartDirector) en "ChartDirector/lib" en el mismo directorio.
<br><br>
Se sugiere usar una ruta absoluta para cargar ChartDirector para la extensión PHP. 
Si solo se especifica el nombre de archivo sin la ruta, PHP asumirá que el archivo está en el directorio de extensión de PHP 
, y se deberá copiar todo lo contenido en  "ChartDirector/lib" al directorio <a href="C:\xampp\php\ext" target="_blank">de extensión de PHP "C:\xampp\php\ext"</a>.
</div><br>
<li><b>Reiniciar PHP</b><br><br>
Para que el "php.ini" actualizado surta efecto, es necesario reiniciar PHP. Los pasos exactos para reiniciar PHP sin reiniciar el servidor dependen del tipo de PHP. El tipo de PHP aparece en el campo "API del servidor" en <a href="../../phpini.php">phpinfo</a> . Si el PHP es del tipo FPM (generalmente aparece como FPM/FastCGI), puede reiniciar el servicio FPM para reiniciar PHP. En otros casos, puede reiniciar el servidor web para reiniciar PHP.
</div><p class="heading1a">Ejecución de secuencias de comandos de ejemplo de ChartDirector</p><div class="content">
ChartDirector para PHP viene con varios scripts PHP de muestra en el directorio "ChartDirector/phpdemo". Son buenos ejemplos y tutoriales sobre cómo usar ChartDirector.<br><br>
Para probar los scripts de muestra, use la siguiente URL para ver la página de índice de scripts de muestra (nota: la URL exacta depende de dónde haya extraído ChartDirector).<br><br>
<div class="indentedblock"><code>http:/<wbr>/aaa.bbb.ccc.ddd/<wbr>ChartDirector/<wbr>phpdemo/<wbr>index.php</code></div><br>
En la página de índice de scripts de muestra, hay un enlace "verificar instalación" en la ventana derecha. Por favor, haga clic en ese enlace. Si muestra la versión de ChartDirector con alguna otra información, se puede confirmar que ChartDirector se instaló correctamente. Tenga en cuenta que los mensajes en el "Registro de inicio" o la "Prueba de carga de fuentes" son solo informativos y no son mensajes de error.<br><br>
Después de confirmar que ChartDirector se instaló correctamente, puede hacer clic en los enlaces de la ventana izquierda para ver los gráficos de muestra.
</div><p class="heading1a">Uso de ChartDirector para PHP en sus propios scripts</p><div class="content">
Para usar ChartDirector, incluya la secuencia de comandos de ChartDirector "phpchartdir.php" en su propia secuencia de comandos utilizando la instrucción PHP "require_once". Por ejemplo, todos los scripts de muestra de ChartDirector usan la siguiente línea para incluir "phpchartdir.php":<br><br>
<div class="indentedblock"><code>require_once(<wbr>"../<wbr>lib/<wbr>phpchartdir.php");</code></div><br>
<div class="greyblock">
Tenga en cuenta que require_once asume que la ruta es una ruta del sistema de archivos, no una URL. Si la ruta comienza con una barra inclinada "/", la barra inclinada hace referencia a la raíz del sistema de archivos, no a la raíz del documento web.
</div></div><p class="heading1a">Instalación de la licencia de ChartDirector</p><div class="content">
Incluso sin una clave de licencia, ChartDirector funcionará normalmente, pero los gráficos incluirán una barra amarilla en la parte inferior que marca los gráficos como producidos por el ChartDirector "no registrado". Puede probar ChartDirector libremente durante el tiempo que sea necesario.
</div>
<br><br>
</div>


</body>
<?php

include_once("../estructura/pieBT.php");
?>
