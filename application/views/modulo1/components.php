<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<!-- Mirrored from 192.185.228.226/projects/ma/1-5-1/jquery/components.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Oct 2015 15:16:12 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>
    
        <!-- Vendor CSS -->
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
        
        <!-- Following CSS codes are used only fore demo purposes thus you can remove anytime -->
        <style type="text/css">
            .dropdown-basic-demo {
                display: inline-block;
                margin: 0 15px 20px 0;
            }
            
            .dropdown-basic-demo .dropdown-menu {
                display: block;
                position: relative;
                transform: scale(1);
                opacity: 1;
                filter: alpha(opacity=1);
                z-index: 0;
            }
            
            .dropdown-btn-demo .dropdown, .dropdown-btn-demo .btn-group, .btn-demo .btn {
                display: inline-block;
                margin: 0 5px 7px 0;
            }

            .modal-preview-demo .modal {
                position: relative; 
                display: block; 
                z-index: 0; 
                background: rgba(0,0,0,0.1);
            }
            
            .margin-bottom > *{
                margin-bottom: 20px;
            }
            
            .popover-demo .popover {
                position: relative;
                display: inline-block;
                opacity: 1;
                margin: 0 10px 30px;
                z-index: 0;
            }
        </style>
    </head>
    
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="index-2.html">Material Admin</a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li id="top-search">
                        <a class="tm-search" href="#"></a>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-message" href="#"><i class="tmn-counts">6</i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview">
                                <div class="lv-header">
                                    Messages
                                </div>
                                <div class="lv-body">
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">David Belle</div>
                                                <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Jonathan Morris</div>
                                                <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                                <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Glenn Jecobs</div>
                                                <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Bill Phillips</div>
                                                <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a class="lv-footer" href="#">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-notification" href="#"><i class="tmn-counts">9</i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">
                                <div class="lv-header">
                                    Notification
                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-clear="notification">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lv-body">
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">David Belle</div>
                                                <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Jonathan Morris</div>
                                                <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                                <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Glenn Jecobs</div>
                                                <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Bill Phillips</div>
                                                <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                    
                                <a class="lv-footer" href="#">View Previous</a>
                            </div>
                    
                        </div>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a data-toggle="dropdown" class="tm-task" href="#"><i class="tmn-counts">2</i></a>
                        <div class="dropdown-menu pull-right dropdown-menu-lg">
                            <div class="listview">
                                <div class="lv-header">
                                    Tasks
                                </div>
                                <div class="lv-body">
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">HTML5 Validation Report</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                <span class="sr-only">95% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Google Chrome Extension</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Social Intranet Projects</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Bootstrap Admin Template</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Youtube Client App</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <a class="lv-footer" href="#">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li class="hidden-xs">
                                <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                            </li>
                            <li>
                                <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-settings"></i> Other Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs" id="chat-trigger" data-trigger="#chat">
                        <a class="tm-chat" href="#"></a>
                    </li>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner c-overflow">
                    <div class="profile-menu">
                        <a href="#">
                            <div class="profile-pic">
                                <img src="img/profile-pics/1.jpg" alt="">
                            </div>

                            <div class="profile-info">
                                Malinda Hollaway

                                <i class="zmdi zmdi-arrow-drop-down"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li><a href="index-2.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li><a href="typography.html"><i class="zmdi zmdi zmdi-format-underlined"></i> Typography</a></li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-widgets"></i> Widgets</a>

                            <ul>
                                <li><a href="widget-templates.html">Templates</a></li>
                                <li><a class="active" href="widgets.html">Widgets</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Tables</a>

                            <ul>
                                <li><a href="tables.html">Normal Tables</a></li>
                                <li><a href="data-tables.html">Data Tables</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-collection-text"></i> Forms</a>

                            <ul>
                                <li><a href="form-elements.html">Basic Form Elements</a></li>
                                <li><a href="form-components.html">Form Components</a></li>
                                <li><a href="form-examples.html">Form Examples</a></li>
                                <li><a href="form-validations.html">Form Validation</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu active toggled">
                            <a href="#"><i class="zmdi zmdi-swap-alt"></i>User Interface</a>
                            <ul>
                                <li><a href="colors.html">Colors</a></li>
                                <li><a href="animations.html">Animations</a></li>
                                <li><a href="box-shadow.html">Box Shadow</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="notification-dialog.html">Notifications & Dialogs</a></li>
                                <li><a href="media.html">Media</a></li>
                                <li><a class="active" href="components.html">Components</a></li>
                                <li><a href="other-components.html">Others</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-trending-up"></i>Charts</a>
                            <ul>
                                <li><a href="flot-charts.html">Flot Charts</a></li>
                                <li><a href="other-charts.html">Other Charts</a></li>
                            </ul>
                        </li>
                        <li><a href="calendar.html"><i class="zmdi zmdi-calendar"></i> Calendar</a></li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-image"></i>Photo Gallery</a>
                            <ul>
                                <li><a href="photos.html">Default</a></li>
                                <li><a href="photo-timeline.html">Timeline</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="generic-classes.html"><i class="zmdi zmdi-layers"></i> Generic Classes</a></li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-collection-item"></i> Sample Pages</a>
                            <ul>
                                
                                <li><a href="profile-about.html">Profile</a></li>
                                <li><a href="list-view.html">List View</a></li>
                                <li><a href="messages.html">Messages</a></li>
                                <li><a href="pricing-table.html">Pricing Table</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="wall.html">Wall</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="login.html">Login and Sign Up</a></li>
                                <li><a href="lockscreen.html">Lockscreen</a></li>
                                <li><a href="404.html">Error 404</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
            
            <aside id="chat">
                <ul class="tab-nav tn-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
                    <li role="presentation"><a href="#online" aria-controls="online" role="tab" data-toggle="tab">Online Now</a></li>
                </ul>
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>
            
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="friends">
                        <div class="listview">
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Jonathan Morris</div>
                                        <small class="lv-small">Available</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="img/profile-pics/1.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">David Belle</div>
                                        <small class="lv-small">Last seen 3 hours ago</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Fredric Mitchell Jr.</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Glenn Jecobs</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="img/profile-pics/5.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Bill Phillips</div>
                                        <small class="lv-small">Last seen 3 days ago</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="img/profile-pics/6.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Wendy Mitchell</div>
                                        <small class="lv-small">Last seen 2 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/7.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Teena Bell Ann</div>
                                        <small class="lv-small">Busy</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="online">
                        <div class="listview">
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Jonathan Morris</div>
                                        <small class="lv-small">Available</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Fredric Mitchell Jr.</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Glenn Jecobs</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="img/profile-pics/7.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Teena Bell Ann</div>
                                        <small class="lv-small">Busy</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Components</h2>
                    
                        <ul class="actions">
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    
                    </div>
                
                    <div class="card">
                        <div class="card-header">
                            <h2>Dropdown <small>Toggleable, contextual menu for displaying lists of links</small></h2>
                    
                            <ul class="actions">
                                <li class="dropdown action-show">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                    
                                    <div class="dropdown-menu pull-right">
                                        <p class="p-20">
                                            You can put anything here
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    
                        <div class="card-body card-padding">
                            <p class="f-500 c-black m-b-5">Basic Previews (After triggering)</p>
                            <small>Please refer the Colors page for all the available color options</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu bgm-blue" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu bgm-teal" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu bgm-orange" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu bgm-bluegray" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu bgm-green" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-5">Dropdown links with icon</p>
                            <small>Adding <code>.dm-icon</code> class to the <code>.dropdown-menu</code> will enable extra room for icons in dropdown links.</small>
                
                            <br/>
                            <br/>
                            
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu dm-icon" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-home"></i> Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-account"></i> Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-email"></i> Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-pin"></i> Separated link</a></li>
                                </ul>
                            </div>
                
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu dm-icon bgm-blue" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-home"></i> Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-account"></i> Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-email"></i> Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-pin"></i> Separated link</a></li>
                                </ul>
                            </div>
                
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu dm-icon bgm-green" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-home"></i> Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-account"></i> Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-email"></i> Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-pin"></i> Separated link</a></li>
                                </ul>
                            </div>
                
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu dm-icon bgm-orange" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-home"></i> Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-account"></i> Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-email"></i> Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-pin"></i> Separated link</a></li>
                                </ul>
                            </div>
                
                            <div class="dropdown-basic-demo clearfix">
                                <ul class="dropdown-menu dm-icon bgm-bluegray" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-home"></i> Action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-account"></i> Another action</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-email"></i> Something else here</a></li>
                                    <li class="divider"></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-pin"></i> Separated link</a></li>
                                </ul>
                            </div>
                
                
                            <br/>
                            <br/>
                            
                            <p class="c-black f-500 m-b-5">Toggle Animations</p>
                            <small>Toggle animations are relies on basic 3 attributes, Animations In, Animation Out and Animation Duration. Make sure to give these values in the data-animation data attribute.</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="dropdown-btn-demo">
                                <div class="dropdown" data-animation="fadeIn,fadeOut,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Fade In <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="fadeInUp,fadeOutDown,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Fade In Up <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="fadeInLeft,fadeOutLeft,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Fade In Left <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="fadeInRight,fadeOutRight,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Fade In Right <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="bounceIn,bounceOut,1000">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Bounce In <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="fadeInDown,fadeOutUp,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Fade In Down <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="flipInX,flipOutX">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Flip In X <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="flipInY,flipOutY">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Flip In Y <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="rollIn,rollOut,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Roll In <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="rotateIn,rotateOut,600">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Rotate In <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown" data-animation="lightSpeedIn,lightSpeedOut,1000">
                                    <button type="button" class="btn btn-primary" data-toggle="dropdown">Light Speed In <i class="caret"></i></button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Alignment</p>
                            
                            <div class="clearfix dropdown-btn-demo">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">Dropdown Left</button>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">Dropdown Right</button>
                                    
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="c-black f-500 m-b-20">Dropups - Trigger dropdown menus above elements</p>
                            
                            <div class="dropdown-btn-demo">
                                <div class="dropdown dropup">
                                    <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">This is a Dropup</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown dropup">
                                    <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">This is another Dropup</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown dropup">
                                    <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">This is right aligned Dropup</a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="c-black f-500 m-b-20">Button Dropdowns</p>
                            
                            <div class="dropdown-btn-demo">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Default</a>
                                    <ul class="dropdown-menu pull-left">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Primary</a>
                                    <ul class="dropdown-menu pull-left">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown">Info</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-success" data-toggle="dropdown">Success</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">Warning</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-danger" data-toggle="dropdown">Danger</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown">Link</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="c-black f-500 m-b-20">Split Button Dropdowns</p>
                            
                            <div class="dropdown-btn-demo">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Default</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Primary</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">Info</button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Success</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning">Warning</button>
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger">Danger</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Split button dropdowns</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="card">
                        <div class="card-header">
                            <h2>Modal <small>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <p class="f-500 c-black m-b-20">A rendered modal with header, body, and set of actions in the footer.</p>
                        
                            <div class="clearfix modal-preview-demo">
                                <div class="modal"> <!-- Inline style just for preview --> 
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal title</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Curabitur blandit mollis lacus. Nulla sit amet est. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link">Save changes</button>
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Modals have two optional sizes, available via modifier classes to be placed on a <code>.modal-dialog</code>.</p>
                
                            <div class="btn-demo">
                                <a data-toggle="modal" href="#modalDefault" class="btn btn-sm btn-default">Modal - Default</a>
                                <a data-toggle="modal" href="#modalNarrower" class="btn btn-sm btn-default">Modal - Small</a>
                                <a data-toggle="modal" href="#modalWider" class="btn btn-sm btn-default">Modal - Large</a>
                            </div>

                            <br/>
                            <br/>

                            <!-- Modal Default -->	
                            <div class="modal fade" id="modalDefault" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal Small -->	
                            <div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal Large -->	
                            <div class="modal fade" id="modalWider" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="f-500 c-black m-b-20">Other Examples</p>
                            
                            <div class="btn-demo">
                                <a data-toggle="modal" href="#noAnimation" class="btn btn-default">Without Animation</a>
                                <a data-toggle="modal" href="#preventClick" class="btn btn-default">Prevent Outside Click</a>
                            </div>
                            
                            <div class="modal" id="noAnimation" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="preventClick" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-5">Optional Colors</p>
                            <small>Make sure to give the available color in modal's data-attribute 'data-modal-color'</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="btn-demo" id="btn-color-targets">
                                <a href="#modalColor" data-target-color="blue" data-toggle="modal" class="btn bgm-blue">Blue</a>
                                <a href="#modalColor" data-target-color="lightblue" data-toggle="modal" class="btn bgm-lightblue">Light Blue</a>
                                <a href="#modalColor" data-target-color="cyan" data-toggle="modal" class="btn bgm-cyan">Cyan</a>
                                <a href="#modalColor" data-target-color="green" data-toggle="modal" class="btn bgm-green">Green</a>
                                <a href="#modalColor" data-target-color="lightgreen" data-toggle="modal" class="btn bgm-lightgreen">Light Green</a>
                                <a href="#modalColor" data-target-color="red" data-toggle="modal" class="btn bgm-red">Red</a>
                                <a href="#modalColor" data-target-color="amber" data-toggle="modal" class="btn bgm-amber">Amber</a>
                                <a href="#modalColor" data-target-color="orange" data-toggle="modal" class="btn bgm-orange">Orange</a>
                                <a href="#modalColor" data-target-color="teal" data-toggle="modal" class="btn bgm-teal">Teal</a>
                                <a href="#modalColor" data-target-color="bluegray" data-toggle="modal" class="btn bgm-bluegray">Blue Gray</a>
                            </div>
                            
                            <div class="modal fade" data-modal-color="" id="modalColor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link">Save changes</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Tabs <small>Add quick, dynamic tab functionality to transition through panes of local content, even via dropdown menus.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <div role="tabpanel">
                                <ul class="tab-nav" role="tablist">
                                    <li class="active"><a href="#home11" aria-controls="home11" role="tab" data-toggle="tab">Home</a></li>
                                    <li><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">Profile</a></li>
                                    <li><a href="#messages11" aria-controls="messages11" role="tab" data-toggle="tab">Messages</a></li>
                                    <li><a href="#settings11" aria-controls="settings11" role="tab" data-toggle="tab">Settings</a></li>
                                </ul>
                              
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home11">
                                        <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
            Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                        <p>In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuada pretium. Phasellus consectetuer vestibulum elit.
            Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim.
            Cras ultricies mi eu turpis hendrerit fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse platea dictumst.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile11">
                                        <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages11">
                                        <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="settings11">
                                        <p>Praesent turpis. Phasellus magna. Fusce vulputate eleifend sapien. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 m-b-5 c-black">Right Aligned</p>
                            <small>Simply include the class <code>.tab-nav-right</code> to align the tab header to right side.</small>
                            
                            <div role="tabpanel">
                                <ul class="tab-nav tab-nav-right" role="tablist">
                                    <li class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#messages1" aria-controls="messages1" role="tab" data-toggle="tab">Messages</a></li>
                                    <li role="presentation"><a href="#settings1" aria-controls="settings1" role="tab" data-toggle="tab">Settings</a></li>
                                </ul>
                              
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home1">
                                        <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
            Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                        <p>In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuada pretium. Phasellus consectetuer vestibulum elit.
            Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim.
            Cras ultricies mi eu turpis hendrerit fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse platea dictumst.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile1">
                                        <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages1">
                                        <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
            Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
            Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="settings1">
                                        <p>Praesent turpis. Phasellus magna. Fusce vulputate eleifend sapien. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-5">With custom animations</p>
                            <small>You may add optional animation classes to animate the tab panes when switching. Please refer the Animations page to get all the available classes.</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div role="tabpanel" class="tab">
                                        <ul class="tab-nav" role="tablist">
                                            <li class="active"><a href="#home9" aria-controls="home9" role="tab" data-toggle="tab">Home</a></li>
                                            <li role="presentation"><a href="#profile9" aria-controls="profile9" role="tab" data-toggle="tab">Profile</a></li>
                                            <li role="presentation"><a href="#messages9" aria-controls="messages9" role="tab" data-toggle="tab">Messages</a></li>
                                        </ul>
                                      
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active animated fadeInRight in" id="home9">
                                                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
                    Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile9">
                                                <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages9">
                                                <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div role="tabpanel" class="tab">
                                        <ul class="tab-nav" role="tablist">
                                            <li class="active"><a href="#home10" aria-controls="home10" role="tab" data-toggle="tab">Home</a></li>
                                            <li role="presentation"><a href="#profile10" aria-controls="profile10" role="tab" data-toggle="tab">Profile</a></li>
                                            <li role="presentation"><a href="#messages10" aria-controls="messages10" role="tab" data-toggle="tab">Messages</a></li>
                                        </ul>
                                      
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active animated flipInX in" id="home10">
                                                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
                    Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane animated flipInX" id="profile10">
                                                <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane animated flipInX" id="messages10">
                                                <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-5">Optional Color Schemes</p>
                            <small>Make sure to give the available color in tabs's data-attribute 'data-tab-color' </small>
                        
                            <br/>
                            <br/>
                            
                            <div class="row margin-bottom"> 
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="red">
                                        <li class="active"><a href="#home2" role="tab" data-toggle="tab">Home</a></li>
                                        <li role="presentation"><a href="#profile2" role="tab" data-toggle="tab">Profile</a></li>
                                        <li role="presentation"><a href="#messages2" role="tab" data-toggle="tab">Messages</a></li>
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="green">
                                        <li class="active"><a href="#home3" role="tab" data-toggle="tab">Toyota</a></li>
                                        <li role="presentation"><a href="#profile3" role="tab" data-toggle="tab">Nissan</a></li>
                                        <li role="presentation"><a href="#messages3" role="tab" data-toggle="tab">Mazda</a></li>
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="teal">
                                        <li class="active"><a href="#home4" role="tab" data-toggle="tab">Apple</a></li>
                                        <li role="presentation"><a href="#profile4" role="tab" data-toggle="tab">Orange</a></li>
                                        <li role="presentation"><a href="#messages4" role="tab" data-toggle="tab">Grapes</a></li>
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="amber">
                                        <li class="active"><a href="#home5" role="tab" data-toggle="tab">Samsung</a></li>
                                        <li role="presentation"><a href="#profile5" role="tab" data-toggle="tab">Huawei</a></li>
                                        <li role="presentation"><a href="#messages5" role="tab" data-toggle="tab">Pantech</a></li>
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="black">
                                        <li class="active"><a href="#home6" role="tab" data-toggle="tab">China</a></li>
                                        <li role="presentation"><a href="#profile6" role="tab" data-toggle="tab">Korea</a></li>
                                        <li role="presentation"><a href="#messages6" role="tab" data-toggle="tab">Japan</a></li>
                                    </ul>
                                </div>
                                
                                <div role="tabpanel" class="col-sm-6">
                                    <ul class="tab-nav" role="tablist" data-tab-color="cyan">
                                        <li class="active"><a href="#home7" role="tab" data-toggle="tab">Tizen</a></li>
                                        <li role="presentation"><a href="#profile7" role="tab" data-toggle="tab">Android</a></li>
                                        <li role="presentation"><a href="#messages7" role="tab" data-toggle="tab">Windows Phone</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Wizard <small>This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into each step individually.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <div class="form-wizard-basic fw-container">
                                <ul class="tab-nav text-center">
                                    <li><a href="#tab1" data-toggle="tab">First</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Second</a></li>
                                    <li><a href="#tab3" data-toggle="tab">Third</a></li>
                                    <li><a href="#tab4" data-toggle="tab">Forth</a></li>
                                    <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
                                    <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab1">                                        
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien, cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel placerat augue. Aliquam pharetra mauris neque, sit amet egestas risus semper non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet risus volutpat volutpat. Phasellus vitae turpis a elit tincidunt ornare. Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet vulputate.</p>
                                        <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                                        <p>Aliquam tempus rutrum neque, a blandit dui. Proin quis elit non est scelerisque pharetra nec id libero. Quisque id tincidunt elit. Maecenas non mauris malesuada, interdum justo et, ullamcorper magna. Nulla libero risus, vestibulum pharetra eleifend in, aliquam ac odio. Sed ligula orci, rhoncus sit amet ipsum vel, vehicula interdum ligula. </p>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                        <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab3">
                                        <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                                        <p>Aliquam tempus rutrum neque, a blandit dui. Proin quis elit non est scelerisque pharetra nec id libero. Quisque id tincidunt elit. Maecenas non mauris malesuada, interdum justo et, ullamcorper magna. Nulla libero risus, vestibulum pharetra eleifend in, aliquam ac odio. Sed ligula orci, rhoncus sit amet ipsum vel, vehicula interdum ligula. </p>
                                    </div>
                                    <div class="tab-pane fade" id="tab4">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien, cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel placerat augue. Aliquam pharetra mauris neque, sit amet egestas risus semper non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet risus volutpat volutpat. Phasellus vitae turpis a elit tincidunt ornare. Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet vulputate.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab5">
                                        <p>Cras mattis vulputate lacus sed aliquet. Pellentesque ultricies lectus ut augue tincidunt volutpat. Quisque lorem lectus, vulputate et feugiat ac, tincidunt eu neque. Suspendisse et dignissim ex. Praesent finibus vestibulum faucibus. Vestibulum scelerisque aliquam eros, id tincidunt lacus interdum eu. Praesent molestie leo sed varius tempus. Etiam quis turpis eget diam aliquet congue ut non risus. In sed sapien placerat, fermentum odio id, sagittis magna. Donec sollicitudin ipsum eget pretium tincidunt. Mauris venenatis metus a turpis eleifend, vitae tincidunt nunc tristique. Nulla facilisi. In hac habitasse platea dictumst. Curabitur auctor nibh eget mauris iaculis, id tempor ex egestas. Proin nisl diam, malesuada quis ipsum vitae, tincidunt efficitur neque. Nam suscipit magna ac nisl ornare lobortis.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab6">
                                        <p>Nunc gravida hendrerit turpis a iaculis. Aenean tempus bibendum augue at tempor. Vestibulum nec ligula elementum nisi viverra mattis ac in nibh. Cras eu elementum massa. Integer cursus quam maximus, ornare ex at, bibendum dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus quis eleifend turpis, eget luctus felis.</p>
                                    </div>
                                        
                                    <ul class="fw-footer pagination wizard">
                                        <li class="previous first"><a class="a-prevent" href="#"><i class="zmdi zmdi-more-horiz"></i></a></li>
                                        <li class="previous"><a class="a-prevent" href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li class="next"><a class="a-prevent" href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                        <li class="next last"><a class="a-prevent" href="#"><i class="zmdi zmdi-more-horiz"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Collapse <small>Flexible plugin that utilizes a handful of classes for easy toggle behavior.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <p>Click the buttons below to show and hide another element via class changes. You can use a link with the <code>href</code> attribute, or a button with the <code>data-target</code> attribute. In both cases, the <code>data-toggle="collapse"</code> is required.</p>
                            
                            <div class="btn-demo">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Link with href
                                </a>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Button with data-target
                                </button>
                            </div>

                            <div class="collapse m-t-10" id="collapseExample">
                                <p>Curabitur nisi velit, placerat id diam ac, maximus aliquet ex. Integer in laoreet nisl. Maecenas auctor porta ligula, non interdum dolor hendrerit non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum tortor tellus, commodo suscipit cursus vitae, auctor eu massa. Aliquam nibh dolor, lobortis in molestie eget, tristique ac nunc. Aliquam fringilla aliquam est eu congue.</p>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="c-black f-500 m-b-5">Accordion</p>
                            <small>Extend the default collapse behavior to create an accordion with the panel component.</small>
                        
                            <br/>
                            <br/>
                            
                            <div class="panel-group" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-collapse">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Collapsible Group Item #1
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-collapse">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Collapsible Group Item #2
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-collapse">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Collapsible Group Item #3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                            <br/>
                            
                            <p class="f-500 c-black m-b-5">Optional Color Schemes</p>
                            <small>Make sure to give the available color in collapse's data-attribute 'data-collase-color' </small>
                        
                            <br/>
                            <br/>
                            
                            <div class="row">
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="red" id="accordionRed" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-one" aria-expanded="true">
                                                        Collapse Red #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionRed" href="#accordionRed-two" aria-expanded="false">
                                                        Collapse Red #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionRed-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="green" id="accordionGreen" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-one" aria-expanded="true">
                                                        Collapse Green #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">
                                                        Collapse Green #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionGreen-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="amber" id="accordionAmber" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionAmber" href="#accordionAmber-one" aria-expanded="true">
                                                        Collapse Amber #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionAmber-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionAmber" href="#accordionAmber-two" aria-expanded="false">
                                                        Collapse Amber #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionAmber-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">
                                                        Collapse Teal #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-two" aria-expanded="false">
                                                        Collapse Teal #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionTeal-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="black" id="accordionBlack" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionBlack" href="#accordionBlack-one" aria-expanded="true">
                                                        Collapse Black #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionBlack-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionBlack" href="#accordionBlack-two" aria-expanded="false">
                                                        Collapse Black #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionBlack-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 m-b-25">
                                    <div class="panel-group" data-collapse-color="cyan" id="accordionCyan" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionCyan" href="#accordionCyan-one" aria-expanded="true">
                                                        Collapse Cyan #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionCyan-one" class="collapse in" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-collapse">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionCyan" href="#accordionCyan-two" aria-expanded="false">
                                                        Collapse Cyan #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="accordionCyan-two" class="collapse" role="tabpanel">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Tooltips <small>Tooltips are an updated version, which don't rely on images, use CSS3 for animations, and data-attributes for local title storage.</small></h2> 
                        </div>
                        
                        <div class="card-body card-padding">
                            <p class="c-black f-500">Hover over the links below to see tooltips.</p>
                            
                            <p>Tight pants next level keffiyeh <a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel <a href="#" data-toggle="tooltip" title="Another tooltip">have a</a> terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats. Tofu biodiesel williamsburg marfa, four loko mcsweeney's cleanse vegan chambray. A really ironic artisan <a href="#" data-toggle="tooltip" title="Another one here too">whatever keytar</a>, scenester farm-to-table banksy Austin <a href="#" data-toggle="tooltip" title="The last tip!">twitter handle</a> freegan cred raw denim single-origin coffee viral.</p>
                            
                            <p class="f-500 m-b-5 c-black">Static tooltip</p>
                            <small>Four options are available: top, right, bottom, and left aligned.</small>
                            
                            <br/>
                            <br/>
                            
                            <div class="btn-demo">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Popovers <small>Add small overlays of content, like those on the iPad, to any element for housing secondary information.</small></h2>
                        </div>
                    
                        <div class="card-body card-padding">
                            <p class="c-black f-500 m-b-20">Four options are available: top, right, bottom, and left aligned.</p>
                            
                            <br/>
                            
                            <div class="popover-demo">
                                <div class="popover top">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Popover top</h3>
                                    <div class="popover-content">
                                        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                    </div>
                                </div>
                            
                                <div class="popover right">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Popover right</h3>
                                    <div class="popover-content">
                                        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                    </div>
                                </div>
                            
                                <div class="popover bottom">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Popover bottom</h3>
                              
                                    <div class="popover-content">
                                        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                    </div>
                                </div>
                            
                                <div class="popover left">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title">Popover left</h3>
                                    <div class="popover-content">
                                        <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                    </div>
                                </div>
                            
                                <div class="clearfix"></div>
                            </div>
                            
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Popover on Click</p>
                            <div class="btn-demo">
                                <!-- Top -->
                                <button class="btn btn-primary" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Top
                                </button>
                                
                                <!-- Right -->
                                <button class="btn btn-primary" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Right
                                </button>
                                
                                <!-- Bottom -->
                                <button class="btn btn-primary" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Bottom
                                </button>
                                
                                <!-- Left -->
                                <button class="btn btn-primary" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Left
                                </button>
                            </div>
                        
                            <br/>
                            <br/>
                        
                            <p class="f-500 c-black m-b-20">Popover on Hover</p>
                            <div class="btn-demo">
                                <!-- Top -->
                                <button class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Top
                                </button>
                                
                                <!-- Right --> 
                                <button class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Right
                                </button>
                                
                                <!-- Bottom -->
                                <button class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Bottom
                                </button>
                                
                                <!-- Left -->
                                <button class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                                    Left
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Progress Bar <small>Provide up-to-date feedback on the progress of a workflow or action with simple yet flexible progress bars.</small></h2>
                        </div>
                        
                        <div class="card-body card-padding">
                            <p class="f-500 c-black m-b-20">Basic Examples</p>
                            
                            <div id="demoQuery"></div>
                            
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                  <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                            
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Contextual alternatives</p>
                            <div class="progress m-b-10">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                            </div>
                            <div class="progress m-b-10">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                            </div>
                            <div class="progress m-b-10">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                            </div>
                            <div class="progress m-b-10">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                            </div>
                            
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Striped Progress bars</p>
                            <div class="progress progress-striped m-b-10">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                            </div>
                            <div class="progress progress-striped m-b-10">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                            </div>
                            <div class="progress progress-striped m-b-10">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                            </div>
                            <div class="progress progress-striped m-b-10">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                            </div>
                            
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Animated Progress bar (Not in old IEs)</p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>
                            
                            <br/>
                            
                            <p class="f-500 c-black m-b-20">Stacked Progress bar</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: 35%">
                                    <span class="sr-only">35% Complete (success)</span>
                                </div>
                                <div class="progress-bar progress-bar-warning" style="width: 20%">
                                    <span class="sr-only">20% Complete (warning)</span>
                                </div>
                                <div class="progress-bar progress-bar-danger" style="width: 10%">
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; 2015 Material Admin
            
            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </footer>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>
    
        <!-- Following is only for demo purpose to trigger colored modals. You may ignore this when you implement -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('body').on('click', '#btn-color-targets > .btn', function(){
                    var color = $(this).data('target-color');
                    $('#modalColor').attr('data-modal-color', color);
                });
            });
        </script>
    
    </body>

<!-- Mirrored from 192.185.228.226/projects/ma/1-5-1/jquery/components.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Oct 2015 15:16:14 GMT -->
</html>