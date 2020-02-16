<?php
    include "koneksi.php";
   
    $sel_kabupaten="select * from kecamatan where id_kabupaten='".$_POST["kabupaten"]."'";
    $q=mysql_query($sel_kabupaten);
    while($data_kabupaten=mysql_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data_kabupaten["id_kecamatan"] ?>"><?php echo $data_kabupaten["nama_kecamatan"] ?></option><br>
   
    <?php
    }
    ?>