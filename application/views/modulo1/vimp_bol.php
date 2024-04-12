<!-- ESTE 03 -->
<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.css">
<script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
<script src="vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript">
	$("#vimp_bol_form_nuevo_xyz").submit(function(e){
		e.preventDefault();
		loading("open");
		$.post("<?php echo site_url("modulo1/guardar_bol_oa"); ?>",$(this).serialize(),function(data){
			loading("close");
			$("#vimp_bol_dialog_pdf").modal("show");
			$("#vimp_bol_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_otra_boleta"); ?>"+"/"+data);
		});
	});

	var availableTags = [
      	<?php 
		if($lista!=false){
			foreach($lista as $reg){
				echo "'".$reg->opcion."',";
			}
		}
		?>
    ];
    $("#vimp_bol_completar_concepto").autocomplete({
		source: availableTags
    });
</script>

<div class="card">
    <div class="card-header">
        <h2>Imprimir Boletas Para Otras Actividades</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vimp_bol_form_nuevo_xyz">
        	<div class="row">
	            <div class="col-sm-2">
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" name="bol_nro" required>
	                    </div>
	                    <label class="fg-label">Nro de Boleta.</label>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" required name="bol_contri">
	                    </div>
	                    <label class="fg-label">Contribuyente.</label>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" required name="bol_concepto" id="vimp_bol_completar_concepto">
	                    </div>
	                    <label class="fg-label">Concepto.</label>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-sm-2">
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" required name="bol_monto">
	                    </div>
	                    <label class="fg-label">Monto. (S/.) </label>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-4">
		            <div class="form-group fg-float">
		                <div class="fg-line">
		                	<input type="text" class="input-sm form-control fg-input date-picker" name="bol_fecha_vigencia" required>
						</div>
						<label class="fg-label">Vigencia</label>
					</div>
				</div>
	        </div>
	        <div class="row">
	        	<br>
	            <div class="col-sm-12">
	            	<button class="btn btn-primary waves-effect" type="submit">Generar Boleta</button>
	            </div>
	        </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vimp_bol_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Boleta de Pago</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vimp_bol_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepolice_ver_datos();">Cerrar</button>
            </div>
        </div>
    </div>
</div>