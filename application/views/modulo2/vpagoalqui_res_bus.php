<script type="text/javascript">
	function vpagoalqui_res_bus_ver(dni, comer, tipo_pago, mercado, idfi) {
		if (dni.length < 8) {
			dni = prompt("Su DNI no esta registrado, ingreselo: ");
			if (dni == null) {
				return;
			} else if (dni.length != 8) {
				alert("El DNI debe de tener 8 digitos")
				return;
			} else {
				if (!confirm("Esta seguro de registrar el DNI número " + dni)) {
					return;
				}
			}
		}
		loading("open");
		var param = {
			dni: dni,
			comer: comer,
			tipo_pago: tipo_pago,
			mercado: mercado,
			idfi: idfi
		};
		$.post("<?php echo site_url("modulo2/get_cuentas"); ?>", param, function(data) {
			loading("close");
			$("#vpagoalqui_deta_comer").html(data);
			$("#vpagoalqui_result").css("display", "none");
		});
	}
</script>
<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Mercado</th>
			<th>Tipo Pago</th>
			<th>DNI</th>
			<th>Nombres/Apellidos</th>
			<th>Tipo Puesto</th>
			<th>Puesto</th>
			<th>Negocio</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($result != false) {
			$cont = 1;
			foreach ($result as $reg) {
		?>
				<tr onclick="vpagoalqui_res_bus_ver('<?php echo $reg->com_dni; ?>',<?php echo $reg->com_ide; ?>,'<?php echo $reg->mer_tipo_pago; ?>','<?php echo $reg->mer_nombre; ?>',<?php echo $reg->com_ide; ?>)" style="cursor:pointer;">
					<td><?php echo $cont++; ?></td>
					<td><?php echo $reg->mer_nombre; ?></td>
					<td><?php echo $reg->mer_tipo_pago; ?></td>
					<td><?php echo $reg->com_dni; ?></td>
					<td><?php echo $reg->com_datos; ?></td>
					<td><?php echo $reg->com_tipo_puesto; ?></td>
					<td><?php echo $reg->com_nro_puesto; ?></td>
					<td><?php echo $reg->com_negocio; ?></td>
				</tr>
		<?php
			}
		}
		?>
	</tbody>
</table>