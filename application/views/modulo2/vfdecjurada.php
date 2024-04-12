<script src="js/functions.js"></script>
<script type="text/javascript">
    $("#vrepocxc_form_reportar").submit(function(e){
        e.preventDefault();
        $.post("<?php echo site_url("modulo2/guarda_decjurada"); ?>",$(this).serialize(),function(data){
            $("#vfdecjurada_frame_pdf").attr("src","<?php echo site_url("modulo2/pdf_repo_decjurada"); ?>"+"/"+data);
            $("#vfdecjurada_dialog_pdf").modal("show");
        })
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Formato Para Declaración Jurada</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vrepocxc_form_reportar">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="number" class="input-sm form-control fg-input" name="dec_anio" required>
                        </div>
                        <label class="fg-label">Año</label>
                    </div>  
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_nombre">
                        </div>
                        <label class="fg-label">Nombre o Razon Social</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_dni">
                        </div>
                        <label class="fg-label">DNI</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_ruc">
                        </div>
                        <label class="fg-label">RUC</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_dom_fis">
                        </div>
                        <label class="fg-label">Domicilio Fiscal</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_barrio">
                        </div>
                        <label class="fg-label">Barrio</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_ubi">
                        </div>
                        <label class="fg-label">Ubicación del Kiosko o Puesto</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_mercado">
                        </div>
                        <label class="fg-label">Mercado</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_giro">
                        </div>
                        <label class="fg-label">Giro</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_lua">
                        </div>
                        <label class="fg-label">Licencia Unica de Apertura</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_defecha">
                        </div>
                        <label class="fg-label">de Fecha</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="dec_fecha">
                        </div>
                        <label class="fg-label">Fecha</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary waves-effect" type="submit">Reportar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vfdecjurada_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Declaracion Jurada</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vfdecjurada_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer"> 
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>