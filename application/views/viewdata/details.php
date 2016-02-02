<div id="details">
<div class="toolbar">
    <div class="side fl">Hasil pencarian dengan kata kunci: <b><?php echo $_POST['keyword'];?></b></div>
    <div class="side fr">Menampilkan <?php echo count($tampil->result());?> Kata yang cocok</div>
</div>
<div class="content messages npr">
    <div class="scroll" style="height: 270px;">
        <?php foreach ($tampil->result() as $row) : ?>

        <div class="item">
            <div class="img">
                <a class="fancybox" title="<?php echo $row->deskripsi; ?>" href="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>"><img src="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>" height="115" width="150" class="img-thumbnail"/></a> 
            </div>
            <div class="info">
                <a href="#" class="name"><?php echo str_replace($_POST['keyword'],"<span class='label label-info'>".$_POST['keyword']."<span>",$row->deskripsi); ?></a> <span class="muted"><?php //echo Tanggal::formatindo($row->deo_tg); ?></span>
                <div class="text">
                    <div class="text">
                        <b>Direktorat :</b> <?php echo $row->nama_dir; ?> <br/>
                        <b>Bagian :</b> <?php echo $row->nama_bagian; ?> <br/>
                        <b>Kategori :</b> <?php echo $row->nama_kategoridata; ?> <br/>
                        <b>Tgl Data :</b> <?php echo Tanggal::formatindo($row->tgl_data); ?> <br/>
                        <b>Deskripsi :</b> <?php echo $row->desk; ?>
                        <p class="muted">Original File : <a href="#"></b> <?php echo $row->nama_file; ?></a></p>                                                        
                    </div>
                                                                                                                                
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</div>
</div>
