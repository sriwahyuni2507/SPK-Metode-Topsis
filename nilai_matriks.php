<?php
include ("konfig/koneksi.php");
$s=mysql_query("select * from kriteria");
$h=mysql_num_rows($s);


?>

<div class="box-header">
    <h3 class="box-title " >Nilai Matriks</h3>
</div>
<div class="table table-bordered table-responsive">
<table class="table table-bordered table-responsive">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th colspan="<?php echo $h; ?>">Kriteria</th>
</tr>
<tr>
<?php
for($n=1;$n<=$h;$n++){
	echo"<th>C{$n}</th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysql_query("select * from alternatif");


 
while($da=mysql_fetch_assoc($a)){
	echo "<tr>
		<td>".(++$i)."</td>
		<td>".$da['nm_alternatif']."</td>";
		$idalt=$da['id_alternatif'];
		//ambil nilai
			$n=mysql_query("select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");
			
		while($dn=mysql_fetch_assoc($n)){
		
			echo "<td align='center'>$dn[nilai]</td>";
		}
		echo "</tr>\n";

}

?>

</tbody>
</table>
</div>