<?php
    include "koneksi.php";
   
    $sel_provinsi="select * from kabupaten where id_provinsi='".$_POST["provinsi"]."'";
    $q=mysql_query($sel_provinsi);
    while($data_provinsi=mysql_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data_provinsi["id_kabupaten"] ?>"><?php echo $data_provinsi["nama_kabupaten"] ?></option><br>
   
    <?php
    }
    ?>