<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel=galeri]").fancybox({
            'transitionIn'      : 'elastic',
            'transitionOut'     : 'elastic',
            'overlayColor'      : '#000',
            'titlePosition'     : 'over',
            'overlayOpacity'    : 0.4
        });
    });

     jQuery(document).ready(function() {

        $('#form-update').submit(function() { // catch the form's submit event
            $.ajax({ // create an AJAX call...
                data: $(this).serialize(), // get the form data
                type: $(this).attr('method'), // GET or POST
                url: $(this).attr('action'), // the file to call
                success: function(response) { // on success..
                    //$('#output').html(response); // update the DIV
                    jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil diupdate<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                }
            });
            return false; // cancel original event to prevent form submitting
        });

        $('.delete').click(function() { // catch the form's submit event
            $.ajax({ // create an AJAX call...
                data: $(this).serialize(), // get the form data
                type: $(this).attr('method'), // GET or POST
                url: $(this).attr("href"), // the file to call
                success: function(response) { // on success..
                    //$('#output').html(response); // update the DIV
                    jQuery("#listview").load('<?php echo base_url('kategoridata/listfilejpg/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>');
                    jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                }
            });
            return false; // cancel original event to prevent form submitting
        });
                
    });



        
        $(".fancybox").fancybox({
          openEffect    : 'none',
          closeEffect   : 'none',
          'titlePosition'   : 'over',
            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
      });
</script> 
<div class="col-md-12">
    
    <div class="block">
        <div class="head">
            <h2>List File Jpg</h2>
        </div>
        
        <form action="<?php echo base_url(); ?>kategoridata/actinUpdateDeskJpg" method="POST" id="form-update">
        <div class="content messages npr">
            <div class="scroll" style="height: 250px;">
                <?php
                $i=1;
                $query = $this->db->get_where('pptx_jpg',array('id_ktg' =>$this->uri->segment(3),'id_mf'=>$this->uri->segment(4)));
                foreach ($query->result() as $row) : ?>

                <div class="item">
                    <div class="img">
                    <a class="fancybox" title="<?php echo $row->deskripsi; ?>" href="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>"><img src="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>" height="120" width="120" class="img-thumbnail"/></a>
                    </div>
                    <div class="info">
                        <a href="#" class="name"><?php echo $row->deo_id; ?></a> <span class="muted"><?php echo Tanggal::formatindo($row->deo_tg); ?></span>  <a href="<?php echo base_url('kategoridata/deletefile/'.$row->id_img); ?>" class="delete">Hapus</a>
                        <div class="text">
                            <input type="hidden" name="id_img[<?php echo $i;?>]" value="<?php echo $row->id_img; ?>">
                            <input type="text" name="deskripsi[<?php echo $i;?>]" value="<?php echo $row->deskripsi; ?>" size="50">                                                                                                     
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach ?>

            </div>
        </div>
        <div class="footer">
            <div class="side fl">
                <button type="submit" name="submit" id="submit-button" value="submit" class="btn btn-primary"> Simpan</button>
            </div>
        </div>
        </form>
    </div>
                                    
</div>
