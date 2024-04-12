<script src="js/functions.js"></script>
<script type="text/javascript">
	function fbuscar_tram(e){
		loading("open");
		if(e!=false)
			e.preventDefault();
		var param={
			dato:$("#vanutram_ide").val()
		};
		$.post("<?php echo site_url("modulo1/get_tramites_ide"); ?>",param,function(data){
			loading("close");
			$("#vanutram_result").html(data);
			$("#vanutram_form_anu").css("display","none");
		});
	}
	$("#vanutram_form_anu").submit(function(e){
		fbuscar_tram(e);
	});
</script>
<div class="card">
    <div class="card-header">
        <h2>Anular Tramite</h2>
    </div>
    <div class="card-body card-padding">
        <form id="vanutram_form_anu">
        	<div class="row">
	            <div class="col-sm-4">
	                <div class="form-group fg-float" style="display:block;">
	                    <div class="fg-line">
	                        <input type="text" class="input-sm form-control fg-input" id="vanutram_ide" required>
	                    </div>
	                    <label class="fg-label">Código de tramite</label>
	                </div>
	            </div>
	            <button class="btn btn-primary waves-effect" type="submit">BUSCAR</button>
			</div>
        </form>
        <div class="row">
        	<div class="col-sm-12" id="vanutram_result"></div>
		</div>
    </div>
</div>