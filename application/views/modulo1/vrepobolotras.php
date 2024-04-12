<script type="text/javascript">
	function vrepobolotras_get_lista(){
		lista="";
		$("#vrepobolotras_result_busca").find("input").each(function(){
			if($(this).is(':checked')==true){
				lista=lista+this.value+",";
			}
		});
		return lista;
	}
	$("#vrepobolotras_buscar").click(function(){
		txt=$("#vrepobolotras_concepto").val();
		var param={
			txt:txt,
		};
		$.post("<?php echo site_url("modulo1/get_tipos_conceptos"); ?>",param,function(data){
			data=eval(data);
			result="<b>CONCEPTOS RELACIONADOS</b> <br>";
			for(i=0;i<data.length;i++){
				result=result+"<div class='checkbox m-b-15'><label><input type='checkbox' value='"+data[i].opcion+"'><i class='input-helper'></i>"+data[i].opcion+"</label></div>";
			}
			$("#vrepobolotras_result_busca").html(result);
		});
	});
	$("#vrepobolotras_form_nuevo").submit(function(e){
		e.preventDefault();
		lista=vrepobolotras_get_lista();
		$("#vrepobolotras_dialog_pdf").modal("show");
		$("#vrepobolotras_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_repoboltras");  ?>"+"?lista="+lista);
	});
</script>

<div class="card">
    <div class="card-header">
        <h2>Reporte de Boletas Para Otras Actividades</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vrepobolotras_form_nuevo">
        	<div class="row">
	            <div class="col-sm-6">
	                <div class="form-group fg-float">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vrepobolotras_concepto">
	                    </div>
	                    <label class="fg-label">Concepto.</label>
	                </div>
	            </div>
	            <div class="col-sm-2">
	                <button class="btn btn-success waves-effect" type="button" id="vrepobolotras_buscar">Buscar</button>
	            </div>
	        </div>
	        <div class="row" id="vrepobolotras_result_busca">
	        </div>
	        <div class="row">
	            <div class="col-sm-12">
	            	<button class="btn btn-primary waves-effect" type="submit">Reportar</button>
	            </div>
	        </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vrepobolotras_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Boleta de Pago</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vrepobolotras_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepolice_ver_datos();">Cerrar</button>
            </div>
        </div>
    </div>
</div>