<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="user">
    <div class="info">
        <div class="name">
            <a href="<?php echo base_url('beranda');?>"><?php echo $_SESSION['nama_lengkap']; ?></a>
        </div>
        <div class="buttons">
            <?php echo $_SESSION['bagian']; ?>
        </div>
    </div>
</div>

<?php
if($_SESSION['level']=="admin"){
    $this->load->view('menu_admin');
}else{
    $this->load->view('menu_user');
}
?>