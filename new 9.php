<!DOCTYPE html>
<html>
	<head>
		<title>Pemilihan Presiden 2019</title>
		<!--<link href="style.css" rel="stylesheet">-->
	</head>
	
	<body>
		<form action="tambah_data.php" method="post">
			<table border="0" align="center" style="margin-top: 50px" width="center">
				
				<tr>
					<td width="200px">Provinsi</td>
					<td>:</td>
					<td><select class="form-control" name="provinsi" id="provinsi" style="width: 200px">
        	    			<option value="">--- Pilih Provinsi	 ---</option>

	                		<!-- looping data Fakultas -->
    	            		<?php
        	        			include 'koneksi.php';
	                			$sel_provinsi="select * from provinsi";
    	            			$q=mysql_query($sel_provinsi);
        	        			while($data_provinsi=mysql_fetch_array($q)){
            	    		?>

	            	    	<option value="<?php echo $data_provinsi["id_provinsi"] ?>"><?php echo $data_provinsi["nama_provinsi"] ?></option>

	                		<?php
    	              			}
        	        		?>
            			</select>
            		</td>
				</tr>
				<tr>
					<td width="200px">Kabupaten</td>
					<td>:</td>
					<td><select class="form-control" name="kabupaten" id="kabupaten" style="width: 200px">
            				<option value="">--- Pilih Kabupaten ---</option>
            				<!-- hasil data dari kabupaten.php akan ditampilkan disini -->
            			</select>
            		</td>
				</tr>
				<tr>
					<td width="200px">Kecamatan</td>
					<td>:</td>
					<td><select class="form-control" name="kecamatan" id="kecamatan" style="width: 200px">
            				<option value="">--- Pilih Kecamatan ---</option>
            				<!-- hasil data dari kecamatan.php akan ditampilkan disini -->
            			</select>
            		</td>
				</tr>
				<tr>
					<td width="200px">Kelurahan</td>
					<td>:</td>
					<td><select class="form-control" name="kelurahan" id="kelurahan" style="width: 200px">
            				<option value="">--- Pilih Kelurahan ---</option>
            				<!-- hasil data dari jurusan.php akan ditampilkan disini -->
            			</select>
            		</td>
				</tr>
				<tr>
					<td width="200px">TPS</td>
					<td>:</td>
					<td><input type="text" id="tps" name="tps" style="width: 100px" /></td>
				</tr>
				<tr>
					<td width="200px">Suara Nomor Urut 1</td>
					<td>:</td>
					<td><input type="text" id="urut_satu" name="urut_satu" style="width: 100px" /></td>
				</tr>
				<tr>
					<td width="200px">Suara Nomor Urut 2</td>
					<td>:</td>
					<td><input type="text" id="urut_dua" name="urut_dua" style="width: 100px" /></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>
					<td></td>
					<td colspan="2"><input type="submit" name="simpan" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
		
		<hr>
		
		<table border="1" align="center" style="margin-top: 20px" width="700px">
			<?php
				include 'koneksi.php';
				$query=mysql_query("SELECT * FROM simpan
									JOIN provinsi ON simpan.provinsi = provinsi.id_provinsi
									JOIN kabupaten ON simpan.kabupaten = kabupaten.id_kabupaten
									JOIN kecamatan ON simpan.kecamatan = kecamatan.id_kecamatan
									JOIN kelurahan ON simpan.kelurahan = kelurahan.id_kelurahan") or die (mysql_error());
			?>
			<tr align="center">
				<td width="250px">Provinsi</td>
				<td width="250px">Kabupaten</td>
				<td width="250px">Kecamatan</td>
				<td width="350px">Kelurahan</td>
				<td width="150px">TPS</td>
				<td width="100px">Urut 1</td>
				<td width="100px">Urut 2</td>
			</tr>
			
			<?php
				while ($tampil=mysql_fetch_array($query))
				{
			?>
			
			<tr>				
				<td><?php echo $tampil['nama_provinsi']; ?></td>
				<td><?php echo $tampil['nama_kabupaten']; ?></td>
				<td><?php echo $tampil['nama_kecamatan']; ?></td>
				<td><?php echo $tampil['nama_kelurahan']; ?></td>
				<td><?php echo $tampil['tps']; ?></td>
				<td><?php echo $tampil['urut_satu']; ?></td>
				<td><?php echo $tampil['urut_dua']; ?></td>
			</tr>
			<?php
				}
			?>
		</table>

		<!-- JavaScript -->
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>

		<script>
		    $("#provinsi").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_provinsi = $("#provinsi").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "kabupaten.php",
            		data: "provinsi="+id_provinsi,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Tidak ada data Kabupaten');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#kabupaten").html(msg);
                		}
            		}
        		});
    		});
			
			$("#kabupaten").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_kabupaten = $("#kabupaten").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "kecamatan.php",
            		data: "kabupaten="+id_kabupaten,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Tidak ada data Kecamatan');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#kecamatan").html(msg);
                		}
            		}
        		});
    		});
			
			$("#kecamatan").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_kecamatan = $("#kecamatan").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "kelurahan.php",
            		data: "kecamatan="+id_kecamatan,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Tidak ada data Kelurahan');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#kelurahan").html(msg);
                		}
            		}
        		});
    		});
		</script>
	</body>
</html>