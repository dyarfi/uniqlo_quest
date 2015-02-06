<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Uniqlo Admin Panel</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/select2/select2_metro.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/data-tables/DT_bootstrap.css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
    </head>

    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->   
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?php echo base_url() ?>admin" style="margin-top:-4px;">
                        <img src="<?php echo base_url() ?>assets/img/logo.png" alt="logo" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?php echo base_url() ?>assets/grocery_crud/assets/img/menu-toggler.png" alt="" />
                    </a>          
                    <!-- END RESPONSIVE MENU TOGGLER -->            
                    <!-- BEGIN TOP NAVIGATION MENU -->              
                    <ul class="nav pull-right">             
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" src="<?php echo base_url() ?>assets/grocery_crud/assets/img/avatar_small.png" />
                                <span class="username">Hello, Admin</span>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a></li>
                                <li><a href="<?php echo base_url() ?>admin/home/logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU --> 
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar nav-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->        
                <ul class="page-sidebar-menu">
                    <li>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler hidden-phone"></div>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <li class="start ">
                        <a href="<?php echo base_url() ?>admin">
                            <i class="icon-home"></i> 
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li class="<?php echo $nav == 'user' ? 'active' : '' ?>">
                        <a href="<?php echo base_url() ?>admin/participant/user">
                            <i class="icon-th"></i> 
                            <span class="title">Admin/User</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>

                    <li class="<?php echo $nav == 'questionnaires' ? 'active' : '' ?>">
                        <a href="<?php echo base_url() ?>admin/questionnaires">
                            <i class="icon-th"></i> 
                            <span class="title">Questionnaires</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>

                    <li class="<?php echo $nav == 'questions' ? 'active' : '' ?>">
                        <a href="<?php echo base_url() ?>admin/questions">
                            <i class="icon-th"></i> 
                            <span class="title">Questions</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>

                    <li class="<?php echo $nav == 'participant' ? 'active' : '' ?>">
                        <a href="<?php echo base_url() ?>admin/participant">
                            <i class="icon-th"></i> 
                            <span class="title">Participant</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    
                    <li class="<?php echo $nav == 'images' ? 'active' : '' ?>">
                        <a href="<?php echo base_url() ?>admin/images">
                            <i class="icon-th"></i> 
                            <span class="title">Images</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>portlet Settings</h3>
                    </div>
                    <div class="modal-body">
                        <p>Here will be a configuration form</p>
                    </div>
                </div>
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN PAGE CONTAINER-->        
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN STYLE CUSTOMIZER -->
                            <div class="color-panel hidden-phone">
                                <div class="color-mode-icons icon-color"></div>
                                <div class="color-mode-icons icon-color-close"></div>
                                <div class="color-mode">
                                    <p>THEME COLOR</p>
                                    <ul class="inline">
                                        <li class="color-black current color-default" data-style="default"></li>
                                        <li class="color-blue" data-style="blue"></li>
                                        <li class="color-brown" data-style="brown"></li>
                                        <li class="color-purple" data-style="purple"></li>
                                        <li class="color-grey" data-style="grey"></li>
                                        <li class="color-white color-light" data-style="light"></li>
                                    </ul>
                                    <label>
                                        <span>Layout</span>
                                        <select class="layout-option m-wrap small">
                                            <option value="fluid" selected>Fluid</option>
                                            <option value="boxed">Boxed</option>
                                        </select>
                                    </label>
                                    <label>
                                        <span>Header</span>
                                        <select class="header-option m-wrap small">
                                            <option value="fixed" selected>Fixed</option>
                                            <option value="default">Default</option>
                                        </select>
                                    </label>
                                    <label>
                                        <span>Sidebar</span>
                                        <select class="sidebar-option m-wrap small">
                                            <option value="fixed">Fixed</option>
                                            <option value="default" selected>Default</option>
                                        </select>
                                    </label>
                                    <label>
                                        <span>Footer</span>
                                        <select class="footer-option m-wrap small">
                                            <option value="fixed">Fixed</option>
                                            <option value="default" selected>Default</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!-- END BEGIN STYLE CUSTOMIZER -->  
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                Data <?php echo $subject ?>
                            </h3>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="clear"></div>
                            <?php echo $output ?>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2014 &copy; Panasonic Admin.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="icon-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/excanvas.min.js"></script>
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/respond.min.js"></script>  
        <![endif]-->   
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/grocery_crud/assets/scripts/app.js"></script>

        <script>
            jQuery(document).ready(function() {
                App.init();
            });
        </script>
    </body>
    <!-- END BODY -->
</html>