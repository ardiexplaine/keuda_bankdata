<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="wrap">
    
    <a href="index.html" class="logo"></a>
    
    <div class="buttons fl">
        <div class="item">
            <a href="#" class="btn btn-primary btn-sm c_layout">
                <span class="i-layout-8"></span>                            
            </a>
        </div>
        <div class="item">
            <a href="#" class="btn btn-primary btn-sm c_screen">
                <span class="i-stretch"></span>                            
            </a>
        </div>                                     
    </div>

    <div class="buttons">                      
        <a href="<?php echo base_url();?>login/logout" class="btn btn-primary btn-sm dropdown-toggle">
            <span class="i-forward"></span> Keluar
        </a>
    </div>

    <?php if($_SESSION['level']=="admin") { ?>
    <div class="buttons">
        <div class="item">                        
            <div class="btn-group">                        
                <a href="#" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="i-tools"></span> Pengaturan
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>usrmgr"><span class="i-users"></span> Pengguna</a></li>
                    <li><a href="<?php echo base_url();?>direktorat"><span class="i-profile"></span> Master Direktorat</a></li>
                    <li><a href="<?php echo base_url();?>bagian"><span class="i-tools"></span> Master Bagian</a></li>
                    <li><a href="<?php echo base_url();?>ktgadm"><span class="i-folder"></span> Kategori Data</a></li>     
                </ul> 
            </div>
        </div> 
    </div>
    <?php } ?>
</div>