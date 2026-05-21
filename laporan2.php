<?php
include 'header.php';
$jumpa=0;
?>
<html>
<!-- PANGGIL MENU -->
<div id="menu">
<?php include 'menu.php'; ?>
</div>
<!-- PANGGIL ISI -->
<div id="isi">
<label id="sembunyi">SENARAI AKTIVITI:</label>
<form method="POST" name="search" id="sembunyi">
<select name="aktiviti">
<?php
$senaraiAktiviti=mysqli_query($con,"select * from aktiviti 
ORDER BY tarikhAktiviti DESC");
echo "<option>--PILIH--</option>";
while ($namaAktiviti=mysqli_fetch_array($senaraiAktiviti))
{
echo "<option value=
'$namaAktiviti[kod]'>$namaAktiviti[keterangan]</option>";
}
?>
</select>
<button type="submit" name="cari">PILIH</button>
</form>
<?php
if (isset($_POST['aktiviti'])) {
$jumpa = $_POST['aktiviti'];
#PAPAR KETERANGAN AKTIVITI
$keterangan=mysqli_query($con,"select * FROM aktiviti 
WHERE kod='$jumpa'");
$detail=mysqli_fetch_array($keterangan)
?>
<div id='printarea'>
<h2>SENARAI AHLI TIDAK HADIR AKTIVITI
<?php echo $detail['keterangan'];?> <br>
PADA <?php echo $detail['tarikhAktiviti'];?>
</h2>
<table border=1 >
<tr>
<th>BIL</th>
<th>NAMA</th>
<th>JANTINA</th>
<th>NOMBOR KP</th>
<th>NOMBOR HP</th>
</tr>
<?php
$no=1;
$data1=mysqli_query($con,"
SELECT * FROM peserta AS t1
INNER JOIN hp AS t3
ON t1.nomHp=t3.nomHp
WHERE t1.nomKp NOT IN
    (SELECT t2.nomKp
    FROM hadir AS t2 WHERE t2.kod = '$jumpa')
AND t1.aras='PENGGUNA'
ORDER BY t3.nama ASC");

while ($info1=mysqli_fetch_array($data1)){
?>
<tr>
<td><?php echo $no;?></td>
<td><?php echo $info1['nama'];?></td>
<td><?php echo $info1['jantina'];?></td>
<td><?php echo $info1['nomKp'];?></td>
<td><?php echo $info1['nomHp'];?></td>
</tr>
<?php $no++; } ?>
<tr>
<td colspan='6' align='center'>
<font style='font-size:10px'>
* Jumlah Tidak Hadir:<?php echo $no -1;?>
<!-- KIRA BILANGAN PESERTA -->
<?php
$kira=mysqli_query($con,"SELECT COUNT(*) FROM peserta 
WHERE aras='PENGGUNA'");
$detail1=mysqli_fetch_array($kira);
#LAKSANA ARAHAN SQL
echo "/".$detail1['COUNT(*)'];
?>
</font><br>
<button onclick='javascript:window.print()'>CETAK</button>
</td>
</tr>
</table>
<?php
}else{
echo "Maaf, Tiada Rekod";
  }
?>
</div>
</div>
</html>