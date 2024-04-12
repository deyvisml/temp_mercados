<script src="js/functions.js"></script>
<script type="text/javascript">
    $("#vregbolpag_anual_buscar").click(function() {
        loading("open");
        $.post("<?php echo site_url("modulo2/get_datos_bpanual"); ?>", $("#vregbolpag_anual_form_buscar").serialize(), function(data) {
            if (data == "error") {
                $("#vregbolpag_anual_result").html("<h1>LA BOLETA YA FUE REGISTRADA O NO EXISTE O NO ES UNA BOLETA DE PAGO ANUAL</h1>");
            } else {
                $("#vregbolpag_anual_result").html(data);
                $("#vregbolpag_anual_busqueda_x_cpn").css("display", "none");
                $("#vregbolpag_anual_div_registrar").css("display", "block");
                $("#vregbolpag_div_registrar").css("display", "block");
            }
            loading("close");
        });
    });
    $("#vregbolpag_anual_form_buscar").submit(function(e) {
        e.preventDefault();
        loading("open");
        $.post("<?php echo site_url("modulo2/guardar_boleta_anios"); ?>", $(this).serialize(), function(data) {
            loading("close");
            notify(data);
            alert(data);
            $("#vregbolpag_div_registrar_bol_registrar").css("display", "none");
        });
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Registrar Boleta de Pago Anuales</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vregbolpag_anual_form_buscar">
            <div class="row" id="vregbolpag_anual_busqueda_x_cpn">
                <div class="col-sm-3">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="cpn" required>
                        </div>
                        <label class="fg-label">Ingrese CPN. de la Boleta </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success waves-effect" type="button" id="vregbolpag_anual_buscar">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="vregbolpag_anual_result"></div>
            </div>
            <div class="row" id="vregbolpag_anual_div_registrar" style="display:none;">
                <?php
                echo $completar;
                ?>
            </div>
        </form>
    </div>
</div>

<div class="modal fade out" id="modal_add_dj" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Declaración Jurada</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <div class="form-group fg-float" style="display:block;">
                            <div class="fg-line">
                                <input type="number" class="input-sm form-control fg-input" id="com_dj_anio" required min="2000">
                            </div>
                            <label class="fg-label" style="color:#ccc;">Año </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <br>
                        <div class="form-group fg-float" style="display:block;">
                            <div class="fg-line">
                                <input type="number" class="input-sm form-control fg-input" id="com_dj_num" required>
                            </div>
                            <label class="fg-label" style="color:#ccc;">Número de Declaración Jurada</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="vcom_add_dj()">Agregar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>