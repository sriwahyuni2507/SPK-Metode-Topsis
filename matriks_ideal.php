<?php
include ("konfig/koneksi.php");
$s=mysql_query("select * from kriteria");
$h=mysql_num_rows($s);




?>

<div class="box-header">
    <h3 class="box-title " >Matriks Ideal Positif (A<sup>+</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
</tr>
<tr>
<?php
$hk=mysql_query("select nama_kriteria from kriteria");
while($dhk=mysql_fetch_assoc($hk)){

	echo"<th>$dhk[nama_kriteria]</th>";
}
?>
</tr>
<tr>
<?php

for($n=1;$n<=$h;$n++){

	echo"<th>y<sub>$n</sub><sup>+</sup></th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from kriteria");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){

	
		
		$idalt=$da['id_kriteria'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");
		
		$c=0;
		$ymax=array();
		while($dn=mysql_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysql_query("select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
			while($dkuadrat=mysql_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$jml_alternatif=mysql_query("select * from alternatif");
			$jml_a=mysql_num_rows($jml_alternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
			while($dbobot=mysql_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk'");
			$nbot=mysql_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,4);

				$ymax[$c]=$v;
				$c++;
		}
		
		if($nbot['sifat']=='benefit'){
		echo "<td>".max($ymax)."</td>";
		}else{
		echo "<td>".min($ymax)."</td>";
		}
		
		

}
echo "</tr>";
?>

</tbody>
</table>

<!-- tabel min -->

<div class="box-header">
    <h3 class="box-title " >Matriks Ideal Negatif	(A<sup>-</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
</tr>
<tr>
<?php
$hk=mysql_query("select nama_kriteria from kriteria");
while($dhk=mysql_fetch_assoc($hk)){

	echo"<th>$dhk[nama_kriteria]</th>";
}
?>
</tr>
<tr>
<?php

for($n=1;$n<=$h;$n++){

	echo"<th>y<sub>$n</sub><sup>-</sup></th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from kriteria");
echo "<tr>";
while($da=mysql_fetch_assoc($a)){

	
		
		$idalt=$da['id_kriteria'];
	
		//ambil nilai
			
			$n=mysql_query("select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");
		
		$c=0;
		$ymax=array();
		while($dn=mysql_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysql_query("select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dkuadrat=mysql_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$jml_alternatif=mysql_query("select * from alternatif");
			$jml_a=mysql_num_rows($jml_alternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysql_query("select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dbobot=mysql_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysql_query("select * from kriteria where id_kriteria='$idk'");
			$nbot=mysql_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,4);

				$ymax[$c]=$v;
				$c++;
		}
		
		if($nbot['sifat']=='cost'){
		echo "<td>".max($ymax)."</td>";
		}else{
		echo "<td>".min($ymax)."</td>";
		}
		

}
echo "</tr>";
?>

</tbody>
</table>
