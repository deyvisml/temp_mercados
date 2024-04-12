<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Licencias de funcionamiento</title>

        <!-- Vendor CSS -->
        <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo site_url("js/general.js"); ?>"></script>
    </head>
    <body style="background-color:#fff;">
        <!-- ---------------------------------------------------------------------------- -->
        <div class="modal fade out" id="modalLoading" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="false" style="display: none; ">
            <div class="modal-dialog modal-sm" style="text-align:center;width:150px;">
                <div class="modal-content" style="background-color:transparent;box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                    <div class="modal-header">
                        <!--
                        <h4 class="modal-title">Espere un momento ...</h4>
                        -->
                    </div>
                    <div class="modal-body" style="border:3px solid #57717d;background-color:#607d8b;padding-top:5px;">
                        <img src="<?php echo site_url("img/pageloader.gif"); ?>" height="32">
                        <div style="color:#000;">Cargando</div>
                    </div>
                    <div class="modal-footer">
                        <!--
                        <button type="button" class="btn btn-link waves-effect">Save changes</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------------------------- -->
        <header id="header" style="height:120px;padding-right:0px;">
            <ul class="header-inner" style="padding-top:2px;">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <div class="col-sm-5">
                        <img src="<?php echo site_url("img/munipunoae.png"); ?>" height="118">
                    </div>
                    <div class="col-sm-7" style="text-align:center;">
                        <a href="">
                        MUNICIPALIDAD PROVINCIAL DE<br>
                        <span style="font-size:30px">PUNO</span><br>
                        Subgerencia de actividades economicas<br>
                        "licencias de funcionamiento - meta 35"
                        </a>
                    </div>
                </li>
                
                <li class="pull-right">
                    <ul class="top-menu">
                        <img src="<?php echo site_url("img/headers/sm/3.png"); ?>" height="115">
                        <img src="<?php echo site_url("img/headers/sm/7.png"); ?>" height="115">
                    </ul>                    
                </li>
            </ul>
        </header>
        
        <section id="main" style="top:120px;position:absolute;" class="col-sm-12">
            