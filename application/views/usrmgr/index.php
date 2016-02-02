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
    <h4>Master: <span class="text-danger">Pengaturan Pengguna</span></h4>
    <?php echo $this->session->flashdata('message');?>                             
    <div class="block">
        
        <div class="head">
            <h2>Master Pengaturan Pengguna</h2>

            <ul class="buttons">
                <li><a href="<?php echo base_url('usrmgr/create'); ?>"><span class="i-cycle"></span> Tambah Data</a></li>
                <li><a href="#" class="block_toggle"><span class="i-arrow-down-3"></span></a></li>
                <li><a href="#" class="block_remove"><span class="i-cancel-2"></span></a></li>
            </ul>                                        
        </div>
        <div class="content np">
            
            <table cellpadding="0" cellspacing="0" width="100%" id="allIncExample">
                <thead>
                    <tr>                                    
                        <th width="5%">NO</th>
                        <th width="15%">Nama Lengkap</th>
                        <th width="10%">Username</th>
                        <th width="30%">Direktorat</th>
                        <th width="20%">Bagian</th>
                        <th width="10%">Status</th>                       
                        <th width="30%">Action</th>                                    
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($tampil->result() as $row) : ?>
                    <tr>                                    
                        <td><?php echo $no++; ?></td>                      
                        <td><?php echo $row->nama_lengkap; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo $row->nama_dir; ?></td>
                        <td><?php echo $row->nama_bagian; ?></td>
                        <td><?php if($row->status=='1') {echo 'admin';}else{echo 'user';} ?></td>
                        <td>
                            <a href="<?php echo base_url('usrmgr/edit/'.$row->id_session); ?>" class="btn btn-xs btn-primary edit">Edit</a>
                            <a href="<?php echo base_url('usrmgr/delete/'.$row->id_session); ?>" onclick="return deletechecked();" class="btn btn-xs btn-danger remove">Delete</a> 
                        </td>                               
                    </tr>
                <?php endforeach ?>                              
                </tbody>
            </table>                                        
            
        </div>

    </div>
    
</div>