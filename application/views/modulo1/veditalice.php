<script src="js/functions.js"></script>
<script type="text/javascript">
    var veditalicencia_tra_id = prompt("Ingrese el número de tramite");
    var tmpide1=0;
    var tmpide2=0;
    var tmpcos1=0;
    veditalicencia_tra_id=parseInt(veditalicencia_tra_id);
    if(veditalicencia_tra_id != null){
        var param={
            tra_ide:veditalicencia_tra_id
        }
        $.post("<?php echo site_url("modulo1/get_tramite"); ?>",param,function(data){
            loading("close");
            if(data=="false"){
                $("#veditalicencia__form_nuevo").css("display","none");
                alert("No se encuentra el codigo de tramite");
                $("#veditalicencialicencia_cod_tramite").html("No se encuentra el Código de Trámite: "+veditalicencia_tra_id);
            }
            else{
                data=eval(data);
                tmpide1=data[0].tra_tit_ides;
                tmpide2=data[0].tra_tor_ides;
                tmpcos1=data[0].tra_monto_total;
                $("#veditalicencialicencia_cod_tramite").html("Código de Trámite Duplicado: "+veditalicencia_tra_id+" Se generará un nuevo Código de Trámite para esta operación");
                tit_ides=data[0].tra_tit_ides.split(",")
                for(i=0;i<tit_ides.length-1;i++){
                    $("#veditalicencia__tit_"+tit_ides[i]).attr("checked","checked");
                }
                tor_ides=data[0].tra_tor_ides.split(",");
                for(i=0;i<tor_ides.length-1;i++){
                    $("#veditalicencia_tor_ide"+tor_ides[i]).attr("checked","checked");
                }
                $("#veditalicencia__form_nuevo input[name=tra_tit_ides]").val(data[0].tra_tit_ides);
                $("#veditalicencia__form_nuevo input[name=tra_tit_obs]").val(data[0].tra_tit_obs);

                $("#veditalicencia__form_nuevo input[name=tra_nombre]").val(data[0].tra_nombre);
                $("#veditalicencia__form_nuevo input[name=tra_dni_ce]").val(data[0].tra_dni_ce);
                $("#veditalicencia__form_nuevo input[name=tra_ruc]").val(data[0].tra_ruc);
                $("#veditalicencia__form_nuevo input[name=tra_email]").val(data[0].tra_email);
                $("#veditalicencia__form_nuevo input[name=tra_tel]").val(data[0].tra_tel);
                $("#veditalicencia__form_nuevo input[name=tra_direc]").val(data[0].tra_direc);
                $("#veditalicencia__form_nuevo input[name=tra_dir_nro]").val(data[0].tra_dir_nro);
                $("#veditalicencia__form_nuevo input[name=tra_dir_int]").val(data[0].tra_dir_int);
                $("#veditalicencia__form_nuevo input[name=tra_dir_mz]").val(data[0].tra_dir_mz);
                $("#veditalicencia__form_nuevo input[name=tra_dir_lt]").val(data[0].tra_dir_lt);
                $("#veditalicencia__form_nuevo input[name=tra_urb]").val(data[0].tra_urb);
                $("#veditalicencia__form_nuevo input[name=tra_depa]").val(data[0].tra_depa);
                $("#veditalicencia__form_nuevo input[name=tra_prov]").val(data[0].tra_prov);
                $("#veditalicencia__form_nuevo input[name=tra_dist]").val(data[0].tra_dist);

                $("#veditalicencia__form_nuevo input[name=tra_rep_nom]").val(data[0].tra_rep_nom);
                $("#veditalicencia__form_nuevo input[name=tra_rep_nr_doc]").val(data[0].tra_rep_nr_doc);
                $("#veditalicencia__form_nuevo input[name=tra_rep_nsunarp]").val(data[0].tra_rep_nsunarp);
                $("#veditalicencia__form_nuevo input[name=tra_rep_tel]").val(data[0].tra_rep_tel);

                $("#veditalicencia__form_nuevo input[name=tra_est_nomb]").val(data[0].tra_est_nomb);
                $("#veditalicencia__form_nuevo input[name=tra_actividad]").val(data[0].tra_actividad);
                $("#veditalicencia__form_nuevo input[name=tra_est_dire]").val(data[0].tra_est_dire);
                $("#veditalicencia__form_nuevo input[name=tra_est_nro]").val(data[0].tra_est_nro);
                $("#veditalicencia__form_nuevo input[name=tra_est_int]").val(data[0].tra_est_int);
                $("#veditalicencia__form_nuevo input[name=tra_est_mz]").val(data[0].tra_est_mz);
                $("#veditalicencia__form_nuevo input[name=tra_est_lt]").val(data[0].tra_est_lt);
                $("#veditalicencia__form_nuevo input[name=tra_est_urb]").val(data[0].tra_est_urb);

                $("#veditalicencia__form_nuevo select[name=see_ide_est]").val(data[0].see_ide_est);
                $("#veditalicencia__form_nuevo input[name=tra_est_lar]").val(data[0].tra_est_lar);
                $("#veditalicencia__form_nuevo input[name=tra_est_anc]").val(data[0].tra_est_anc);

                $("#veditalicencia__form_nuevo input[name=tra_oest_aforo]").val(data[0].tra_oest_aforo);
                $("#veditalicencia__form_nuevo select[name=tra_oest_mat_tox]").val(data[0].tra_oest_mat_tox);
                $("#veditalicencia__form_nuevo select[name=tra_oest_mat_cont]").val(data[0].tra_oest_mat_cont);
                $("#veditalicencia__form_nuevo textarea[name=tra_est_uso_comp]").val(data[0].tra_est_uso_comp);

                $("#veditalicencia__form_nuevo select[name=tra_ins_pqs]").val(data[0].tra_ins_pqs);
                $("#veditalicencia__form_nuevo input[name=tra_ins_pqs_kilos]").val(data[0].tra_ins_pqs_kilos);
                $("#veditalicencia__form_nuevo select[name=tra_ins_co2]").val(data[0].tra_ins_co2);
                $("#veditalicencia__form_nuevo input[name=tra_ins_co2_kilos]").val(data[0].tra_ins_co2_kilos);
                $("#veditalicencia__form_nuevo select[name=tra_ins_sen]").val(data[0].tra_ins_sen);
                $("#veditalicencia__form_nuevo select[name=tra_ins_llav_termo]").val(data[0].tra_ins_llav_termo);
                $("#veditalicencia__form_nuevo select[name=tra_ins_boti]").val(data[0].tra_ins_boti);
                $("#veditalicencia__form_nuevo select[name=tra_ins_cab_en]").val(data[0].tra_ins_cab_en);

                $("#veditalicencia__form_nuevo select[name=tra_anu_lumi]").val(data[0].tra_anu_lumi);
                $("#veditalicencia__form_nuevo input[name=tra_anu_cara]").val(data[0].tra_anu_cara);
                $("#veditalicencia__form_nuevo input[name=tra_anu_mat]").val(data[0].tra_anu_mat);
                $("#veditalicencia__form_nuevo input[name=tra_anu_largo]").val(data[0].tra_anu_largo);
                $("#veditalicencia__form_nuevo input[name=tra_anu_alto]").val(data[0].tra_anu_alto);
                $("#veditalicencia__form_nuevo textarea[name=tra_anu_est_mat_car_col]").val(data[0].tra_anu_est_mat_car_col);
                $("#veditalicencia__form_nuevo input[name=tra_tor_ides]").val(data[0].tra_tor_ides);
                $("#veditalicencia__form_nuevo input[name=tra_monto_total]").val(data[0].tra_monto_total);
                $("#veditalicencia__form_nuevo input[name=tra_obs]").val(data[0].tra_obs);
            }
        });
    }
    else{
        $("#veditalicencia__form_nuevo").css("display","none");
        $("#veditalicencialicencia_cod_tramite").html("No se encuentra el Código de Trámite: "+veditalicencia_tra_id);
    }
    var veditalicencia__cont=1;
    $("#veditalicencia__seccion1").css("display","block");
    $("#veditalicencia__first").click(function(){
        veditalicencia__cont=1;
        for(i=1;i<=9;i++){
            $("#veditalicencia__seccion"+i).css("display","none");
        }
        $("#veditalicencia__seccion"+veditalicencia__cont).css("display","block");
    });
    $("#veditalicencia__last").click(function(){
        veditalicencia__cont=9;
        for(i=1;i<=9;i++){
            $("#veditalicencia__seccion"+i).css("display","none");
        }
        $("#veditalicencia__seccion"+veditalicencia__cont).css("display","block");        
    });
    $("#veditalicencia__ant").click(function(){
        if(veditalicencia__cont>1){
            $("#veditalicencia__seccion"+veditalicencia__cont).css("display","none");
            veditalicencia__cont--;
            $("#veditalicencia__seccion"+veditalicencia__cont).css("display","block");
        }
    });
    $("#veditalicencia__sig").click(function(){
        if(veditalicencia__cont<9){
            $("#veditalicencia__seccion"+veditalicencia__cont).css("display","none");
            veditalicencia__cont++;
            $("#veditalicencia__seccion"+veditalicencia__cont).css("display","block");
        }
    });
    function set_tit(obj,nombre){
        if(nombre=="OTROS" && $(obj).is(':checked')==true){
            $("#veditalicencia__otro_obs").css("display","block");
            $("#veditalicencia__form_nuevo input[name=tra_tit_obs]").focus();
        }
        else if(nombre=="OTROS" && $(obj).is(':checked')==false){
            $("#veditalicencia__otro_obs").css("display","none");
            $("#veditalicencia__form_nuevo input[name=tra_tit_obs]").val("");
        }
        tmpcad="";
        $("#veditalicencia__div_check").find("input").each(function(){
            if($(this).is(':checked')==true){
                tmpcad+=$(this).val()+",";
            }
        });
        $("#veditalicencia__form_nuevo input[name=tra_tit_ides]").val(tmpcad);
    }
    function set_orden(){
        /*if(nombre=="OTROS" && $(obj).is(':checked')==true){
            $("#veditalicencia__").css("display","block");
            $("#veditalicencia__form_nuevo input[name=tra_tit_obs]").focus();
        }
        else if(nombre=="OTROS" && $(obj).is(':checked')==false){
            $("#veditalicencia__otro_obs").css("display","none");
            $("#veditalicencia__form_nuevo input[name=tra_tit_obs]").val("");
        }*/
        tmpcad="";
        tmpmonto=0;
        $("#veditalicencia__div_check_orden").find("input").each(function(){
            if($(this).is(':checked')==true){
                tmpcad+=$(this).val()+",";
                tmpmonto+=parseFloat($(this).attr("monto"));
            }
        });
        $("#veditalicencia__form_nuevo input[name=tra_tor_ides]").val(tmpcad);
        $("#veditalicencia__form_nuevo input[name=tra_monto_total]").val(tmpmonto);
    }
    $("#veditalicencia__form_nuevo").submit(function(e){
        loading("open");
        e.preventDefault();
        if(veditalicencia_tra_id==0){
            alert("NO SE ENCUENTRA UN REGISTRO PARA ACTUALIZAR");
            loading("close");
            return;
        }
        $.post("<?php echo site_url("modulo1/actualiza_tramite"); ?>"+"/"+veditalicencia_tra_id+"/1"+"?lll1="+tmpide1+"&lll2="+tmpide2+"&ccc1="+tmpcos1,$(this).serialize(),function(data){
            loading("close");
            notify(data);
        });
        $.post("<?php echo site_url("modulo1/guardar_tramite"); ?>",$(this).serialize(),function(data){
            loading("close");
            notify("Registro creado con Código de Trámite "+data);
            $("#veditalicencia__frame_pdf").attr("src","<?php echo site_url("modulo1/pdf_tramite"); ?>"+"/"+data);
            $("#veditalicencia__dialog_pdf").modal("show");
        });
    });
