<div class="row">
    
    <div class="col-md-12">   
        <h4><?php //echo $sub_title; ?></h4>
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
                <div class="side fl">
                    <a href="<?php echo site_url();?>kategoridata/formfiles" class="btn btn-primary"><i class="i-file-3"></i> Kirim Files</a>
                </div>
                <?php if($_SESSION['level']=="user"){ ?>
                <div class="side fr side_text">
                    <a href="<?php echo site_url();?>kategoridata/create" class="btn btn-primary">Tambahkan Kategori Data</a>
                </div>
                <?php } ?>
            </div>
            <div class="content np">
                <table cellpadding="0" cellspacing="0" width="100%" class="list">                                            
                    <?php $no =1; foreach ($tampil->result() as $row) : ?>
                    <tr>
                        <td width="15"><?php echo $no++ ?></td>
                        <td><a href="<?php echo site_url('kategoridata/viewfiles/'.$row->id_ktg) ;?>"><?php echo $row->nama_kategoridata ?></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        
    </div>
        
</div>
