<script src="js/functions.js"></script>
<script type="text/javascript">
    $("#vrepocuentas_form_reportar").submit(function(e) {
        e.preventDefault();
        m = $("#vrepocuentas_mercado").val();
        t = $("#vrepocuentas_mercado option:selected").attr("tp");
        $("#vrepocxc_frame_pdf").attr("src", "<?php echo site_url("modulo2/pdf_repocuentas"); ?>" + "/" + m + "/" + t);
        $("#vrepocxc_dialog_pdf").modal("show");
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Reporte de cuentas por cobrar</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vrepocuentas_form_reportar">
            <div class="row" id="vrepobl_div_busqueda">
                <div class="col-sm-6">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" id="vrepocuentas_mercado">
                                    <?php
                                    foreach ($mercados as $reg) {
                                        echo "
                                        <option 
                                            value='$reg->mer_ide' 
                                            tp='$reg->mer_tipo_pago' 
                                        >
                                            MERCADO $reg->mer_nombre
                                        </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Seleccione un mercado</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-primary waves-effect" type="submit">Reportar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="vrepocxc_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reporte de Cuentas por Cobrar y Cuentas Pagadas</h4>
            </div>

            <div class="modal-body">
                <iframe src="" id="vrepocxc_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="vrepobol_ver_detalle();">Cerrar</button>
            </div>
        </div>
    </div>
</div>