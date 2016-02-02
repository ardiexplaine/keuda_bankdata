<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    function deletechecked() {
        if(confirm("Apakah anda yakin akan menghapus data ini!!!"))
        { return true; }
        else
        { return false; } 
    }
</script>
<div class="col-md-12">
    <?php echo $this->session->flashdata('message');?>                             
    <div class="block">
        
        <div class="head">
            <h2>Master Bagian</h2>
            <ul class="buttons">
                <li><a href="<?php echo base_url('bagian/create'); ?>"><span class="i-cycle"></span> Tambah Data</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>                                        
        </div>
        <div class="content np">
            
            <table cellpadding="0" cellspacing="0" width="100%" id="allIncExample">
                <thead>
                    <tr>                                    
                        <th width="5%">NO</th>
                        <th width="50%">Nama Direktorat</th>
                        <th width="25%">Nama Bagian</th>                      
                        <th width="20%">Action</th>                                    
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tampil->result() as $row) : ?>
                    <tr>                                    
                        <td><?php echo $row->id_bag; ?></td>                      
                        <td><?php echo $row->nama_dir; ?></td>
                        <td><?php echo $row->nama_bagian; ?></td>
                        <td>
                            <a href="<?php echo base_url('bagian/edit/'.$row->id_bag); ?>" class="btn btn-xs btn-primary edit">Edit</a>
                            <a href="<?php echo base_url('bagian/delete/'.$row->id_bag); ?>" onclick="return deletechecked();" class="btn btn-xs btn-danger remove">Delete</a> 
                        </td>                               
                    </tr>
                <?php endforeach ?>                              
                </tbody>
            </table>                                        
            
        </div>

    </div>
    
</div>