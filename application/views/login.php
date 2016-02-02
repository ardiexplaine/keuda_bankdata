<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title>Direktorat Jenderal Keuangan Daerah</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
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
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/plugins.js'></script>    
    <script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/actions.js'></script>
</head>
<body>        
    <div id="wrapper" class="screen_wide sidebar_off">       
        <div id="layout">
            <div id="content">                        
                <div class="wrap nm">            
                    
                    <div class="signin_block">
                        <div class="row">
                            <?php //echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('message');?>
                            <div class="block">
                                <div class="head">
                                    <h2>Direktorat Jenderal Keuangan Daerah</h2>                                    
                                    <ul class="buttons">                                        
                                        <li><a href="#" class="tip" title="Please Sign In"><i class="i-locked"></i></a></li>
                                    </ul>                                     
                                </div>
                                <?php echo form_open(); ?>
                                <div class="content np">
                                    <div class="controls-row">
                                        <div class="col-md-3">Username:</div>
                                        <div class="col-md-9"><input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>"/>
                                            <?php echo form_error('username'); ?>
                                        </div>
                                    </div>
                                    <div class="controls-row">
                                        <div class="col-md-3">Password:</div>
                                        <div class="col-md-9"><input type="password" name="password" class="form-control" value=""/>
                                            <?php echo form_error('password'); ?>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="footer">
                                    <div class="side fr">
                                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>               
        
    </div>
    
</body>
</html>
