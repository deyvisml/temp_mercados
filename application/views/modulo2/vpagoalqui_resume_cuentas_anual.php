<?php
if ($ult_pago == false) {
	$anio_ini = 2011;
} else {
	$anio_ini = $ult_pago[0]->alq_anio;
}
?>

<style type="text/css">
	.elegido {
		background-color: #ECF9FF;
	}

	.noelegido {
		background-color: white;
	}
</style>
<script type="text/javascript">
	/*function vpagoalqui_marcar(obj) {
		clase = $(obj).attr("class");
		if (clase == "noelegido") {
			$(obj).removeClass("noelegido");
			$(obj).addClass("elegido");
		} else {
			$(obj).removeClass("elegido");
			$(obj).addClass("noelegido");
		}
		total = 0;
		$("#vpagoalqui_table_cxc").find("tr").each(function() {
			if ($(this).attr("class") == "elegido") {
				monto = $(this).attr("monto");
				total = total + parseFloat(monto);
			}
		});
		total = total * 100;
		total = Math.round(total);
		total = total / 100;
		$("#vpagoalqui_total_pagar").html("S/. " + total);
		return total;
	}*/

	function vpagoalqui_marcar(obj) {
		clase = $(obj).attr("class");
		anio = $(obj).attr("anio");
		//mes = $(obj).attr("mes");
		$(".cxcobrar").removeClass("elegido");
		anio_ini = "<?php echo $anio_ini; ?>";
		for (vi = parseInt(anio_ini) + 1; vi <= anio; vi++) {
			$("#p_" + vi).addClass("elegido");
		}

		total = 0;
		$("#vpagoalqui_table_cxc").find("tr").each(function() {
			if ($(this).attr("class") == "cxcobrar elegido") {
				monto = $(this).attr("monto");
				total = total + parseFloat(monto);
			}
		});
		total = total * 100;
		total = Math.round(total);
		total = total / 100;
		$("#vpagoalqui_total_pagar").html("S/. " + total);
		return total;
	}

	/*function vpagoalqui_get_detalle2() {
		deta = "";
		$("#vpagoalqui_table_cxc").find("tr").each(function() {
			if ($(this).attr("class") == "cxcobrar elegido") {
				monto = $(this).attr("monto");
				anio = $(this).attr("anio");
				mes = $(this).attr("mes");
				deta = deta + anio + "-" + mes + ":" + monto + ";";
			}
		});
		return deta;
	}*/

	function vpagoalqui_get_detalle() {
		deta = "";
		$("#vpagoalqui_table_cxc").find("tr").each(function() {
			if ($(this).attr("class") == "cxcobrar elegido") {
				monto = $(this).attr("monto");
				anio = $(this).attr("anio");
				deta = deta + anio + ":" + monto + ";";
			}
		});
		return deta;
	}
	$("#vpagoalqui_generar_orden_pago").click(function() {
		xr = confirm("Esta seguro de pagar los años señalados");
		if (xr == false) {
			return;
		}
		deta = vpagoalqui_get_detalle();
		if (deta == "") {
			alert("No se selecciono ningun año para el pago");
			return;
		}
		var param = {
			deta: deta,
			idfi: <?php echo $idfi; ?>,
			tipo: "ANUAL"
		};
		$.post("<?php echo site_url("modulo2/guardar_orden_anual"); ?>", param, function(data) {
			$("#vpagoalqui_frame_pdf").attr("src", "<?php echo site_url("modulo2/pdf_bol_pago_anual"); ?>" + "/" + data + "/ANUAL");
			$("#vpagoalqui_dialog_pdf").modal("show");
			$("#vpagoalqui_generar_orden_pago").css("display", "none");
		});
	});
</script>
<h2>
	<?php echo $comer[0]->com_datos; ?><br>
	MERCADO <?php echo $mercado; ?>
	PUESTO <?php echo $comer[0]->com_nro_puesto; ?>
</h2>

<div class="form-wizard-basic fw-container col-sm-12">
	<ul class="tab-nav text-center fw-nav" tabindex="11" style="overflow: hidden; outline: none;">
		<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Cuentas por cobrar</a></li>
		<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">cuentas pagadas</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tab1">
			<div class="row">
				<div class="col-sm-6">
					<h4>CUENTAS POR COBRAR</h4>
					<table class="table table-hover table-condensed" id="vpagoalqui_table_cxc">
						<thead>
							<tr class="">
								<th>Nro.</th>
								<th>Año</th>
								<th>Monto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$cont = 1;
							for ($i = $anio_ini + 1; $i <= $anio_actual; $i++) {
							?>
								<tr id="<?php echo "p_" . $i; ?>" class="cxcobrar" onclick="vpagoalqui_marcar(this)" monto="<?php echo $comer[0]->com_pago; ?>" anio="<?php echo $i; ?>" style="cursor:pointer;">
									<td><?php echo $cont++; ?></td>
									<td><?php echo $i; ?></td>
									<td>S/. <?php echo $comer[0]->com_pago; ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-6">
					<h4>RESUMEN DE PAGO</h4>
					<div>TOTAL A PAGAR: <span id="vpagoalqui_total_pagar" style="font-size:30px;color:#000;">S/. 0.00</span></div>
				</div>
				<div class="col-sm-6">
					<button class="btn btn-primary waves-effect" type="button" id="vpagoalqui_generar_orden_pago">Generar Orden de Pago</button>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab2">
			<h4>CUENTAS PAGADAS</h4>
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>Nro.</th>
						<th>Año</th>
						<th>Monto</th>
						<th>Comprobante de Pago</th>
						<th>Recibo de Caja</th>
						<th>Observaciones</th>
						<th>Fecha/Hora</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($cpag != false) {
						$cont = 1;
						foreach ($cpag as $reg) {
					?>
							<tr>
								<td><?php echo $cont++; ?></td>
								<td><?php echo $reg->alq_anio; ?></td>
								<td><?php echo $reg->alq_monto; ?></td>
								<td><?php echo $reg->alq_comprobante; ?></td>
								<td><?php echo $reg->alq_recibo_caja; ?></td>
								<td><?php echo $reg->alq_observaciones; ?></td>
								<td><?php echo $reg->alq_fecha_reg; ?></td>
							</tr>
					<?php
						}
					} else {
						echo "No existen cuentas pagadas";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>




<div class="modal fade out" id="vpagoalqui_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Boleta de Pago</h4>
			</div>

			<div class="modal-body">
				<iframe src="" id="vpagoalqui_frame_pdf" width="100%" height="450px" border="0px"></iframe>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
			</div>
		</div>
	</div>
</div>