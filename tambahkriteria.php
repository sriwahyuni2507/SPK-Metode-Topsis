<?php

include ("konfig/koneksi.php");


$query = "SELECT max(id_kriteria) as idMaks FROM kriteria";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
    <h3 class="box-title">Tambah Kriteria</h3>
</div>


 <form action="" method="POST">
 
 <input type="text" name="id_kriteria" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
 <br />
 <input type="text" name="nama_kriteria" class="form-control"  placeholder="Nama Kriteria" >
 <br />
 <input type="text" name="bobot" class="form-control" placeholder="Bobot">
 <br />
 <input type="text" name="poin1" class="form-control" placeholder="Poin 1">
 <br />
 <input type="text" name="poin2" class="form-control" placeholder="Poin 2">
 <br />
 <input type="text" name="poin3" class="form-control" placeholder="Poin 3">
 <br />
 <input type="text" name="poin4" class="form-control" placeholder="Poin 4">
 <br />
 <input type="text" name="poin5" class="form-control" placeholder="Poin 5">
 <br />
 <select name="sifat" class="form-control">
	<option value="benefit">Benefit</option>
	<option value="cost">Cost</option>
 </select>
 <br />
 <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
 <br />
 </form>

<?php
if(isset($_POST['simpan'])){
	$s=mysql_query("insert into kriteria (id_kriteria,nama_kriteria,bobot,poin1,poin2,poin3,poin4,poin5,sifat) values ('$_POST[id_kriteria]','$_POST[nama_kriteria]','$_POST[bobot]','$_POST[poin1]','$_POST[poin2]','$_POST[poin3]','$_POST[poin4]','$_POST[poin5]','$_POST[sifat]')");
	
	if($s){
		echo "<script>alert('Disimpan'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>

