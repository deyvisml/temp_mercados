<br><br>
<div class="col-sm-12">
    <div class="alert alert-success">
        Complete la siguiente información
    </div>
</div>
<div class="col-sm-6">
    <br>
    <div class="form-group fg-float" style="display:block;">
        <div class="fg-line">
            <input type="text" class="input-sm form-control fg-input" name="nro_bol" required>
        </div>
        <label class="fg-label">Número de Comprobante de Pago</label>
    </div>
</div>
<div class="col-sm-6">
    <br>
    <div class="form-group fg-float" style="display:block;">
        <div class="fg-line">
            <input type="text" class="input-sm form-control fg-input" name="nro_caja" required>
        </div>
        <label class="fg-label">Número de Recibo de Caja</label>
    </div>
</div>


<div class="col-sm-3">
    <br>
    <div class="form-group fg-float">
        <div class="fg-line">
            <div class="select">
                <select class="form-control" name="con_obse" id="vcompletar_con_obse" required onchange="vcompletar_obse()">
                    <option value="NO">No</option>
                    <option value="SI">Si, con observaciones</option>
                </select>
            </div>
        </div>
        <label class="fg-label">¿Observaciones?</label>
    </div>
</div>

<div class="col-sm-9">
    <br>
    <div class="form-group fg-float" style="display:none;" id="div_com_obser">
        <div class="fg-line">
            <input type="text" class="input-sm form-control fg-input" name="obse">
        </div>
        <label class="fg-label">Registre sus observaciones</label>
    </div>
</div>

<div class="col-sm-12">
    <input type="hidden" required name="aniosdj" id="vcom_aniosdj">
    <input type="hidden" required name="numsdj" id="vcom_numsdj">
</div>

<div class="col-sm-3">
    <button type="button" class="btn btn-sm btn-success btn-block" onclick="abrir_modal_dj()">
        Agregar Declaración Jurada
    </button>
</div>

<div class="col-sm-9">
    <div class="row" id="vcom_dj_display"></div>
</div>

<div class="col-sm-12" id="vregbolpag_div_registrar_bol_registrar">
    <br>
    <button class="btn btn-primary waves-effect" type="submit">Registrar</button>
</div>

<script>
    function vcompletar_obse() {
        vc_obs = $("#vcompletar_con_obse").val();
        if (vc_obs == "SI") {
            $("#div_com_obser").css("display", "block");
        } else if (vc_obs == "NO") {
            $("#div_com_obser").css("display", "none");
        }
    }

    function abrir_modal_dj() {
        $("#modal_add_dj").modal("show");
    }
    vcDJ_Anio = []
    vcDJ_Num = []
    i = 0

    function vcom_add_dj() {
        vcAnio = $("#com_dj_anio").val();
        vcNum = $("#com_dj_num").val();
        if (vcAnio == "" || vcNum == "") {
            alert("El año y número de Declaración Jurada no pueden ser campos vacíos")
            return false;
        }
        vcDJ_Anio[i] = vcAnio;
        vcDJ_Num[i] = vcNum;
        i++;
        $("#com_dj_anio").val("");
        $("#com_dj_num").val("");
        $("#vcom_aniosdj").val(vcDJ_Anio)
        $("#vcom_numsdj").val(vcDJ_Num)
        vcom_dibujarDJs();
    }

    function vcom_dibDJ(vcc, anio, num) {
        tmpDiv = anio + "-" + num;
        tmpDiv = "<div class='col-sm-3'>";
        tmpDiv += "<div class='card'>";
        tmpDiv += "<div class='card-header bg-primary text-center' style='padding:5px; border: 1px solid #2196f3;'>Declaración Jurada</div>";
        tmpDiv += "<div class='card-body text-center' style='padding:5px; border: 1px solid #2196f3;'>";
        tmpDiv += "<div>Año: <b>" + anio + "</b></div>";
        tmpDiv += "<div>Número: <b>" + num + "</b></div>";
        tmpDiv += "<br><div><button type='button' class='btn btn-sm btn-danger btn-block' onclick='vcomDelDJ(" + vcc + ")'>Eliminar</button></div>";
        tmpDiv += "</div>";
        tmpDiv += "</div>";
        tmpDiv += "</div>";
        return tmpDiv;
    }

    function vcomDelDJ(vcc) {
        vcDJ_Anio.splice(vcc, 1);
        vcDJ_Num.splice(vcc, 1);
        i--;

        $("#vcom_aniosdj").val(vcDJ_Anio)
        $("#vcom_numsdj").val(vcDJ_Num)
        vcom_dibujarDJs();
    }

    function vcom_dibujarDJs() {
        vcTmpDib = "";
        for (vcc = 0; vcc < i; vcc++) {
            vcTmpDib += vcom_dibDJ(vcc, vcDJ_Anio[vcc], vcDJ_Num[vcc]);
        }
        $("#vcom_dj_display").html(vcTmpDib);
    }
</script>