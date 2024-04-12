<script src="js/functions.js"></script>
<script type="text/javascript">
	$("#vbuscalice_form_busca").submit(function(e){
		e.preventDefault();
		loading("open");
		var param={
			dato:$("#vbuscalice_datos").val()
		};
		$.post("<?php echo site_url("modulo1/get_licencias"); ?>",param,function(data){
			loading("close");
			$("#vbuscalice_result").html(data);
		});
	});
</script>
<div class="card">
    <div class="card-header">
        <h2>Buscar Licencia de Funcionamiento</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vbuscalice_form_busca">
        	<div class="row">
	            <div class="col-sm-5">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vbuscalice_datos" required>
	                    </div>
	                    <label class="fg-label">Nombre o Razon Social/DNI/RUC/Nro. de Licencia/Direccion</label>
	                </div>
	            </div>
	            <button class="btn btn-primary waves-effect" type="submit">BUSCAR</button>
			</div>
        </form>
        <div class="row">
        	<div class="col-sm-12" id="vbuscalice_result"></div>
		</div>
    </div>
</div>