</script>
<?php $style="display:none;height:475px;"; ?>
<!-- ----------------------------------------------------------------------------------------------------------- -->
<h5 id="veditalicencialicencia_cod_tramite"></h5>
<form id="veditalicencia__form_nuevo">
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion1">
        <div class="card-header bgm-teal">
            <h2>1. MODALIDAD DE TRAMITE QUE SOLICITA </h2>
        </div>
        <div class="card-body card-padding">
            <div id="veditalicencia__div_check">
                <?php 
                    for ($i=0; $i <count($modal) ;$i++){
                        echo "
                            <div class='checkbox m-b-15'>
                                <label>
                                    <input type='checkbox' value='".$modal[$i]->tit_ide."' id='veditalicencia__tit_".$modal[$i]->tit_ide."' onclick='set_tit(this,\"".$modal[$i]->tit_nombre."\")'>
                                    <i class='input-helper'></i>".
                                    $modal[$i]->tit_nombre."
                                </label>
                            </div>
                        ";
                    }
                ?>
            </div>
            <div class="form-group fg-float" id="veditalicencia__otro_obs" style="display:block;">
                <div class="fg-line">
                    <input type="text" class="input-sm form-control fg-input" name="tra_tit_obs" value="-">
                </div>
                <label class="fg-label">Especifique: </label>
            </div>
            <input type="hidden" id="veditalice_tra_tit_ides" name="tra_tit_ides">
        </div>    
        
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion2">
        <div class="card-header bgm-teal">
            <h2>2. DATOS DEL SOLICITANTE</h2>
        </div>
        <div class="card-body card-padding">
            <?php 
                $label=array(
                    /*01*/"Apellidos y nombres o Razon Social",
                    /*02*/"Nro. de DNI o CE",
                    /*03*/"Correo electrónico/e-mail",
                    /*04*/"Nro. de telefono",
                    /*05*/"RUC",
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
                    /*01*/"12",
                    /*02*/"2",
                    /*03*/"4",
                    /*04*/"3",
                    /*05*/"3",
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
                    /*01*/"tra_nombre",
                    /*02*/"tra_dni_ce",
                    /*03*/"tra_email",
                    /*04*/"tra_tel",
                    /*05*/"tra_ruc",
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
            ?>
            <?php for ($i=0; $i <count($name) ; $i++) { ?>
            <div class="col-xs-<?php echo $size[$i];  ?>">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>" value="-">
                    </div>
                    <label class="fg-label"><?php echo $label[$i];  ?></label>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion3">
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
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>" value="-">
                    </div>
                    <label class="fg-label"><?php echo $label[$i];  ?></label>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion4">
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
                        <input type="text" class="input-sm form-control fg-input" name="<?php echo $name[$i];  ?>" value="-">
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
                        <input type="text" class="input-sm form-control fg-input" name="tra_est_lar" value="-">
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
                        <input type="text" class="input-sm form-control fg-input" name="tra_est_anc" value="-">
                    </div>
                    <label class="fg-label">Área Ancho (mts)</label>
                </div>
            </div>
            <div class="col-xs-1" style="display:none;">
                =
            </div>
            <div class="col-xs-2" style="display:none;">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" id="veditalicencia_area_total" value="0.00 m2" readonly>
                    </div>
                    <label class="fg-label">Área Total (mts)</label>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion5">
        <div class="card-header bgm-teal">
            <h2>5. OTROS DATOS DEL ESTABLECIMIENTO</h2>
        </div>
        <div class="card-body card-padding">
            <div class="col-xs-4">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" name="tra_oest_aforo" value="-">
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
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion6">
        <div class="card-header bgm-teal">
            <h2>6. DECLARACION JURADA SECTORIAL</h2>
        </div>
        <div class="card-body card-padding">
            <div class="form-group fg-float">
                <div class="fg-line">
                    <textarea class="form-control" rows="5" name="tra_est_uso_comp">-</textarea>
                </div>
                <label class="fg-label">El establecimiento es clasificado como uso compatible</label>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion7">
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
                                    <option value="SI">SI</option>
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
                                    <option value="SI">SI</option>
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
                                    <option value="SI">SI</option>
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
                                    <option value="SI">SI</option>
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
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion8">
        <div class="card-header bgm-teal">
            <h2>8. DECLARACION JURADA DE ANUNCIO ADOSADO A FACHADA Y/O CARACTERISTICAS DEL ANUNCIO</h2>
        </div>
        <div class="card-body card-padding">
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
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_cara" value="-">
                        </div>
                        <label class="fg-label">Características</label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_mat" value="-">
                        </div>
                        <label class="fg-label">Material</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_largo" value="-">
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
                            <input type="text" class="input-sm form-control fg-input" name="tra_anu_alto" value="-">
                        </div>
                        <label class="fg-label">Medida Alto (mt.)</label>
                    </div>
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
    <div class="card" style="<?php echo $style; ?>;" id="veditalicencia__seccion9">
        <div class="card-header bgm-teal">
            <h2>9. ORDEN UNICA DE PAGO</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div id="veditalicencia__div_check_orden">
                    <?php 
                        for ($i=0; $i <count($orden) ;$i++){
                            echo "
                                <div class='checkbox m-b-15'>
                                    <label>
                                        <input type='checkbox' monto='".$orden[$i]->tor_monto."' id='veditalicencia_tor_ide".$orden[$i]->tor_ide."' value='".$orden[$i]->tor_ide."' onclick='set_orden()'>
                                        <i class='input-helper'></i>".
                                        "[S/.".$orden[$i]->tor_monto."] ".$orden[$i]->tor_nombre."
                                    </label>
                                </div>
                            ";
                        }
                    ?>
                </div>
                <div class="form-group fg-float" id="veditalicencia__otro_obs_orden" style="display:none;">
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
                <div class="col-xs-10">
                    <br>
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input type="text" class="input-lg form-control fg-input" name="tra_obs" value="-">
                        </div>
                        <label class="fg-label">Observaciones</label>
                    </div>
                </div>
                <input type="hidden" name="tra_tor_ides">
            </div>

            <div class="row">
                <button class="btn btn-primary waves-effect" type="submit">Guardar y Actualizar</button>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
</form>

<button class="btn btn-warning btn-icon waves-effect waves-circle waves-float" id="veditalicencia__first" title="Primero">
    <i class="zmdi zmdi-undo"></i>
</button>

<button class="btn btn-primary btn-icon waves-effect waves-circle waves-float" id="veditalicencia__ant" title="Anterior">
    <i class="zmdi zmdi-arrow-back"></i>
</button>

<button class="btn btn-primary btn-icon waves-effect waves-circle waves-float" id="veditalicencia__sig" title="Siguiente">
    <i class="zmdi zmdi-arrow-forward"></i>
</button>

<button class="btn btn-success btn-icon waves-effect waves-circle waves-float" id="veditalicencia__last" title="Ultimo">
    <i class="zmdi zmdi-redo"></i>
</button>

<div class="modal fade out" id="veditalicencia__dialog_pdf" data-modal-color="teal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SOLICITUD DE DECLARACION JURADA PARA LICENCIA DE FUNCIONAMIENTO</h4>
            </div>
            
            <div class="modal-body">
                <iframe src="" id="veditalicencia__frame_pdf" width="100%" height="450px" border="0px"></iframe>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>