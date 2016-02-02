<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title>Direktorat Jenderal Bina Keuangan Daerah Kemendagri</title>
    <link rel="icon" type="<?php echo $this->config->item("btheme"); ?>image/ico" href=""/>
    
    <link href="<?php echo $this->config->item("btheme"); ?>css/stylesheets.css" rel="stylesheet" type="text/css" />
    
    <!--[if lte IE 7]>
        <script type='text/javascript' src='js/other/lte-ie7.js'></script>
    <![endif]-->    
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/jquery/globalize.js'></script>
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/bootstrap/bootstrap.min.js'></script>    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/cookies/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/plugins.js'></script>    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/actions.js'></script>

</head>
<body>    
    
    <div id="wrapper"  class="screen_wide">
        
        <div id="header">
            
            <?php $this->load->view('menu_header'); ?>
            
        </div>
        
        <div id="layout">
        
            <div id="sidebar">
                <?php $this->load->view('menu_sidebar'); ?>
            </div>

            <div id="content">                        
                <div class="wrap">
                    
                    <div class="head">
                        <div class="info">
                            <h1><?php echo isset($title) ? $title : $_SESSION['direktorat']?></h1>
                            <ul class="breadcrumb">
                                <li><a href="#"><?php echo isset($sub_title) ? $sub_title : $_SESSION['bagian']?></a></li>                                
                            </ul>
                        </div>
                        <?php echo ISSET($form_search) ? $form_search :'' ;?>                                                
                    </div>                                                                    
                    
                    <div class="container">

                        <div class="row">                           
                             <?php $this->load->view($content); ?>
                        </div>                        
                        
                    </div>
                        
                </div>
            </div>
            
        </div>

    </div>
    
</body>
</html>
