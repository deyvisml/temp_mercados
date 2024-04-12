<script src="js/functions.js"></script>
<script type="text/javascript">
    $("#vpagoalqui_form_bsucar").submit(function(e){
        loading("open");
        e.preventDefault();
        var param={
            dato:$("#vpagoalqui_dato").val()
        };
        $.post("<?php echo site_url("modulo2/get_comer"); ?>",param,function(data){
            loading("close");
            $("#vpagoalqui_result_busqueda").html(data);
            $("#vpagoalqui_busqueda").css("display","none");
        });
    });
</script>
<div class="card">
    <div class="card-header">
        <h2>Pago de Alquileres</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vpagoalqui_form_bsucar">
            <div class="row" id="vpagoalqui_busqueda">
                <div class="col-sm-4">
                    <div class="form-group fg-float" style="display:block;">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vpagoalqui_dato" required>
                        </div>
                        <label class="fg-label">Ingrese Nro. de Puesto/Apellidos y Nombres: </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success waves-effect" type="submit">Buscar</button>
                </div>
            </div>
            <div class="row" id="vpagoalqui_result">
                <div class="col-sm-12" id="vpagoalqui_result_busqueda"></div>
            </div>
            <div class="row" id="vpagoalqui_resumen">
                <div class="col-sm-12" id="vpagoalqui_deta_comer"></div>
            </div>
        </form>
    </div>
</div>