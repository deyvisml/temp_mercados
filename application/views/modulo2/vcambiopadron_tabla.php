<script type="text/javascript">
    var vcambiopadron_tabla_persona="";
    var vcambiopadron_tabla_negocio="";
    function vcambiopadron_tabla_select(cont,ide){
        vcambiopadron_tabla_persona=$("#vcambiopadron_tabla_dat_"+cont).html();
        vcambiopadron_tabla_negocio=$("#vcambiopadron_tabla_neg_"+cont).html();
        if($("#vcambiopadron_opcion").val()==149){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_persona);
        }
        if($("#vcambiopadron_opcion").val()==150){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_persona);   
        }
        if($("#vcambiopadron_opcion").val()==152){
            $("#vcambiopadron_titular").val(vcambiopadron_tabla_negocio);
        }
        $("#vcambiopadron_com_ide").val(ide);
        $("#vcambiopadron_dialog_buscar").modal('hide');
        $("#vcambiopadron_titular").focus();
    }
</script>
<div style="color:#000;overflow-y:scroll;">
<table class="table table-bordered table-hover table-condensed" style="overflow-y:scroll;">
    <thead>
        <tr style="background:#000;">
            <th style="background:#ccc;" width="10%"></th>
            <th style="background:#ccc;" width="35%">Datos</th>
            <th style="background:#ccc;" width="25%">Mercado</th>
            <th style="background:#ccc;" width="15%">Puesto</th>
            <th style="background:#ccc;" width="15%">Negocio</th>
        <tr>
    </thead>
</table>
</div>

<div style="color:#000;overflow-y:scroll;height:350px;">
    <table class="table table-bordered table-hover table-condensed table-striped" style="color:#000;">
        <tbody>
            <?php if ($titu!=false): $cont=1; ?>
            <?php foreach ($titu as $reg): ?>
            <tr style="cursor:pointer;" onclick="vcambiopadron_tabla_select(<?php echo $cont; ?>,<?php echo $reg->com_ide; ?>)">
                <td width="10%" id="vcambiopadron_tabla_nro_<?php echo $cont;  ?>"><?php echo $cont; ?></td>
                <td width="35%" id="vcambiopadron_tabla_dat_<?php echo $cont;  ?>"><?php echo $reg->com_datos; ?></td>
                <td width="25%" id="vcambiopadron_tabla_mer_<?php echo $cont;  ?>"><?php echo $reg->mer_nombre; ?></td>
                <td width="15%" id="vcambiopadron_tabla_pue_<?php echo $cont;  ?>"><?php echo $reg->com_tipo_puesto." ".$reg->com_nro_puesto; ?></td>
                <td width="15%" id="vcambiopadron_tabla_neg_<?php echo $cont;  ?>"><?php echo $reg->com_negocio; ?></td>
            </tr>
            <?php $cont++;  ?>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
