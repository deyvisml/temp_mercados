<script src="js/functions.js"></script>
<script type="text/javascript">
    function vrepobol_ver_detalle(){
        loading("open");
        tra_ide=$("#vrepobl_tra_ide").val();
        var param={
            tra_ide:tra_ide
        };
        $.post("<?php echo site_url("modulo1/get_datos_tramite"); ?>",param,function(data){
            loading("close");
            $("#vrepobl_result_dt").html(data);
            $("#vrepobl_div_busqueda").css("display","none");
            $("#vrepobl_buscarxide").css("display","none");
            $("#vrepobl_btn_submit").css("display","block");
            $("#vrepobl_nro_serie_lice").css("display","block");
        });
    }
    $("#vrepobl_form_busca").submit(function(e){
        e.preventDefault();
        tra_ide=$("#vrepobl_tra_ide").val();
        nro_lice=$("#vrepobl_bol_nro_lic").val();
        bol_nro=$("#vrepobl_bol_nro").val();
        $("#vrepobl_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_boleta"); ?>"+"/"+tra_ide+"/"+nro_lice+"/"+bol_nro);
        $("#vrepobl_dialog_pdf").modal("show");
    });
    $("#vrepobl_buscarxide").click(function(){
        vrepobol_ver_detalle();
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Generar de Orden de Pago</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vrepobl_form_busca">
            <div class="row" id="vrepobl_div_busqueda">
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vrepobl_tra_ide" required>
                        </div>
                        <label class="fg-label">Codigo de Trámite: </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success waves-effect" type="button" id="vrepobl_buscarxide">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="vrepobl_result_dt"></div>
            </div>
            <div class="row" id="vrepobl_nro_serie_lice" style="display:none;">
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="number" class="input-sm form-control fg-input" id="vrepobl_bol_nro" required>
                        </div>
                        <label class="fg-label">Nro. de comprobante de pago: </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="number" class="input-sm form-control fg-input" id="vrepobl_bol_nro_lic" required>
                        </div>
                        <label class="fg-label">Nro. de licencia para la boleta: </label>
                    </div>
                </div>
            </div>
            <div class="row" id="vrepobl_btn_submit" style="display:none;">
                <div class="col-sm-12">
                    <button class="btn btn-primary waves-effect" type="submit">Generar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vrepobl_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Boleta de Pago</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vrepobl_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>