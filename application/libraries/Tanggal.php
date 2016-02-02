<?php
class Tanggal {

  public static function formatindo($date) {
    $str = explode('-', $date);

    $bulan = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Aguatus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember'
      );

    return $str[2] . " " . $bulan[$str[1]] . " " . $str[0] ;
  }

  function combotgl($awal, $akhir, $var, $terpilih){
    echo "<select class='span1' name=$var>";
    for ($i=$awal; $i<=$akhir; $i++){
      $lebar=strlen($i);
      switch($lebar){
        case 1:
        {
          $g="0".$i;
          break;     
        }
        case 2:
        {
          $g=$i;
          break;     
        }      
      }  
      if ($i==$terpilih)
        echo "<option value=$g selected>$g</option>";
      else
        echo "<option value=$g>$g</option>";
    }
    echo "</select> ";
  }

  function combobln($awal, $akhir, $var, $terpilih){
    echo "<select class='span1' name=$var>";
    for ($bln=$awal; $bln<=$akhir; $bln++){
      $lebar=strlen($bln);
      switch($lebar){
        case 1:
        {
          $b="0".$bln;
          break;     
        }
        case 2:
        {
          $b=$bln;
          break;     
        }      
      }  
        if ($bln==$terpilih)
           echo "<option value=$b selected>$b</option>";
        else
          echo "<option value=$b>$b</option>";
    }
    echo "</select> ";
  }

  function combothn($awal, $akhir, $var, $terpilih){
    echo "<select class='span1' name=$var>";
    for ($i=$awal; $i<=$akhir; $i++){
      if ($i==$terpilih)
        echo "<option value=$i selected>$i</option>";
      else
        echo "<option value=$i>$i</option>";
    }
    echo "</select> ";
  }

  function combonamabln($awal, $akhir, $var, $terpilih=''){
    $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                        "Juni", "Juli", "Agustus", "September", 
                        "Oktober", "November", "Desember");
    echo "<select class='span2' name=$var>";

    for ($bln=$awal; $bln<=$akhir; $bln++){
        if ($bln==$terpilih)
           echo "<option value=$bln selected>$nama_bln[$bln]</option>";
        else
          echo "<option value=$bln>$nama_bln[$bln]</option>";
    }
    echo "</select> ";
  }
}

?>