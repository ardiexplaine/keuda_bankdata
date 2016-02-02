<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type='text/javascript' src='<?php echo $this->config->item("btheme"); ?>js/jquery.form.js'></script>
<script type="text/javascript"> 
    jQuery(document).ready(function() {

        jQuery("#listview").load('<?php echo base_url('kategoridata/listfilejpg/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>');
        
        jQuery('#form-upload').on('submit', function(e) {
            e.preventDefault();
            jQuery('#submit-button').attr('disabled', ''); 
            jQuery("#output").html('<img src="<?php echo base_url('asset/upload/images/loading.gif'); ?>" alt="Please Wait"/> <span>Mengunggah...</span>');
            jQuery(this).ajaxSubmit({
                target: '#output',
                success:  sukses 
            });
        });
        
        var count = 1;
        jQuery("#add_btn").click(function(){
            count += 1;
            jQuery('#fill').append('<div class="records"> <div class="col-md-10"> <div class="col-md-1"> File JPG '+ count +' </div> <div class="col-md-3"> <input name="image[]" type="file" class="form-control" /> </div> <div class="col-md-6"> <input type"text" name="deskripsi[]" class="form-control" placeholder="Deskripsi File" /> </div> </div> <a class="remove_item btn btn-danger" href="#" >Delete</a></div>');
        });
        
        jQuery(".remove_item").live('click', function (ev) {
            if (ev.type == 'click') {
                jQuery(this).parents(".records").fadeOut();
                    jQuery(this).parents(".records").remove();
            }
        });

        jQuery(".datepicker").live('click', function() {
            $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",yearRange: "1900:+10",showOn:'focus'}).focus();
        });
    }); 

    function sukses()  { 
        jQuery('#form-upload').resetForm();
        jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil diupload<button type="button" class="close" data-dismiss="alert">&times;</button></div>');    
        jQuery("#listview").load('<?php echo base_url('kategoridata/listfilejpg/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>');
        
    } 
</script>

<div class="col-md-12">
     <div id="msg"></div>                        
    <div class="block">
        <div class="head">
            <h2>Upload File JPG:</h2>
            <ul class="buttons">
                <li><a id="add_btn" name="add_btn" href="#"><span class="i-plus"></span> Add File</a></li>
                <li><a href="<?php echo base_url('kategoridata/viewfiles/'.$this->uri->segment(3)); ?>"><span class="i-cycle"></span> Kembali</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>
        </div>
        <form action="<?php echo site_url('kategoridata/uploadfilejpg'); ?>" method="post" enctype="multipart/form-data" id="form-upload">
        
        <input type="hidden" name="id_ktg" value="<?php echo $this->uri->segment(3); ?>">
        <input type="hidden" name="id_mf" value="<?php echo $this->uri->segment(4); ?>">

        <div class="content np">                                        
            <div class="controls-row">
                <div id="fill">
                    <div class="col-md-10">
                        <div class="col-md-1"> 
                            File JPG 1
                        </div>    
                        <div class="col-md-3"> 
                            <input name="image[]" type="file" class="form-control" />
                        </div>    
                        <div class="col-md-6">
                            <input type"text" name="deskripsi[]" class="form-control" placeholder="Deskripsi File" />
                        </div>
                    </div>       
                </div>

            </div>                                                                           
        </div>

        <div class="footer">
            <div class="side fr">
                <button type="submit" name="submit" id="submit-button" value="upload" class="btn btn-primary"> Simpan</button>
            </div>
        </div>
        
        </form>
        <div id="output"></div> 
    </div>
 
</div>

<div id="listview"></div>
