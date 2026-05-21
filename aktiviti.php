<?php include 'header.php'; ?> 
<html>
<!-- PANGGIL MENU -->
<div id="menu">
<?php include 'menu.php'; ?>
</div>
<!-- CETAKAN -->
<div id="printarea">
<!-- PANGGIL ISI -->
<div id="isi">
<h2><u>SENARAI AKTIVITI</u></h2>
<table border=1 >
<!-- PAPAR MAKLUMAT -->
<tr>
<th>BIL</th>
<th>KETERANGAN AKTIVITI</th> 
<th>TARIKH</th>
<th id="sembunyi ">TINDAKAN </th>
</tr>
<?php 
$no=1;
$data1=mysqli_query($con,"
SELECT * FROM aktiviti
ORDER BY tarikhAktiviti DESC"); 
while ($info1=mysqli_fetch_array($data1)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['keterangan']; ?></td> 
<td><?php echo $info1['tarikhAktiviti']; ?></td> 
<td id="sembunyi">
<!-- PAPAR PAUTAN -->
<a href="aktiviti_edit.php?id= 
<?php echo $info1 ['kod']; ?>"
onclick="return confirm('Edit Rekod?')">EDIT</a> |
<a href="aktiviti_hapus.php?id=
<?php echo $info1['kod']; ?>"
onclick="return confirm('Hapus Rekod?')">HAPUS</a></td>
</tr>
<?php $no++; } ?>
<tr>
<td colspan="4" align="center"> 
<font style='font-size:10px'>
* Senarai Tamat *<br />Jumlah Aktiviti: 
<?php echo $no-1; ?>
</font>
<p><button onclick="javascript:window.print()"> 
CETAK</button>
<a href="aktiviti_tambah.php"><button> 
+ AKTIVITI</button></a></p>
</td></tr>
</table>
</div></div> 
</html>