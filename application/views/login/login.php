	<div class="lc-block toggled" id="l-login">
		<?php if($res!="ok"){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Error! <b>Usuario o clave incorrectos...</b>
			</div>
		<?php } ?>
        	<form method="post" id="frmLogin" action="<?php echo site_url("login/ingresar"); ?>">
	        	<h3>Sistema de Mercados</h3><br>
	            <div class="input-group m-b-20">
	                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
	                <div class="fg-line">
	                    <input type="text" name="login" class="form-control" placeholder="Escriba su usuario" required="required">
	                </div>
	            </div>
	            
	            <div class="input-group m-b-20">
	                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
	                <div class="fg-line">
	                    <input type="password" name="clave" class="form-control" placeholder="Escriba su clave" required="required">
	                </div>
	            </div>
	            
	            <div class="clearfix"></div>
	            <!--
	            <div class="checkbox">
	                <label>
	                    <input type="checkbox" value="">
	                    <i class="input-helper"></i>
	                    Mantener la sesi&oacuten iniciada
	                </label>
	            </div>
				-->
	            
	            <button type="submit" class="btn btn-login btn-danger btn-float" id="btnIngresar" title="Ingresar"><i class="zmdi zmdi-arrow-forward" ></i></button>
				
            </form>
			<div style="text-align:left;">
			<!--<br>
			Para solicitar una licencia via internet ingrese con los siguientes datos:<br>
				Usuario: internet<br>
				Clave: internet
			</div>-->
	</div>
	
	