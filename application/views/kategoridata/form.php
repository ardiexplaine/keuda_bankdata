<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="col-md-12">
    <?php echo $this->session->flashdata('message');?>                           
    <div class="block">
        <div class="head">
            <h2>Form Kategori Data</h2>
            <ul class="buttons">
                <li><a href="<?php echo base_url('kategoridata'); ?>"><span class="i-cycle"></span> Kembali</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>
        </div>
        <?php echo form_open(); ?>
        <div class="content np">                                        
            <div class="controls-row">
                <div class="col-md-2">Nama Kategori:</div>
                <div class="col-md-6">
                    <input type="text" name="nama_kategoridata" class="form-control" value="<?php echo ISSET($attr->nama_kategoridata) ? $attr->nama_kategoridata : ''; ?>"/> <?php echo form_error('nama_kategoridata'); ?>
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