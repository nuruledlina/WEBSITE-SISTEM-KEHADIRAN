<?php include 'header.php'; ?> 
<html>
<!-- PAPAR DI RUANGAN MENU -->
<div id="menu">
<h3>LOG MASUK</h3>
<form method="post" action="login_semak.php"> 
<label>Nom. Kad Pengenalan:</label>
<input type="text" name="user" placeholder="TAIP DI SINI" 
size="20%" minLength="12" maxLength='12'
onkeypress='return event.charCode>= 48 && event.charCode 
<= 57' required autofocus />
<br>
Password:<br>
<input type="password" name="pass"
placeholder="******" size="20%" minLength="6" 
maxLength="6" required /><br><br>
<button name="hantar" type="submit">SIGN IN</button> 
<button type="reset">RESET</button>
</form>
<br>
<h3>DAFTAR</h3>
<a href="signup.php"><button>SIGN UP</button><a> 
</div>
<!-- PAPAR DIRUANGAN ISI --> 
<div id="isi">
<h2><?php echo strtoupper ("SELAMAT DATANG KE 
".$namasys1); ?></h2>
<hr>
<?php 
$no=1;
$data1=mysqli_query($con, "SELECT * FROM aktiviti
WHERE tarikhAktiviti >='$tarikhKini' 
ORDER BY tarikhAktiviti ASC"); 
if(mysqli_num_rows($data1) > 0){
?>
<h2>JADUAL AKTIVITI DARI TARIKH 
<?php echo $tarikhKini; ?></h2> 
<table border=1 >
<!-- PAPAR MAKLUMAT -->
<tr>
<th>BIL</th>
<th>KETERANGAN AKTIVITI</b></th>
<th>TARIKH</th>
</tr> 
<?php
while ($info1=mysqli_fetch_array($data1)) {
?> 
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1 ['keterangan']; ?></td> 
<td><?php echo $info1 ['tarikhAktiviti']; ?></td> 
</tr>
<?php $no++; } ?>
</table>
<?php
}else{
echo "Maaf, Tiada aktiviti setakat ini";
}
?>
</html>