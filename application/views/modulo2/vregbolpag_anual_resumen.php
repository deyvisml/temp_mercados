<?php
if ($bol == false) {
	echo "error";
	return;
}
$fechaact = $this->mgeneral->get_fecha();
$fechaact = $fechaact[0]->fecha;
$fechaact = explode(" ", $fechaact);
$fechaact = $fechaact[0];

$tmp = explode(";", $bol->ord_detalle);
$monto = 0;
$detalle = "";
$detalle2 = "";
$montos = "";
for ($i = 0; $i < count($tmp) - 1; $i++) {
	$tmp2 = explode(":", $tmp[$i]);
	$monto = $monto + $tmp2[1];
	//$tper = explode("-", $tmp2[0]);
	//$tper = $tper[0] . "-" . $meses[$tper[1]];
	//$tper = $meses[$tper[1]] . ". " . $tper[0];
	$detalle = $detalle . "<span class='badge badge-primary'>" . $tmp2[0] . "</span> ";
	$detalle2 = $detalle2 . $tmp2[0] . ",";
	$montos = $montos . $tmp2[1] . ", ";
}
?>
<input type="hidden" name="anios" value="<?php echo $detalle2; ?>">
<input type="hidden" name="montos" value="<?php echo $montos; ?>">
<input type="hidden" name="ide" value="<?php echo $bol->com_ide; ?>">
<table class="table table-striped table-bordered table-condensed table-hover">
	<tbody>
		<tr>
			<td>CONTRIBUYENTE:</td>
			<td><?php echo $bol->com_datos; ?></td>
		</tr>
		<tr>
			<td>ALQUILER DE PUESTO:</td>
			<td><?php echo $bol->com_nro_puesto; ?></td>
		</tr>
		<tr>
			<td>VENTA:</td>
			<td><?php echo $bol->com_negocio; ?></td>
		</tr>
		<tr>
			<td>MERCADO:</td>
			<td><?php echo $bol->mer_nombre; ?></td>
		</tr>
		<tr>
			<td>PAGO DE LOS AÑOS:</td>
			<td><?php echo $detalle; ?></td>
		</tr>
		<tr>
			<td>MONTO:</td>
			<td><?php echo $monto; ?></td>
		</tr>
		<tr>
			<td>FECHA:</td>
			<td><?php echo $fechaact; ?></td>
		</tr>
	</tbody>
</table>