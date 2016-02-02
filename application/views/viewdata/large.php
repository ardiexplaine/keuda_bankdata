<div id="large">
	<div class="toolbar">
	    <div class="side fl">Hasil pencarian dengan kata kunci: <b><?php echo $_POST['keyword'];?></b></div>
	    <div class="side fr">Menampilkan <?php echo count($tampil->result());?> Kata yang cocok</div>
	</div>
	<div class="content gallery">
		<?php foreach($tampil->result() as $row) :?>
		<a class="fancybox" title="<?php echo $row->deskripsi; ?>" rel="group" href="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>">
		<img src="<?php echo base_url('asset/fileupload/img/'.$row->nfile); ?>" height="115" width="150" class="img-thumbnail"/></a>
		<?php endforeach ?>
	</div>
</div>