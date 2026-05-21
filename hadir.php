<?php
#SAMBUNG KE DATABASE 
require 'database.php'; 
$KP=$_SESSION['user']; 
#TERIMA NOMKP YANG DIPOST 
if (isset($_POST['hadir'])) {
$NOMKP = $_POST['nomkp'];
$IDAC = $_POST['kod'];
#MASUK REKOD KE DLM TABLE
mysqli_query($con, "INSERT INTO hadir 
(nomKp, masa, tarikh, kod)
VALUES ('$NOMKP', '$masaKini', '$tarikhKini', '$IDAC')") 
or die(mysqli_error());
echo "<script>alert('Kehadiran Telah Direkodkan'); 
</script>";
}
?>
<!-- HTML MULA -->
<html>
<div id="sembunyi ">
<?php
$query=mysqli_query($con,
"SELECT * FROM aktiviti WHERE tarikhAktiviti 
>='$tarikhKini'");
if (mysqli_num_rows($query) > 0) { 
$senarai=mysqli_fetch_array($query);
#PAPAR NOTIS TARIKH AKTIVITI SEMASA/AKAN DATANG 
echo strtoupper (
"<u>NOTIS PERINGATAN</u><br>
".$senarai['keterangan']."<br>
tarikh: ".$senarai['tarikhAktiviti']);
echo" <hr>"; 
#KIRA HARI
$date1=date_create($tarikhKini);
$date2=date_create($senarai ['tarikhAktiviti']); 
$diff=date_diff($date1, $date2); 
$totalday=$diff->format("%a");
#SEMAK JIKA BIL HARI=0, PAPAR BUTANG HADIR
if ($totalday==0){
#SEMAKAN KEHADIRAN SUDAH DIBUAT ATAU BELUM 
$semak2=mysqli_query($con, "SELECT * FROM hadir WHERE 
nomKp='$KP' AND tarikh='$tarikhKini '");
#JIKA BELUM PAPAR BUTANG SAYA HADIR
if (mysqli_num_rows($semak2)==0){
?>
<!-- PAPAR BUTANG HADIR -->
<form method="POST">
<h3>*Klik butang hadir untuk hadir aktiviti ini</h3>
<input type="text" name="nomkp"
value="<?php echo $KP; ?>" hidden>
<input type="text" name="kod"
value="<?php echo $senarai['kod']; ?>" hidden> 
<button name="hadir" type="submit">HADIR</button>
<hr>
</form>
<?php 
}else{
echo "<h3>Anda telah mendaftar diri hadir</h3>";
}
}else{
echo "Tiada aktiviti pada hari ini";
}
#JIKA TIADA AKTIVITI DARI TARIKH SEMASA DAN KE DEPAN 
}else{
echo "Tiada aktiviti buat masa ini";
}
?>
<!-- CETAKAN -->
<hr>
</div>
<div id="printarea">
<!-- PAPAR MAKLUMAT LOG KEHADIRAN-->
<h2><u>LOG KEHADIRAN</u></h2>
<table border=1 >
<tr>
<th>BIL</th>
<th>KETERANGAN AKTIVITI</th> 
<th>TARIKH</th>
<th>MASA</th>
</tr> 
<?php
$no=1;
$data1=mysqli_query($con," 
SELECT * FROM hadir AS t1 
INNER JOIN aktiviti AS t2
ON t1.kod=t2.kod WHERE t1.nomKp='$KP' 
ORDER BY t1.tarikh DESC");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1 ['keterangan']; ?></td> 
<td><?php echo $info1['tarikh']; ?></td> 
<td><?php echo $info1['masa']; ?></td> 
</tr>
<?php $no++; } ?>
<tr>
<td colspan="4" align="center"> 
<font style='font-size:10px'>
* Senarai Tamat *<br/>Jumlah Aktiviti: 
<?php echo $no-1; ?> </font> 
<p><button onclick="javascript:window.print()">
CETAK</button></p>
</td></tr>
</table>
</div>
</html>