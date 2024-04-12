<script type="text/javascript">
	function anular_tram(ide){
		loading();
		x=confirm("Esta seguro que desea anular el tramite");
		if(x==true){
			var param={
				ide:ide
			}
			$.post("<?php echo site_url("modulo1/anulartram"); ?>",param,function(data){
				loading("close");
				notify(data);
				fbuscar_tram(false);
			});
		}
	}
</script>
<h4>Resultados para <?php echo $dato; ?></h4>

<table class="table table-bordered table-condensed table-hover" style="font-size:10px;">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Codigo de Tramite</th>
			<th>Solicitante</th>
			<th>DNI/CE Sol.</th>
			<th>RUC Sol.</th>
			<th>Representante Legal</th>
			<th>DNI/CE Rep.Legal</th>
			<th>Direccion del establecimiento</th>
			<th>Giro o Actividad</th>
			<th>Estado</th>
			<th>Fecha/Hora de Solicitud</th>
		</tr>
	</thead>
	<tbody>
		<?php $cont=1; ?>
		<?php if($result!=false){?>
		<?php foreach($result as $reg): ?>
		<tr>
			<td><?php echo $cont++; ?></td>
			<td style="font-size:20px;color:#000;font-weight:bold;"><?php echo $reg->tra_ide; ?></td>
			<td><?php echo $reg->tra_nombre; ?></td>
			<td><?php echo $reg->tra_dni_ce; ?></td>
			<td><?php echo $reg->tra_ruc; ?></td>
			<td><?php echo $reg->tra_rep_nom; ?></td>
			<td><?php echo $reg->tra_rep_nr_doc; ?></td>
			<td><?php echo $reg->tra_direc." ".$reg->tra_dir_nro." ".$reg->tra_dir_int; ?></td>
			<td><?php echo $reg->tra_actividad; ?></td>
			<td><?php echo $reg->tra_estado; ?></td>
			<td><?php echo $reg->tra_fech_reg; ?></td>
		</tr>
		<?php endforeach ?>
		<?php } 
		else{ ?>
			<tr>
				<td colspan=11>
					<h4>El tramite no existe o usted no lo ha generado</h4>
				</td>
			</tr>
		<?php } ?>

	</tbody>
</table>
<br>
<?php if ($result!=false): ?>
	<button class="btn btn-success" onclick="anular_tram('<?php echo $dato; ?>')">Anular</button>
<?php endif ?>
