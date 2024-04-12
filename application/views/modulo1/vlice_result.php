<table class="table table-bordered table-condensed table-hover" style="font-size:10px;">
	<thead>
		<tr>
			<th>Nro.</th>
			<th>Codigo de Tramite</th>
			<th>Comp. de Pago</th>
			<th>Nro. de Licencia</th>
			<th>Solicitante</th>
			<th>DNI/CE Sol.</th>
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
			<td style="font-size:20px;color:#000;font-weight:bold;"><?php if($reg->tra_cpag==NULL){echo "Sin Comp. de Pago";}else{echo $reg->tra_cpag;} ?></td>
			<td style="font-size:20px;color:#000;font-weight:bold;"><?php if($reg->tra_nro_lice==NULL){echo "Sin Nro. de Lic.";}else{echo $reg->tra_nro_lice;} ?></td>
			<td><?php echo $reg->tra_nombre; ?></td>
			<td><?php echo $reg->tra_dni_ce; ?></td>
			<td><?php echo $reg->tra_rep_nom; ?></td>
			<td><?php echo $reg->tra_rep_nr_doc; ?></td>
			<td><?php echo $reg->tra_direc." ".$reg->tra_dir_nro." ".$reg->tra_dir_int; ?></td>
			<td><?php echo $reg->tra_actividad; ?></td>
			<td><?php echo $reg->lic_estado; ?></td>
			<td><?php echo $reg->lic_fech_emi; ?></td>
		</tr>
		<?php endforeach ?>
		<?php } ?>
		<tr>
			<td colspan="12" style="color:red;"><b>*</b> No valido para efectos de tramites legales</td>
		</tr>
	</tbody>
</table>