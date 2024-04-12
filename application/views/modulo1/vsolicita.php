<script src="js/functions.js"></script>
<script type="text/javascript">
    var vsolicita_cont=3;
    var tam=250;
    $("#vsolicita_seccion3").css("display","block");
    $("#vsolicita_first").click(function(){
        vsolicita_cont=3;
        for(i=1;i<=11;i++){
            $("#vsolicita_seccion"+i).css("display","none");
        }
        $("#vsolicita_seccion"+vsolicita_cont).css("display","block");
    });
    $("#vsolicita_last").click(function(){
        vsolicita_cont=11;
        for(i=1;i<=11;i++){
            $("#vsolicita_seccion"+i).css("display","none");
        }
        $("#vsolicita_seccion"+vsolicita_cont).css("display","block");        
    });
    $("#vsolicita_ant").click(function(){
        if(vsolicita_cont>3){
            $("#vsolicita_seccion"+vsolicita_cont).css("display","none");
            vsolicita_cont--;
            $("#vsolicita_seccion"+vsolicita_cont).css("display","block");
        }
    });
    $("#vsolicita_sig").click(function(){
        if(vsolicita_cont<11){
            $("#vsolicita_seccion"+vsolicita_cont).css("display","none");
            vsolicita_cont++;
            $("#vsolicita_seccion"+vsolicita_cont).css("display","block");
        }
    });
    function ver_mapa_cerca(imagen){
        $("#vsolicita_sig").click();
        $("#plan_img_detalle").attr("src",imagen);
        $("#plan_img_detalle").attr("width",tam+"%");
    }
    function set_tit(obj,nombre){
        if(obj.id=="vsolicita_tit_3"){
            if($(obj).is(':checked')==true){
                $("#vsolicita_seccion8_cuerpo").css("display","block");
            }
            else{
                $("#vsolicita_seccion8_cuerpo").css("display","none");
            }
        }
        if(nombre=="OTROS" && $(obj).is(':checked')==true){
            $("#vsolicita_otro_obs").css("display","block");
            $("#vsolicita_form_nuevo input[name=tra_tit_obs]").focus();
        }
        else if(nombre=="OTROS" && $(obj).is(':checked')==false){
            $("#vsolicita_otro_obs").css("display","none");
            $("#vsolicita_form_nuevo input[name=tra_tit_obs]").val("");
        }
        tmpcad="";
        $("#vsolicita_div_check").find("input").each(function(){
            if($(this).is(':checked')==true){
                tmpcad+=$(this).val()+",";
            }
        });
        $("#vsolicita_form_nuevo input[name=tra_tit_ides]").val(tmpcad);
    }
    function set_orden(obj,nombre,id){
        tmpcad="";
        tmpmonto=0;
        $("#vsolicita_div_check_orden").find("input").each(function(){
            if($(this).is(':checked')==true){
                tmpcad+=$(this).val()+",";
                if($(this).val()==1){
                    largo=$("#vsolicita_form_nuevo input[name=tra_est_lar]").val();
                    ancho=$("#vsolicita_form_nuevo input[name=tra_est_anc]").val();
                    area=largo*ancho;
                    mmm=0;
                    if(area>=1 && area<=100){
                        mmm=parseFloat($(this).attr("monto1"));
                    }
                    else if(area>=101 && area<=500){
                        mmm=parseFloat($(this).attr("monto2"));
                    }
                    else if(area>=501){
                        mmm=parseFloat($(this).attr("monto3"));
                    }
                    tmpmonto+=mmm;
                }
                else{
                    tmpmonto+=parseFloat($(this).attr("monto1"));
                }
            }
        });
        $("#vsolicita_form_nuevo input[name=tra_tor_ides]").val(tmpcad);
        $("#vsolicita_form_nuevo input[name=tra_monto_total]").val(tmpmonto);
    }
    $("#vsolicita_form_nuevo").submit(function(e){
        e.preventDefault();
        loading("open");
        $.post("<?php echo site_url("modulo1/guardar_tramite"); ?>",$(this).serialize(),function(data){
            loading("close");
            notify("Registro creado con Código de Trámite "+data);
            $("#vsolicita_frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_tramite"); ?>"+"/"+data);
            $("#vsolicita_dialog_pdf").modal("show");
        });
    });
    function vsolicita_calcular_aforo(){
        largo=$("#vsolicita_form_nuevo input[name=tra_est_lar]").val();
        ancho=$("#vsolicita_form_nuevo input[name=tra_est_anc]").val();
        aforo=largo*ancho/3;
        aforo=parseInt(aforo);
        $("#vsolicita_form_nuevo input[name=tra_oest_aforo]").val(aforo);
        $("#vsolicia_area_total").val(largo*ancho+" m2");
    }
    function vsolicita_bxdni(){
        dato=$("#vsolicita_input_dr").val();
        $("#vsolicita_form_nuevo input[name=tra_nombre]").val("JUAN ANTONIO ZEA MENDIZABAL");
        $("#vsolicita_form_nuevo input[name=tra_dni_ce]").val(dato);
        $("#vsolicita_form_nuevo input[name=tra_nombre]").focus();
        $("#vsolicita_form_nuevo input[name=tra_dni_ce]").focus();
    }
    function vsolicita_bxruc(){
        dato=$("#vsolicita_input_dr").val();
        $("#vsolicita_form_nuevo input[name=tra_nombre]").val("CONTITEL PERU S.A.C.");
        $("#vsolicita_form_nuevo input[name=tra_dni_ce]").val(dato);
        $("#vsolicita_form_nuevo input[name=tra_nombre]").focus();
        $("#vsolicita_form_nuevo input[name=tra_dni_ce]").focus();
    }

    $('#plan_img_detalle').mousemove(function(e){
        if(!this.canvas) {
            this.canvas = $('<canvas />')[0];
            this.canvas.width = this.width;
            this.canvas.height = this.height;
            this.canvas.getContext('2d').drawImage(this, 0, 0, this.width, this.height);
        }
        var pixelData = this.canvas.getContext('2d').getImageData(event.offsetX, event.offsetY, 1, 1).data;
        //$('#output').html('R: ' + pixelData[0] + '<br>G: ' + pixelData[1] + '<br>B: ' + pixelData[2] + '<br>A: ' + pixelData[3]);
        $('#output').css("background-color","rgba("+pixelData[0]+","+pixelData[1]+","+pixelData[2]+","+pixelData[3]+")");
        //$('#output').html("rgba("+pixelData[0]+","+pixelData[1]+","+pixelData[2]+","+pixelData[3]+")");
    });
    $('#plan_img_detalle').click(function(e){
        if(!this.canvas) {
            this.canvas = $('<canvas />')[0];
            this.canvas.width = this.width;
            this.canvas.height = this.height;
            this.canvas.getContext('2d').drawImage(this, 0, 0, this.width, this.height);
        }
        var pixelData = this.canvas.getContext('2d').getImageData(event.offsetX, event.offsetY, 1, 1).data;
        //$('#output').html('R: ' + pixelData[0] + '<br>G: ' + pixelData[1] + '<br>B: ' + pixelData[2] + '<br>A: ' + pixelData[3]);
        $('#output').css("background-color","rgba("+pixelData[0]+","+pixelData[1]+","+pixelData[2]+","+pixelData[3]+")");
        $("#leyenda_mapa").css("display","inline");
        //$('#output').html("rgba("+pixelData[0]+","+pixelData[1]+","+pixelData[2]+","+pixelData[3]+")");
    });

    function subir_tam(){
        tam+=5;
        $("#plan_img_detalle").attr("width",tam+"%");
        $('img').mousemove();
    }
    function bajar_tam(){
        tam-=5;
        if(tam<10) tam=10;
        $("#plan_img_detalle").attr("width",tam+"%");      
        $('img').mousemove();
    }

