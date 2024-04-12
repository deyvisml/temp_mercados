<script type="text/javascript">
	$("#vadminrol_forms").submit(function(e){
		e.preventDefault();
		var param={
			us:$("#vadminrol_user").val()
		};
		$.post("<?php echo site_url("modulo2/get_roles") ?>",param,function(data){
			data=eval(data);
			$(".rol").prop("checked","");
			for(i=0;i<data.length;i++){
				$("#rol_"+data[i].rol_ide).prop("checked","checked");
			}
		});
	})
</script>
<div class="card">
    <div class="card-header">
        <h2>Administrar Roles</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vadminrol_forms">
            <div class="row" id="vadminrol_div">
                <div class="col-sm-6">
                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <div class="select">
                                <select class="form-control" id="vadminrol_user">
                                <?php
                                	echo "<option value='' ></option>";
                                    foreach($users as $reg) {
                                        echo "
                                        <option 
                                            value='$reg->usu_ide' 
                                        >
                                            $reg->usu_ape, $reg->usu_nomb
                                        </option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-success waves-effect" type="submit">Ver roles</button>
                </div>
            </div>
        </form>
        <div class="row">
        <form id="vadminrol_roles">
	        <?php foreach ($roles as $reg): ?>
	      	  	<div class="col-sm-4">
	      	  		<div class='checkbox m-b-15'>
						<label>
	                    	<input type='checkbox' class="rol" name='' id="rol_<?php echo $reg->rol_ide; ?>">
	                        <i class='input-helper'></i>
	                      	<?php echo $reg->rol_nom."<br>"; ?>
				        </label>
					</div>
				</div>
	        <?php endforeach ?>
	        <div class="col-sm-12">
	        	<button class="btn btn-primary waves-effect" type="submit">Guardar roles</button>
	        </div>
        </form>
        </div>
    </div>
</div>