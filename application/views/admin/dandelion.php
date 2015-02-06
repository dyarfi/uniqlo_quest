<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- CSS Reset -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/reset.css" media="screen" />
        <!--  Fluid Grid System -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/fluid.css" media="screen" />
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/dandelion.theme.css" media="screen" />
        <!--  Main Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/dandelion.css" media="screen" />
        <!-- Demo Stylesheet -->
        <meta charset="utf-8" />
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <script src="<?php echo base_url() ?>assets/grocery_crud/js/dandelion.core.js"></script>
        <body>

            <!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
            <div id="da-wrapper" class="fluid">

                <!-- Header -->
                <div id="da-header">

                    <div id="da-header-top">

                        <!-- Container -->
                        <div class="da-container clearfix">

                            <!-- Logo Container. All images put here will be vertically centere -->
                            <div id="da-logo-wrap">
                                <div id="da-logo">
                                    <div id="da-logo-img">
                                        <h1 style="margin-bottom: 0px !important; font-weight: bold">REVLON-LINER - ADMIN PANEL</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Toolbar Menu -->
                            <div id="da-header-toolbar" class="clearfix">
                                <div id="da-header-button-container">
                                    <ul>
                                        <li class="da-header-button logout">
                                            <a href="<?php echo base_url() ?>admin/home/logout">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="da-header-bottom">
                        <!-- Container -->
                        <div class="da-container clearfix">
                            <!-- Breadcrumbs -->
                            <div id="da-breadcrumb">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>admin"><img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/16/home.png" alt="Home" />Dashboard</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div id="da-content">
                    <!-- Container -->
                    <div class="da-container clearfix">

                        <!-- Sidebar Separator do not remove -->
                        <div id="da-sidebar-separator"></div>

                        <!-- Sidebar -->
                        <div id="da-sidebar">

                            <!-- Main Navigation -->
                            <div id="da-main-nav" class="da-button-container">
                                <ul>    
                                    <li class="<?php echo $nav == 'player' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/player">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/user.png" alt="Customer" />
                                            </span>
                                            Player
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'participant' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/participant">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/user.png" alt="Customer" />
                                            </span>
                                            Submitter
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'sound' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/participant/list_image">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/images.png" alt="Customer" />
                                            </span>
                                            List Image
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'user' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/participant/user">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/locked.png" alt="Admin" />
                                            </span>
                                            User
                                        </a>
                                    </li>
                                    <li>
                                        <div align="center"><img width="100" style="padding:10px" src="<?php echo base_url() ?>assets/img/logo.png"/></div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div id="da-content-wrap" class="clearfix">
                            <!-- Content Area -->
                            <div id="da-content-area">
                                <?php echo $output ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div id="da-footer">
                    <div class="da-container clearfix">
                        <p>Copyright 2014. Revlon. All Rights Reserved.
                    </div>
                </div>

            </div>

        </body>
</html>
