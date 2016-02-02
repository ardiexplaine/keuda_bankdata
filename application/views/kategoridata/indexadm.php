<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    function deletechecked() {
        if(confirm("Apakah anda yakin akan menghapus data ini!!!"))
        { return true; }
        else
        { return false; } 
    }
</script>
<div class="row">
    
    <div class="col-md-12"> 
        <?php echo $this->session->flashdata('message');?>   
        <form action="<?php echo $action_search; ?>" method="get"/>
        <div class="block">
            <div class="block_wrapper">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Kata kunci pencarian data..."/>
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                    </div>
                </div>                                         
            </div>
        </div>
        </form>

        <div class="block">
            <div class="head">
                <h2>Additional services</h2>
                <div class="side fl">
                    
                </div>
                <div class="side fr side_text">
                    <a href="<?php echo site_url();?>ktgadm/create" class="btn btn-primary">Tambahkan Kategori Data</a>
                </div>
            </div>
            <div class="content np">
                <table cellpadding="0" cellspacing="0" width="100%" class="list">                                            
                    <?php $no =1; foreach ($tampil->result() as $row) : ?>
                    <tr>
                        <td width="15"><?php echo $no++ ?></td>
                        <td><a href="#"><?php echo $row->nama_bagian ?></a></td>
                        <td><a href="#"><?php echo $row->nama_kategoridata ?></a></td>
                        <td width="110">
                            <a href="<?php echo base_url('ktgadm/edit/'.$row->id_ktg); ?>" class="btn btn-xs btn-primary edit">Edit</a>
                            <a href="<?php echo base_url('ktgadm/delete/'.$row->id_ktg); ?>" onclick="return deletechecked();" class="btn btn-xs btn-danger remove">Delete</a> 
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        
    </div>
        
</div>
