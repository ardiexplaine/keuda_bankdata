<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-md-12">
    <?php echo $this->session->flashdata('message');?> 
    <?php //echo validation_errors(); ?>                          
    <div class="block">
        <div class="head">
            <h2>Form Ganti Password</h2>
            <ul class="buttons">
                <li><a href="<?php echo base_url('beranda'); ?>"><span class="i-cycle"></span> Kembali</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>
        </div>
        <?php echo form_open(); ?>
        <input type="hidden" name="user_id" class="form-control" value="<?php echo $this->session->userdata('user_id'); ?>"/>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Password Lama:</div>
                <div class="col-md-4">
                    <input type="password" name="password_lama" class="form-control" value=""/> <?php echo form_error('password_lama'); ?>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Password Baru:</div>
                <div class="col-md-4">
                    <input type="password" name="password" class="form-control" value=""/> <?php echo form_error('password'); ?>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Konfirmasi Password:</div>
                <div class="col-md-4">
                    <input type="password" name="passconf" class="form-control" value=""/> <?php echo form_error('passconf'); ?>
                </div>

            </div>                                                                           
        </div>
        <div class="footer">
            <div class="side fr">
                <button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>