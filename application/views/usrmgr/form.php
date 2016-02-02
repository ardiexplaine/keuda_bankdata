<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-md-12">
    <?php echo $this->session->flashdata('message');?> 
    <?php echo validation_errors(); ?>                          
    <div class="block">
        <div class="head">
            <h2>Form Pengaturan Pengguna</h2>
            <ul class="buttons">
                <li><a href="<?php echo base_url('usrmgr'); ?>"><span class="i-cycle"></span> Kembali</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>
        </div>
        <?php echo form_open(); ?>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Nama Lengkap:</div>
                <div class="col-md-5">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo ISSET($attr->nama_lengkap) ? $attr->nama_lengkap : ''; ?>"/> <?php echo form_error('nama_lengkap'); ?>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Username:</div>
                <div class="col-md-4">
                    <input type="text" name="username" class="form-control" value="<?php echo ISSET($attr->username) ? $attr->username : ''; ?>"/> <?php echo form_error('username'); ?>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Password:</div>
                <div class="col-md-5">
                    <input type="password" name="password" class="form-control" value=""/> <?php echo form_error('password'); ?>
                    <input type="password" name="passconf" class="form-control" value=""/> <?php echo form_error('passconf'); ?>
                    <span class="help-inline">Ulangi Password</span>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Status User:</div>
                <div class="col-md-4">
                    <?php 
                    $options = array('1'=>'admin','2'=>'user');
                    echo form_dropdown('status', $options, ISSET($attr->status) ? $attr->status : '');
                    ?>
                </div>
            </div>                                                                           
        </div>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Bagian Dalam Direktorat:</div>
                <div class="col-md-6">
                    <?php
                      $query = $this->db->get('bagian');
                      $data = array();  foreach ( $query->result() as $key ) : $data[$key->id_bag] = $key->nama_bagian; endforeach;
                      echo form_dropdown('id_bag', $data, isset($attr->id_bag) ? $attr->id_bag : ''); 
                    ?>
                    <span class="help-inline">Pilih salah satu bagian.</span>
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