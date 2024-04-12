<script src="js/functions.js"></script>
<script type="text/javascript">
    function vcambiopadron_buscar_titular(){
        titu=$("#vcambiopadron_titu_busqueda").val();
        var param={
            titu:titu
        };
        $.post("<?php echo site_url("modulo2/get_titulares"); ?>",param,function(data){
            $("#vcambiopadron_dialog_body_buscar").html(data);
        });
    }
    $("#vcambiopadron_opcion").change(function(){
        if($("#vcambiopadron_opcion").val()==149){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_persona);
        }
        if($("#vcambiopadron_opcion").val()==150){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_persona);   
        }
        if($("#vcambiopadron_opcion").val()==152){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_negocio);
        }
        $("#vcambiopadron_titular").focus();
        txt=$("#vcambiopadron_opcion option:selected").html()
        $("#vcambiopadron_label_dato_cambio").html("Ingrese datos para: "+txt.toLowerCase());
    });
    $("#vcambiopadron_titular").focus(function(){
        $("#vcambiopadron_dato_cambio").focus();
    });
    $("#vcambiopadron_form_cambiar").submit(function(e){
        e.preventDefault();
        var param={
            tupa_ide:$("#vcambiopadron_opcion").val(),
            tupa_txt:$("#vcambiopadron_opcion option:selected").html(),
            com_ide:$("#vcambiopadron_com_ide").val(),
            dato_act:$("#vcambiopadron_titular").val(),
            dato_new:$("#vcambiopadron_dato_cambio").val(),
        };
        $.post("<?php echo site_url("modulo2/cambiar_tupa"); ?>",param,function(data){
            alert(data);
            notify(data);
            vcambiopadron_tabla_persona="";
            vcambiopadron_tabla_negocio="";
            $form=$("#vcambiopadron_form_cambiar");
            $form[0].reset();
        });
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Cambio de Titular o giro de Negocio</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vcambiopadron_form_cambiar">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" id="vcambiopadron_opcion" required>
                                    <option value=""></option>
                                    <option value="149">CAMBIO DE TITULAR EN TIENDAS, KIOSKOS Y PUESTOS DE PADRES A HIJOS EN MERCADOS.</option>
                                    <option value="150">CAMBIO DE TITULAR EN TIENDAS, KIOSKOS Y PUESTOS A TERCEROS EN MERCADOS.</option>
                                    <option value="152">AUTORIZACION PARA CAMBIO DE GIRO DE NEGOCIO Y AMPLIACIONES SIMILARES EN MERCADOS</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Seleccione un mercado</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vcambiopadron_titular" required>
                        </div>
                        <label class="fg-label">Titular </label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-success waves-effect" type="button" onclick="$('#vcambiopadron_dialog_buscar').modal('show')">Buscar Titular</button>
                </div>
                <div class="col-sm-8">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vcambiopadron_dato_cambio" required>
                        </div>
                        <label class="fg-label" id="vcambiopadron_label_dato_cambio"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn btn-primary waves-effect" type="submit">Cambiar</button>
                </div>
            </div>
            <div class="row">
                <input type="hidden" id="vcambiopadron_com_ide" required>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vcambiopadron_dialog_buscar" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda de titulares</h4>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group fg-float" style="display:block;">
                            <div class="fg-line">
                                <input type="text" class="input-sm form-control fg-input" id="vcambiopadron_titu_busqueda">
                            </div>
                            <label class="fg-label" style="color:#f5f5f5;">Escriba parte del nombre del titular Titular</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="btn btn-success waves-effect" type="button" onclick="vcambiopadron_buscar_titular()">Buscar</button>
                    </div>
                </div>
                <div id="vcambiopadron_dialog_body_buscar" class="row" style="height:400px;">
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="background:#ccc;">Nro.</th>
                                <th style="background:#ccc;">Datos</th>
                                <th style="background:#ccc;">Mercado</th>
                                <th style="background:#ccc;">Puesto</th>
                                <th style="background:#ccc;">Negocio</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>