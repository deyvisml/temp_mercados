<script src="js/functions.js"></script>
<script type="text/javascript">
    function vrepolice_ver_datos(){
        tra_ide=$("#vrepolice_tra_ide").val();
        var param={
            tra_ide:tra_ide
        };
        $.post("<?php echo site_url("modulo1/get_datos_tramite"); ?>",param,function(data){
            $("#vrepolice_result_dt").html(data);
            $("#vrepolice_div_busca").css("display","none");
            $("#vrepolice_div_llena_datos").css("display","block");
            $("#vrepolice_btn_submit").css("display","block")
        });
    }
    $("#vrepolice_form_busca").submit(function(e){
        e.preventDefault();
        tra_ide=$("#vrepolice_tra_ide").val();
        expe=$("#vrepolice_tra_nro_expe").val();
        obse=$("#vrepolice_tra_obs").val();
        $("#vrepolice_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_licencia"); ?>"+"/"+tra_ide+"?expe="+expe+"&obse="+obse);
        $("#vrepolice_dialog_pdf").modal("show");
    });
    $("#vrepolice_buscarxide").click(function(){
    	vrepolice_ver_datos();
    })
</script>
<div class="card">
    <div class="card-header">
        <h2>Generar de Licencias de Funcionamiento</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vrepolice_form_busca">
        	<div class="row" id="vrepolice_div_busca">
	            <div class="col-sm-2">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vrepolice_tra_ide" required>
	                    </div>
	                    <label class="fg-label">Codigo de Trámite</label>
	                </div>
	            </div>
	            <div class="col-sm-2">
	            	<button class="btn btn-success waves-effect" type="button" id="vrepolice_buscarxide">Buscar</button>
	            </div>
	        </div>
	        <div class="row">
				<div class="col-sm-12" id="vrepolice_result_dt"></div>
			</div>
	        <div class="row" id="vrepolice_div_llena_datos" style="display:none;">
	            <div class="col-sm-2">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vrepolice_tra_nro_expe" required>
	                    </div>
	                    <label class="fg-label">Expediente Nro.</label>
	                </div>
	            </div>
	            <div class="col-sm-6">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vrepolice_tra_obs" required>
	                    </div>
	                    <label class="fg-label">Observaciones</label>
	                </div>
	            </div>
			</div>
            <div class="row">
            	<div class="col-sm-12">
                	<button class="btn btn-primary waves-effect" type="submit" id="vrepolice_btn_submit" style="display:none;">Generar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vrepolice_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Licencia de Funcionamiento</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vrepolice_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepolice_ver_datos();">Cerrar</button>
            </div>
        </div>
    </div>
</div>