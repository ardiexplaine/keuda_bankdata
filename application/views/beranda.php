<script type="text/javascript"> 
    $(function() {
        $('#loading').ajaxStart(function(){
            $(this).fadeIn();
                }).ajaxStop(function(){
            $(this).fadeOut();
        });
    });

   

    jQuery(document).ready(function() {

        $('#form-search').submit(function() { // catch the form's submit event
            $.ajax({ // create an AJAX call...
                data: $(this).serialize(), // get the form data
                type: $(this).attr('method'), // GET or POST
                url: $(this).attr('action'), // the file to call
                success: function(response) { // on success..
                    $('#output').html(response); // update the DIV
                    $("#details").hide();
                }
            });
            return false; // cancel original event to prevent form submitting
        });

        $("#hide").click(function(){
            $("#large").hide();
             $("#details").show();
        });
        $("#show").click(function(){
            $("#details").hide();
             $("#large").show();
        });
            	
    }); 

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
          openEffect    : 'none',
          closeEffect   : 'none',
          'titlePosition'   : 'over',
            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    });

</script> 

    
    <div class="col-md-12">   
        <form action="<?php echo base_url(); ?>beranda/search" method="POST" id="form-search"/>
        <div class="block">
            <div class="block_wrapper">
                <div class="input-group ">
                    <input type="text" name="keyword" class="form-control" placeholder="Masukan Kata kunci pencarian data..."/>
                    <div class="input-group-btn">
                        <button class="btn btn-default" id="submit-button" type="submit">Cari Data</button>
                    </div>
                </div>
                <?php if($_SESSION['level']=="admin"){ ?>
                <div class="input-group col-md-4">
                    <select name="bagian" class="form-control">
                        <option value="0">- Pilih Dari Semua Bagian</option>
                        <?php  $query = $this->db->get('bagian');
                        foreach($query->result() as $row) :?>
                            <option value="<?php echo $row->id_bag;?>"><?php echo $row->nama_bagian;?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php }elseif($_SESSION['level']=="user"){ ?>
                    <input type="hidden" name="bagian" value="<?php echo $this->session->id_bag ?>">
                <?php } ?>                                         
            </div>
        </div>
        </form>

        <div class="block">
            <div class="head">
                <h2>Pencarian Data</h2>
                <ul class="buttons">
	                <li><a class="lar" id="show" name="add_btn" href="#"><span class="i-plus"></span> Large Icon</a></li>
	                <li><a class="det" id="hide" href="#"><span class="i-arrow-down-3"></span> Detail</a></li>
	            </ul>
            </div>
            
            <div id="output"> </div>
        </div>
        
    </div>

