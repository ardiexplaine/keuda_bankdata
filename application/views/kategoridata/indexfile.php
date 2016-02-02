<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
// Sebelum DOM dieksekusi
jQuery(document).ready(function() {   
    
    $('.terima').click(function() { // catch the form's submit event
        $.ajax({ // create an AJAX call...
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr("href"), // the file to call
            success: function(response) { // on success..
                jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil diperbahrui<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                location.reload();
            }
        });
        return false; // cancel original event to prevent form submitting
    });

    $('.hapus').click(function() { // catch the form's submit event
        $.ajax({ // create an AJAX call...
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr("href"), // the file to call
            success: function(response) { // on success..
                jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                location.reload();
            }
        });
        return false; // cancel original event to prevent form submitting
    });

 });
</script>
<div class="row">
    
    <div class="col-md-12">
        <h4><?php echo isset($sub_title) ? $sub_title : $_SESSION['bagian'];?> : <span class="text-danger"><?php echo isset($pagetitle) ? $pagetitle : '';?></span></h4>
        <?php echo $this->session->flashdata('message');?>   
        <form action="<?php //echo $action_search; ?>" method="get"/>
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
                <ul class="buttons">
                    <li><a href="<?php echo site_url(); ?>kategoridata"><span class="i-cycle"></span> Kembali</a></li>
                </ul>
            </div>
            <div class="content np">

                <table cellpadding="0" cellspacing="0" width="100%" class="list"> 
                    <tr>
                        <th>NO</th>
                        <th>Tanggal Data</th>
                        <th>Deskripsi File</th>
                        <th>Nama File + Tanggal Upload</th>
                        <th>Di Upload</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>                                           
                    <?php $no='1'; foreach ($tampil->result() as $row) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo Tanggal::formatindo($row->tgl_data); ?></td>
                        <td><i><?php echo $row->deskripsi; ?></i></td>
                        <td>
                             <a href="<?php echo base_url('kategoridata/getfile/'.$row->id_mf); ?>" class="list-group-item"><img src="<?php echo $this->config->item("btheme"); ?>icon/icon<?php echo $row->jenisfile; ?>.png" /> <?php echo $row->nama_file; ?></a>
                        </td>
                        <td><?php echo $row->deo_id; ?></td>
                        <td><?php if($row->status=='1') {
                            echo '<span class="label label-info">Menunggu</span>';                       
                        }else {
                            echo '<span class="label label-success">Diterima</span>';
                        } ?>
                        </td>
                        <?php if($_SESSION['level']=="admin"){ ?>
                        <td>
                            <?php if($row->status=='1') { ?>
                            <a href="<?php echo base_url('kategoridata/approvefile/'.$row->id_mf); ?>" class="terima btn btn-info"> <span class="glyphicon glyphicon-ok"></span></a>
                            <?php } ?>
                            <a href="<?php echo base_url('kategoridata/uploadfile/'.$row->id_ktg.'/'.$row->id_mf); ?>" class="btn btn-primary"> <span class="glyphicon glyphicon-picture"></span></a> 
                            <a href="<?php echo base_url('kategoridata/deletedata/'.$row->id_mf.'/'.$row->id_data); ?>" class="hapus btn btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
                        </td> 
                        <?php } ?>
                        
                        <?php if($_SESSION['level']=="user" AND $row->status=='1'){ ?>
                        <td>
                            <a href="<?php echo base_url('kategoridata/deletedata/'.$row->id_mf.'/'.$row->id_data); ?>" class="hapus btn btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
                        </td> 
                        <?php } ?>

                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        
    </div>
        
</div>
