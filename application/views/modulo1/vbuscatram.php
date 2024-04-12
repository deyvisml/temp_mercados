<script src="js/functions.js"></script>
<script type="text/javascript">
	$("#vbuscatram_form_busca").submit(function(e){
		e.preventDefault();
		var param={
			dato:$("#vbuscatram_datos").val()
		};
		$.post("<?php echo site_url("modulo1/get_tramites"); ?>",param,function(data){
			$("#vbuscatram_result").html(data);
		})
	});
</script>
<div class="card">
    <div class="card-header">
        <h2>Buscar Tramite de Licencia de Funcionamiento</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vbuscatram_form_busca">
        	<div class="row">
	            <div class="col-sm-4">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vbuscatram_datos" required>
	                    </div>
	                    <label class="fg-label">Nombre o Razon Social/DNI/RUC</label>
	                </div>
	            </div>
	            <button class="btn btn-primary waves-effect" type="submit">BUSCAR</button>
			</div>
        </form>
        <div class="row">
        	<div class="col-sm-12" id="vbuscatram_result"></div>
		</div>
    </div>
</div>