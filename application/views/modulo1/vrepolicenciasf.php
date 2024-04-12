<!-- ESTE 01 -->
<script src="js/functions.js"></script>
<script type="text/javascript">
	function vrepolicenciasf_get_lista_giro(){
		lista="";
		$("#vrepolicenciasf_result_busqxgiro").find("input").each(function(){
			if($(this).is(':checked')==true){
				lista=lista+this.value+",";
			}
		});
		return lista;
	}
	$("#vrepolicenciasf_reportar_xgiro").click(function(){
		listaxgiro=vrepolicenciasf_get_lista_giro();
		tipo=$("#vrepolicenciasf_select_tipo_busqueda").val();
		$("#vrepolicenciasf_dialog_pdf").modal("show");
		$("#vrepolicenciasf_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_repo_licencias_giro");  ?>"+"?lista="+listaxgiro+"&tipo="+tipo);
	});
	$("#crepolicencias_buscar_activ").click(function(){
		giro=$("#vrepolicenciasf_giro_nego").val();
		tipo=$("#vrepolicenciasf_select_tipo_busqueda").val();
		var param={
			giro:giro,
			tipo:tipo
		};
		$.post("<?php echo site_url("modulo1/get_lista_actividades"); ?>",param,function(data){
			data=eval(data);
			result="<b>ACTIVIDADES O DIRECCIONES RELACIONADAS</b> <br>";
			result="<button onclick='sel_todo_lic(this)'>Marcar todo</button>";
			for(i=0;i<data.length;i++){
				result=result+"<div class='checkbox m-b-15'><label><input type='checkbox' class='mch' onclick='vrepolicenciasf_get_lista_giro()' value='"+data[i].elem+"'><i class='input-helper'></i>"+data[i].elem+"</label></div>";
			}
			$("#vrepolicenciasf_result_busqxgiro").html(result);
		});
	});
	$("#vrepolicenciasf_form_xfechas").submit(function(e){
		e.preventDefault();
		$("#vrepolicenciasf_dialog_pdf").modal("show");
		ini=$("#vrepolicencias_fini").val();
		fin=$("#vrepolicencias_ffin").val();
		$("#vrepolicenciasf_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_repo_licenciasf");  ?>"+"/"+ini+"/"+fin);
	});
	var cmchab=0;
	function sel_todo_lic(obj){
		if(cmchab%2==0){
			$(".mch").prop("checked","checked");
			$(obj).html("Descarmar todo");
		}
		else{
			$(".mch").prop("checked","");
			$(obj).html("Marcar todo");
		}
		cmchab++;
	}
</script>
<div class="card">
    <div class="card-header">
        <h2>Reporte de Licencias de funcionamiento</h2>
    </div>
    <div class="card-body card-padding">
        
    	<div class="panel-group" data-collapse-color="cyan" id="vrepolicenciasf_accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-collapse">
            	<div class="panel-heading" role="tab">
                	<h4 class="panel-title">
                    	<a data-toggle="collapse" data-parent="#vrepolicenciasf_accordion" href="#vrepolicenciasf_accordion-1" aria-expanded="false" class="collapsed">
                        	Filtrar por Fechas
						</a>
					</h4>
				</div>
                <div id="vrepolicenciasf_accordion-1" class="collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
                	<form id="vrepolicenciasf_form_xfechas">
	                	<div class="panel-body">
	                		<div class="row">
		                    	<div class="col-sm-4">
									<p class="c-black f-500 m-b-20">Del</p>
		                            <div class="input-group form-group">
		                            	<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
		                                <div class="dtp-container fg-line">
		                                	<input type="text" class="form-control date-picker" id="vrepolicencias_fini" required>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<p class="c-black f-500 m-b-20">Al</p>
		                            <div class="input-group form-group">
		                            	<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
		                                <div class="dtp-container fg-line">
		                                	<input type="text" class="form-control date-picker" id="vrepolicencias_ffin" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<button class="btn btn-primary waves-effect" type="submit">Reportar</button>
								</div>
							</div>
						</div>
					</form>
            	</div>
    		</div>
			<div class="panel panel-collapse">
            	<div class="panel-heading" role="tab">
                	<h4 class="panel-title">
                    	<a data-toggle="collapse" data-parent="#vrepolicenciasf_accordion" href="#vrepolicenciasf_accordion-2" aria-expanded="false" class="collapsed">
                        	Filtrar Giro de Negocio o Direccion
						</a>
					</h4>
				</div>
                <div id="vrepolicenciasf_accordion-2" class="collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
                	<div class="panel-body">
                    	<div class="row">
                    		<div class="col-sm-4">
                    			<br>
				                <div class="form-group fg-float">
				                    <div class="fg-line">
				                        <div class="select">
				                            <select class="form-control" id="vrepolicenciasf_select_tipo_busqueda">
				                                <option value="giro">GIRO DE NEGOCIO</option>
				                                <option value="direccion">DIRECCION</option>
				                            </select>
				                        </div>
				                    </div>
				                    <label class="fg-label">Buscar Por</label>
				                </div>
				            </div>
			                <div class="col-sm-4">
			                	<br>
			                    <div class="form-group fg-float" style="display:block;">
			                        <div class="fg-line">
			                            <input type="text" class="input-sm form-control fg-input" id="vrepolicenciasf_giro_nego" required>
			                        </div>
			                        <label class="fg-label">Escriba el Giro de Negocio/Direccion/Representante Legal</label>
			                    </div>
			                </div>
			                <div class="col-sm-4">
			                	<br>
			                	<button class="btn btn-success waves-effect" type="button" id="crepolicencias_buscar_activ">BUSCAR</button>
			                </div>			                
			            </div>
			            <div class="row" id="vrepolicenciasf_result_busqxgiro">
			            </div>
			            <div class="row">
			                <div class="col-sm-4">
			                	<button class="btn btn-primary waves-effect" type="button" id="vrepolicenciasf_reportar_xgiro">Reportar</button>
			                </div>			                
			            </div>
					</div>
            	</div>
    		</div>
		</div>

	</div>
</div>

<div class="modal fade out" id="vrepolicenciasf_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reporte de Licencias de Funcionamiento</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vrepolicenciasf_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>
