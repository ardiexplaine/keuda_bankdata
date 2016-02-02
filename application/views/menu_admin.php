<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$query = 'Select a.id_bag,a.nama_bagian,COUNT(c.status) as jml from bagian a left join masterdata b on a.id_bag=b.id_bag
left join masterfile c on b.id_data=c.id_data
WHERE c.status=1 OR c.status IS NULL
GROUP BY a.id_bag,a.nama_bagian'; 
$menu = $this->db->query($query);
?>

<ul class="navigation">
	<li><a href="<?php echo site_url() ;?>">HOME</a></li>
    <?php foreach($menu->result() as $row) : ?>
    	<?php if($this->session->userdata('bagian_id')==$row->id_bag) { ?>
    		<li class="active"><a href="<?php echo site_url('ktgadm/view/'.$row->id_bag) ;?>"><?php echo $row->nama_bagian; ?> <?php if($row->jml>0) echo '<span class="label label-danger fr">'.$row->jml.'</span>'; ?></a></li>
    	<?php } else { ?>
    		<li><a href="<?php echo site_url('ktgadm/view/'.$row->id_bag) ;?>"><?php echo $row->nama_bagian; ?> <?php if($row->jml>0) echo '<span class="label label-danger fr">'.$row->jml.'</span>'; ?></a></li>                                              
    	<?php } ?>
    <?php endforeach ?>
    <li><a href="<?php echo site_url('profile/gantipassword') ;?>"><span class="i-locked text-info"></span> Ganti Password</a></li>  
</ul>
