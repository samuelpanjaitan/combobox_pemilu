<?php
    include "koneksi.php";
   
    $sel_kecamatan="select * from kelurahan where id_kecamatan='".$_POST["kecamatan"]."'";
    $q=mysql_query($sel_kecamatan);
    while($data_kecamatan=mysql_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data_kecamatan["id_kelurahan"] ?>"><?php echo $data_kecamatan["nama_kelurahan"] ?></option><br>
   
    <?php
    }
    ?>