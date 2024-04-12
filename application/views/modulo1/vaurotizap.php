<script src="js/functions.js"></script>
<script type="text/javascript">
	function vautorizarap_ver_datos_licencia(){
		loading("open");
		var param={
			tra_ide:$("#vautorizarap_tra_ide").val()
		};
		$.post("<?php echo site_url("modulo1/get_datos_tramite"); ?>",param,function(data){
			loading("close");
			$("#vautorizarap_result_dt").html(data);
			$("#vautorizarap_autoap_act_data").css("display","block");
			$("#vautorizarap_div_busqueda").css("display","none");
		});
	}
	$("#vautorizarap_buscarxide").click(function(){
		vautorizarap_ver_datos_licencia();
	});
	$("#vautorizarap_form_busca").submit(function(e){
		e.preventDefault();
		var param={
			ide:$("#vautorizarap_tra_ide").val(),
			estado:$("#vautorizarap_estado").val()
		};
		$.post("<?php echo site_url("modulo1/setautoap"); ?>",param,function(data){
			loading("close");
			notify(data);
			vautorizarap_ver_datos_licencia();
		});
	});
</script>
<div class="card">
    <div class="card-header">
        <h2>Autorizar Anuncio Publicitario</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vautorizarap_form_busca">
            <div class="row" id="vautorizarap_div_busqueda">
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vautorizarap_tra_ide" required>
                        </div>
                        <label class="fg-label">Codigo de Trámite: </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success waves-effect" type="button" id="vautorizarap_buscarxide">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="vautorizarap_result_dt"></div>
            </div>
            <div class="row" id="vautorizarap_autoap_act_data" style="display:none;">
                <div class="col-sm-4">
                	<br>
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <div class="select">
	                            <select class="form-control" id="vautorizarap_estado">
	                                <option value="CON AUT. ANUNCIO PUBLICITARIO">CON AUT. ANUNCIO PUBLICITARIO</option>
	                            </select>
	                        </div>
	                    </div>
	                    <label class="fg-label">Estado de la Licencia</label>
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

<div class="modal fade out" id="vautorizarap_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Boleta de Pago</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vautorizarap_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vautorizarap_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>