</script>


<?php $style="display:none;height:475px;"; ?>
<!-- ----------------------------------------------------------------------------------------------------------- -->
<form id="vsolicita_form_nuevo">
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion1">
        <div class="card-header bgm-teal">
            <h2>VERIFICAR COMPATIBILIDAD</h2>
        </div>
        <div class="card-body card-padding">
            <style type="text/css">
                .plan{
                    border: 1px dotted #ccc;
                    opacity: 0.80;
                }
                .plan:hover{
                    border: 1px solid black;
                    cursor: pointer;
                    opacity: 1;
                }
                #output{
                    background-color: #F5F5F5;
                }
            </style>
            <table width="100%" cellspacing=0 cellpadding=0 style="border:1px;margin:0px;padding:0px;">
                <?php $cont=1; ?>
                <?php for($i=0;$i<6;$i++){ ?>
                <tr>
                    <?php for($j=0;$j<4;$j++){ ?>
                    <td width="25%">
                        <img 
                            src="<?php echo "./mapa/plan".$cont.".png"; ?>" 
                            width="100%"
                            class="plan"
                            onclick="ver_mapa_cerca('<?php echo "./mapa/plan".$cont.".png"; ?>')"
                        >
                        <?php $cont++; ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion2">
        <div class="card-header bgm-teal">
            <h2>BUSCA EL LUGAR DONDE SE UBICA TU LOCAL PARA VER LA COMPATIBILIDAD</h2>
        </div>
        <div class="card-body card-padding">
            <img id="plan_img_detalle" width="" src="">
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion3">
        <div class="card-header bgm-teal">
            <h2>1. MODALIDAD DE TRAMITE QUE SOLICITA </h2>
        </div>
        <div class="card-body card-padding">
            <div id="vsolicita_div_check">
                <?php 
                    for ($i=0; $i <count($modal) ;$i++){
                        echo "
                            <div class='checkbox m-b-15'>
                                <label>
                                    <input type='checkbox' value='".$modal[$i]->tit_ide."' id='vsolicita_tit_".$modal[$i]->tit_ide."' onclick='set_tit(this,\"".$modal[$i]->tit_nombre."\")'>
                                    <i class='input-helper'></i>".
                                    $modal[$i]->tit_nombre."
                                </label>
                            </div>
                        ";
                    }
                ?>
            </div>
            <div class="form-group fg-float" id="vsolicita_otro_obs" style="display:none;">
                <div class="fg-line">
                    <input type="text" class="input-sm form-control fg-input" name="tra_tit_obs">
                </div>
                <label class="fg-label">Especifique: </label>
            </div>
            <input type="hidden" name="tra_tit_ides">
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion4">
        <div class="card-header bgm-teal">
            <h2>2. DATOS DEL SOLICITANTE</h2>
        </div>
        <div class="card-body card-padding">
            <?php 
                $label=array(
                    /*00*/"Folios",
                    /*01*/"Apellidos y nombres o Razon Social",
                    /*02*/"Nro. de DNI o CE",
                    /*03*/"Correo electrónico/e-mail",
                    /*04*/"Nro. de telefono",
                    /*05*/"RUC",
                    /*0501*/"Tipo Habilitacion",
                    /*0502*/"Nombre Habilitacion",
                    /*0503*/"Tipo Via",
                    /*06*/"Av/Jr/Ca/Pje",
                    /*07*/"Nro",
                    /*08*/"Int",
                    /*09*/"Mz",
                    /*10*/"Lt",
                    /*11*/"Urb., AA.HH, Barrios, otros",
                    /*12*/"Distrito",
                    /*13*/"Provincia",
                    /*14*/"Departamento",
                );
                $size=array(
                    /*00*/"1",
                    /*01*/"11",
                    /*02*/"2",
                    /*03*/"4",
                    /*04*/"3",
                    /*05*/"3",
                    /*0501*/"4",
                    /*0502*/"2",
                    /*0503*/"4",
                    /*06*/"8",
                    /*07*/"1",
                    /*08*/"1",
                    /*09*/"1",
                    /*10*/"1",
                    /*11*/"3",
                    /*12*/"3",
                    /*13*/"3",
                    /*14*/"3",
                );
                $name=array(
                    /*01*/"tra_folios",
                    /*01*/"tra_nombre",
                    /*02*/"tra_dni_ce",
                    /*03*/"tra_email",
                    /*04*/"tra_tel",
                    /*05*/"tra_ruc",
                    /*0501*/"tra_tipo_habilitacion",
                    /*0502*/"tra_nombre_habilitacion",
                    /*0503*/"tra_tipo_via",
                    /*06*/"tra_direc",
                    /*07*/"tra_dir_nro",
                    /*08*/"tra_dir_int",
                    /*09*/"tra_dir_mz",
                    /*10*/"tra_dir_lt",
                    /*11*/"tra_urb",
                    /*12*/"tra_dist",
                    /*13*/"tra_prov",
                    /*14*/"tra_depa",
                );
                $tipo=array(
                    /*01*/"text",
                    /*01*/"text",
                    /*02*/"text",
                    /*03*/"text",
                    /*04*/"text",
                    /*05*/"text",
                    /*0501*/"combo",
                    /*0502*/"text",
                    /*0503*/"combo",
                    /*06*/"text",
                    /*07*/"text",
                    /*08*/"text",
                    /*09*/"text",
                    /*10*/"text",
                    /*11*/"text",
                    /*12*/"text",
                    /*13*/"text",
                    /*14*/"text",
                );
                $value=array(
                    /*01*/"",
                    /*01*/"",
                    /*02*/"",
                    /*03*/"",
                    /*04*/"",
                    /*05*/"",
                    /*0501*/$tipo_habi,
                    /*0502*/"",
                    /*0503*/$tipo_via,
                    /*06*/"",
                    /*07*/"",
                    /*08*/"",
                    /*09*/"",
                    /*10*/"",
                    /*11*/"",
                    /*12*/"PUNO",
                    /*13*/"PUNO",
                    /*14*/"PUNO",
                );
            ?>

            <div class="row">
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="vsolicita_input_dr">
                        </div>
                        <label class="fg-label">Ingrese DNI/RUC</label>
                    </div>
                </div>
                <div class="col-xs-10">
                    <button class="btn btn-success waves-effect waves-effect" type="button" onclick="vsolicita_bxdni()">
                        Buscar por DNI
                    </button>
                    <button class="btn btn-success waves-effect waves-effect" type="button" onclick="vsolicita_bxruc()">
                        Buscar por RUC
                    </button>
                </div>
            </div>

            <?php for ($i=0; $i <count($name) ; $i++) { ?>
            <div class="col-xs-<?php echo $size[$i];  ?>">
                <?php if ($tipo[$i]=="combo"){ ?>
                <?php $valor=explode(";",$value[$i]); ?>
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <div class="select">
                            <select class="form-control" name="<?php echo $name[$i];  ?>">
                                <?php foreach ($valor as $reg): ?>
                                <?php $tmp=explode(":",$reg); ?>
                                <option value="<?php echo $tmp[0]; ?>"><?php echo $tmp[1]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <label class="fg-label"><?php echo $label[$i]; ?></label>
                </div>    
                <?php } ?>
                <?php if ($tipo[$i]=="text"){ ?>
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>" value="<?php echo $value[$i];  ?>">
                    </div>
                    <label class="fg-label"><?php echo $label[$i]; ?></label>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion5">
        <div class="card-header bgm-teal">
            <h2>3. REPRESENTANTE LEGAL</h2>
        </div>
        <div class="card-body card-padding">
            <?php 
                $label=array(
                    /*01*/"Apellidos y nombres",
                    /*02*/"Nro. de DNI o CE",
                    /*03*/"Nro. de partida P. (SUNARP)",
                    /*04*/"Nro. de telefono",
                );
                $size=array(
                    /*01*/"12",
                    /*02*/"4",
                    /*03*/"4",
                    /*04*/"4",
                );
                $name=array(
                    /*01*/"tra_rep_nom",
                    /*02*/"tra_rep_nr_doc",
                    /*03*/"tra_rep_nsunarp",
                    /*04*/"tra_rep_tel",
                );
            ?>
            <?php for ($i=0; $i <count($name) ; $i++) { ?>
            <div class="col-xs-<?php echo $size[$i];  ?>">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>">
                    </div>
                    <label class="fg-label"><?php echo $label[$i];  ?></label>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion6">
        <div class="card-header bgm-teal">
            <h2>4. DATOS DEL ESTABLECIMIENTO</h2>
        </div>
        <div class="card-body card-padding">
            <?php 
                $label=array(
                    /*01*/"Nombre comercial",
                    /*02*/"Giro o actividad",
                    /*03*/"Av/Jr/Ca/Pje",
                    /*04*/"Nro.",
                    /*05*/"Int",
                    /*06*/"Mz",
                    /*07*/"Lt",
                    /*08*/"Urb., AA.HH, Barrios, otros",
                );
                $size=array(
                    /*01*/"12",
                    /*02*/"12",
                    /*03*/"6",
                    /*04*/"1",
                    /*05*/"1",
                    /*06*/"1",
                    /*07*/"1",
                    /*08*/"2",
                );
                $name=array(
                    /*01*/"tra_est_nomb",
                    /*02*/"tra_actividad",
                    /*03*/"tra_est_dire",
                    /*04*/"tra_est_nro",
                    /*05*/"tra_est_int",
                    /*06*/"tra_est_mz",
                    /*07*/"tra_est_lt",
                    /*08*/"tra_est_urb",
                );
            ?>
            <?php for ($i=0; $i <count($name) ; $i++) { ?>
            <div class="col-xs-<?php echo $size[$i];  ?>">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>">
                    </div>
                    <label class="fg-label"><?php echo $label[$i];  ?></label>
                </div>
            </div>
            <?php } ?>
            <div class="col-sm-4">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <div class="select">
                            <select class="form-control" name="see_ide_est">
                                <?php foreach ($sector as $reg) { ?>
                                <option value="<?php echo $reg->see_ide; ?>"><?php echo $reg->see_nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <label class="fg-label">Sector económico</label>
                </div>
            </div>

            <div class="col-xs-2">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="tra_est_lar" onkeyup='vsolicita_calcular_aforo()'>
                    </div>
                    <label class="fg-label">Área Largo (mts)</label>
                </div>
            </div>
            <div class="col-xs-1">
                X
            </div>
            <div class="col-xs-2">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="tra_est_anc" onkeyup='vsolicita_calcular_aforo()'>
                    </div>
                    <label class="fg-label">Área Ancho (mts)</label>
                </div>
            </div>
            <div class="col-xs-1">
                =
            </div>
            <div class="col-xs-2">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" id="vsolicia_area_total" value="0.00 m2" readonly>
                    </div>
                    <label class="fg-label">Área Total (mts)</label>
                </div>
            </div>

            <div class="col-sm-4">
                <?php $valor=explode(";",$tipo_itse); ?>
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <div class="select">
                            <select class="form-control" name="tra_tipo_itse">
                                <?php foreach ($valor as $reg): ?>
                                <?php $tmp=explode(":",$reg); ?>
                                <option value="<?php echo $tmp[0]; ?>"><?php echo $tmp[1]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <label class="fg-label">Tipo de ITSE</label>
                </div>    
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion7">
        <div class="card-header bgm-teal">
            <h2>5. OTROS DATOS DEL ESTABLECIMIENTO</h2>
        </div>
        <div class="card-body card-padding">
            <div class="col-xs-4">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="tra_oest_aforo" value='&nbsp;'>
                    </div>
                    <label class="fg-label">Capacidad a foro (CA)</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <div class="select">
                            <select class="form-control" name="tra_oest_mat_tox">
                                <option value="-"></option>
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                        </div>
                    </div>
                    <label class="fg-label">Manipulación y/o uso de materiales combustibles y/o tóxicos y/o inflamables</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <div class="select">
                            <select class="form-control" name="tra_oest_mat_cont">
                                <option value="-"></option>
                                <option value="NOBLE">NOBLE</option>
                                <option value="RUSTICO">RUSTICO</option>
                            </select>
                        </div>
                    </div>
                    <label class="fg-label">Material de construcción predominante</label>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion8">
        <div class="card-header bgm-teal">
            <h2>6. DECLARACION JURADA SECTORIAL</h2>
        </div>
        <div class="card-body card-padding">
            <div class="form-group fg-float">
                <div class="fg-line">
                    <textarea class="form-control" rows="5" name="tra_est_uso_comp"></textarea>
                </div>
                <label class="fg-label">El establecimiento es clasificado como uso compatible</label>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion9">
        <div class="card-header bgm-teal">
            <h2>7. DECLARACION JURADA DE PROCESO DE INSPECCION TECNICA DE SEGURIDAD EN EDIFICACIONES - ITSE D.S.058-2014 PCM</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_pqs">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Extintor tipo PQS</label>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_ins_pqs_kilos" value="0.00">
                        </div>
                        <label class="fg-label">Extintor tipo PQS Kilos</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_co2">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Extintor tipo CO2</label>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_ins_co2_kilos" value="0.00">
                        </div>
                        <label class="fg-label">Extintor tipo CO2 Kilos</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_sen">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI" selected>SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Señalización</label>
                    </div>
                </div>
            
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_llav_termo">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI" selected>SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Llaves termomagnéticas</label>
                    </div>
                </div>
            
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_boti">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI" selected>SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Botiquin implementado</label>
                    </div>
                </div>
            
                <div class="col-sm-3">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_ins_cab_en">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI" selected>SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Cables entubados o empotrados</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion10">
        <div class="card-header bgm-teal">
            <h2>8. DECLARACION JURADA DE ANUNCIO ADOSADO A FACHADA Y/O CARACTERISTICAS DEL ANUNCIO</h2>
        </div>
        <div class="card-body card-padding" id="vsolicita_seccion8_cuerpo" style="display:none;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" name="tra_anu_lumi">
                                    <option value="-"></option>
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                        </div>
                        <label class="fg-label">Luminoso</label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_cara">
                        </div>
                        <label class="fg-label">Características</label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_mat">
                        </div>
                        <label class="fg-label">Material</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_largo" value="">
                        </div>
                        <label class="fg-label">Medida Largo (mt.)</label>
                    </div>
                </div>
                <div class="col-xs-1">
                    X
                </div>
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_alto" value="">
                        </div>
                        <label class="fg-label">Medida Alto (mt.)</label>
                    </div>
                </div>
                <div class="col-xs-1" style="display:none;">
                    =
                </div>
                <div class="col-xs-2" style="display:none;">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" id="" value="0.00" readonly>
                        </div>
                        <label class="fg-label">Medida Total (mt.)</label>
                    </div>
                </div>
            </div>
            <div class="row col-sm-12">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <textarea class="form-control" rows="5" placeholder="" name="tra_anu_est_mat_car_col"></textarea>
                    </div>
                    <label class="fg-label">Estructura, Materiales, Caracteristicas, Color</label>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="vsolicita_seccion11">
        <div class="card-header bgm-teal">
            <h2>9. ORDEN UNICA DE PAGO</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div id="vsolicita_div_check_orden">
                    <?php 
                        for ($i=0; $i <count($orden) ;$i++){
                            echo "
                                <div class='checkbox m-b-15'>
                                    <label>
                                        <input type='checkbox' monto1='".$orden[$i]->tor_monto."' monto2='".$orden[$i]->tor_monto2."' monto3='".$orden[$i]->tor_monto3."' value='".$orden[$i]->tor_ide."' onclick='set_orden(this,\"".$orden[$i]->tor_nombre."\")'>
                                        <i class='input-helper'></i>".
                                        "[S/.".$orden[$i]->tor_monto."] ".$orden[$i]->tor_nombre."
                                    </label>
                                </div>
                            ";
                        }
                    ?>
                </div>
                <div class="form-group fg-float" id="vsolicita_otro_obs_orden" style="display:none;">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="tra_tor_ides">
                    </div>
                    <label class="fg-label">Especifique: </label>
                </div>
                <div class="col-xs-2">
                    <br>
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-lg form-control fg-input" name="tra_monto_total" value="0.00">
                        </div>
                        <label class="fg-label">Derecho de trámite</label>
                    </div>
                </div>                
                <input type="hidden" name="tra_tor_ides">
            
                <div class="col-xs-10">
                    <br>
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-lg form-control fg-input" name="tra_obs">
                        </div>
                        <label class="fg-label">Observaciones</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <button class="btn btn-primary waves-effect" type="submit">Guardar</button>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
</form>

<button class="btn btn-warning btn-icon waves-effect waves-circle waves-float" id="vsolicita_first" title="Primero">
    <i class="zmdi zmdi-undo"></i>
</button>

<button class="btn btn-primary btn-icon waves-effect waves-circle waves-float" id="vsolicita_ant" title="Anterior">
    <i class="zmdi zmdi-arrow-back"></i>
</button>

<button class="btn btn-primary btn-icon waves-effect waves-circle waves-float" id="vsolicita_sig" title="Siguiente">
    <i class="zmdi zmdi-arrow-forward"></i>
</button>

<button class="btn btn-success btn-icon waves-effect waves-circle waves-float" id="vsolicita_last" title="Ultimo">
    <i class="zmdi zmdi-redo"></i>
</button>

<div class="modal fade out" id="vsolicita_dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SOLICITUD DE DECLARACION JURADA PARA LICENCIA DE FUNCIONAMIENTO</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="vsolicita_frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>