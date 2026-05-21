<?php
include 'header.php';
#TERIMA NILAI YG DI POST
if (isset($_POST['hantar'])) { 
$data1 = $_POST['aktiviti']; 
$data2 = $_POST['tarikh']; 
#SEMAK TARIKH YANG SAMA
$semakan=mysqli_query($con, "SELECT * FROM aktiviti 
WHERE tarikhAktiviti='$data2'"); 
$detail=mysqli_num_rows($semakan);
if ($detail !=0){ 
echo "<script>alert
('RALAT! Pertembungan tarikh, Sila pilih tarikh lain'); window.location=' aktiviti_tambah.php '</script>";
}else{
#MASUK REKOD KE DLM TABLE
mysqli_query($con, "INSERT INTO aktiviti
VALUES (NULL, '$data1', '$data2')") or die(mysqli_error()); 
echo "<script>alert('Aktiviti berjaya ditambah'); 
window.location='aktiviti.php'</script>";
}
}
?>
<!-- MULA HTML -->
<html>
<!-- PANGGIL MENU -->
<div id="menu">
<?php include 'menu.php'; ?>
</div>
<!-- PANGGIL ISI -->
<div id="isi">
<body>
<head>
<h2>TAMBAH AKTIVITI BARU </h2>
</head>
<body>
<form method="POST">
<p>KETERANGAN AKTIVITI<br>
<input type="text" name="aktiviti" placeholder="Taip di sini"
size="60%" required autofocus></p>
<p>TARIKH<br>
<input type="date" name="tarikh" size="30%" required></p> 
<div>
<button name="hantar" type="submit">SIMPAN</button>
<button type="reset">RESET</button>
</div>
<font color='red'>*Pastikan maklumat anda betul sebelum
simpan.</font>
</form>
</body>
</div>
</html>