<html>
<head>
<title>APLICACION WEB PARA EL MANTENIMIENTO E INVENTARIO DE LAS AREAS TECNOLOGICAS EN LA ZONA EDUCATIVA Y SUS PLANTELES</title>
<style media="print" type="text/css">
#imprimir {
visibility:hidden
}
</style>
</head>
<body>

<?php $busqueda=$_GET['id'];

if($busqueda==null)
{echo "<script type>
	alert('USTED ESTA INTENTANDO VIOLAR NUESTRO SISTEMA...');
	location='index.php';
	</script>";}
?>
<?php
require_once 'class/plantel.class.php';
$plantel = Plantel::buscarPorI($_GET['id']);

?>
<?php
require_once 'class/director.class.php';
$director = Director::buscarPorI($_GET['id']);

?>
<?php
require_once 'class/laboratorio.class.php';
$laboratorio = Laboratorio::buscarPorI($_GET['id']);

?>
<div align="center">
<table border="0" width="850px">    
<tr>
</tr>
<tr>
<h3>REPORTE DEL PLANTEL - ZONA EDUCATIVA MONAGAS</h3>
<B>DATOS DEL PLANTEL</B>
</tr>
<tr>
<th>FECHA:<?php echo $plantel->getFecha(); ?></th>
</tr>
   <tr>
<th>NOMBRE DEL PLANTEL</th>
<th>MUNICIPIO</th>
<th>PARROQUIA</th>
<th>CODIGO DEA</th>
<th>LOCALIDAD</th>
<th>TELEFONO P.</th>
<th>DIRECCI&Oacute;N</th>
        </tr>
 <tr>
	    <td><?php echo $plantel->getNombreplantel(); ?></td>
<td>
<?php
$b=$plantel->getMunicipio_id();
require_once 'class/municipio.class.php';
$municipio = Municipio::buscarPorId($b);
echo $municipio->getDescripcion();
?>
</td>
 <td>
<?php
$b=$plantel->getParroquia_id();
require_once 'class/parroquia.class.php';
$parroquia = Parroquia::buscarPorId($b);
echo $parroquia->getDescripcion();
?>
 <td><?php echo $plantel->getDea(); ?></td>
            <td><?php echo $plantel->getLocalidad(); ?></td>
	    <td><?php echo $plantel->getTlfplantel(); ?></td>
	    <td><?php echo $plantel->getDireccion(); ?></td>
        </tr>
</table>
<?php if($director){ include("generadirector.php"); }?>
<?php if($laboratorio){ include("generalaboratorio.php");}?>

<?php
require_once 'class/equipo.class.php';
$equipo = Equipo::buscarPorTodos($_GET['id'], $_GET['lab']);

?>
<?php if($equipo){ include("generaequipo.php");}?>


<?php
require_once 'class/impresora.class.php';
$impresora = Impresora::buscarPorTodos($_GET['id'], $_GET['lab']);
?>
<?php if($impresora){ include("generaimpresora.php");}?>

<?php
require_once 'class/monitor.class.php';
$monitor = Monitor::buscarPorTodos($_GET['id'], $_GET['lab']);
?>
<?php if($monitor){  include("generamonitor.php");}?>

<?php
require_once 'class/equipo.class.php';
$equipo = Equipo::buscarPorTodos($_GET['id'], $_GET['ofi']);
?>
<?php if($equipo){include("generaequipooficina.php");}?>

<?php
require_once 'class/impresora.class.php';
$impresora = Impresora::buscarPorTodos($_GET['id'], $_GET['ofi']);
?>
<?php if($impresora){ include("generaimpresoraoficina.php");}?>

<?php
require_once 'class/monitor.class.php';
$monitor = Monitor::buscarPorTodos($_GET['id'], $_GET['ofi']);
?>
<?php if($monitor){  include("generamonitoroficina.php");}?>
<form id="form1" name="form1" method="post" action=""><br><br>

<input type="button" name="imprimir" id="imprimir" value="Imprimir" onClick="window.print();" />

</form>
</div>
</body>
</html>
