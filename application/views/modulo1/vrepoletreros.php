<!-- ESTE 02 -->
<script src="js/functions.js"></script>
<script type="text/javascript">
	function vrepoletreros_get_lista(){
		lista="";
		$("#vrepoletreros_result_busqueda").find("input").each(function(){
			if($(this).is(':checked')==true){
				lista=lista+this.value+",";
			}
		});
		return lista;
	}
	$("#vrepoletreros_buscar_letrero").click(function(){
		txt=$("#vrepoletreros_txt_busqueda").val();
		tipo=$("#vrepoletreros_select_tipo_busqueda").val();
		var param={
			txt:txt,
			tipo:tipo
		};
		$.post("<?php echo site_url("modulo1/get_tipos_elem"); ?>",param,function(data){
			data=eval(data);
			result="<b>ACTIVIDADES O DIRECCIONES RELACIONADAS</b> <br>";
			result="<button onclick='sel_todo_let(this)'>Marcar todo</button>"
			for(i=0;i<data.length;i++){
				result=result+"<div class='checkbox m-b-15'><label><input type='checkbox' class='mch' onclick='vrepoletreros_get_lista()' value='"+data[i].elem+"'><i class='input-helper'></i>"+data[i].elem+"</label></div>";
			}
			$("#vrepoletreros_result_busqueda").html(result);
		});
	});
	$("#vrepoletreros_reportar_data").click(function(){
		vrepoletreroslista=vrepoletreros_get_lista();
		tipo=$("#vrepoletreros_select_tipo_busqueda").val();
		$("#vrepoletreros_dialog_pdf").modal("show");
		$("#vrepoletreros_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_repo_letreros_giro");  ?>"+"?lista="+lista+"&tipo="+tipo);
	});
	var cmchabl=0;
	function sel_todo_let(obj){
		if(cmchabl%2==0){
			$(".mch").prop("checked","checked");
			$(obj).html("Descarmar todo");
		}
		else{
			$(".mch").prop("checked","");
			$(obj).html("Marcar todo");
		}
		cmchabl++;
	}
</script>
<div class="card">
    <div class="card-header">
        <h2>Reporte de Letreros</h2>
    </div>
    <div class="card-body card-padding">
        <div class="row">
        	<div class="col-sm-4">
			<br>
				<div class="form-group fg-float">
					<div class="fg-line">
				    	<div class="select">
				        	<select class="form-control" id="vrepoletreros_select_tipo_busqueda">
				            	<option value="giro">GIRO DE NEGOCIO</option>
				                <option value="direccion">DIRECCION</option>
				                <option value="representante">REPRESENTANTE LEGAL</option>
							</select>
				        </div>
				    </div>
				    <label class="fg-label">Buscar Por</label>
				</div>
			</div>
			<div class="col-sm-4">
				<br>
			    <div class="form-group fg-float">
			    	<div class="fg-line">
			        	<input type="text" class="input-sm form-control fg-input" id="vrepoletreros_txt_busqueda" required>
					</div>
			    	<label class="fg-label">Escriba el Giro de Negocio/Direccion/Representante Legal</label>
			    </div>
			</div>
			<div class="col-sm-4">
			 	<br>
			    <button class="btn btn-success waves-effect" type="button" id="vrepoletreros_buscar_letrero">BUSCAR</button>
			</div>			                
		</div>
		<div class="row" id="vrepoletreros_result_busqueda">
		</div>
		<div class="row">
			</div>
				<div class="row">
			    	<div class="col-sm-4">
			        	<button class="btn btn-primary waves-effect" type="button" id="vrepoletreros_reportar_data">Reportar</button>
			        </div>			                
			    </div>
		</div>
    </div>
</div>

<div class="modal fade out" id="vrepoletreros_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reporte de Letreros</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vrepoletreros_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>