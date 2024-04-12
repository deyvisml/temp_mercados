<script src="js/functions.js"></script>
<script type="text/javascript">
	function vceseact_ver_datos_licencia(){
		loading("open");
		var param={
			ide:$("#vceseact_tra_ide").val()
		};
		$.post("<?php echo site_url("modulo1/get_datos_licencia"); ?>",param,function(data){
			loading("close");
			$("#vceseact_result_dt").html(data);
			$("#vceseact_cese_act_data").css("display","block");
			$("#vceseact_div_busqueda").css("display","none");
		});
	}
	$("#vceseact_buscarxide").click(function(){
		vceseact_ver_datos_licencia();
	});
	$("#vceseact_form_busca").submit(function(e){
		//loading("open");
		e.preventDefault();
		var param={
			ide:$("#vceseact_tra_ide").val(),
			estado:$("#vceseact_estado").val(),
            obs:$("#vceseact_obs").val(),
		};
		$.post("<?php echo site_url("modulo1/setcese"); ?>",param,function(data){
			loading("close");
			notify(data);
			vceseact_ver_datos_licencia();
		});
	});
</script>
<div class="card">
    <div class="card-header">
        <h2>Cese de Actividad</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vceseact_form_busca">
            <div class="row" id="vceseact_div_busqueda">
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vceseact_tra_ide" required>
                        </div>
                        <label class="fg-label">Codigo de Trámite: </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success waves-effect" type="button" id="vceseact_buscarxide">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="vceseact_result_dt"></div>
            </div>
            <div class="row" id="vceseact_cese_act_data" style="display:none;">
                <div class="col-sm-4">
                	<br>
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <div class="select">
	                            <select class="form-control" id="vceseact_estado">
	                                <option value="ACTIVO">ACTIVO</option>
	                                <option value="CESE TEMPORAL">CESE TEMPORAL</option>
	                                <option value="CESE DEFINITIVO">CESE DEFINITIVO</option>
	                                <option value="INACTIVO">INACTIVO</option>
	                            </select>
	                        </div>
	                    </div>
	                    <label class="fg-label">Estado de la Licencia</label>
	                </div>
	            </div>
                <div class="col-sm-8">
                    <br>
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vceseact_obs" required>
                        </div>
                        <label class="fg-label">Observaciones</label>
                    </div>
                </div>
                <div class="col-sm-4">
                	<br>
                    <button class="btn btn-primary waves-effect" type="submit">Cambiar Estado</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vceseact_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Boleta de Pago</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vceseact_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vceseact_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>