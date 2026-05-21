<?php
require 'database.php';
#SAMBUNG KE P/DATA
#TERIMA NILAI YG DI POST
if (isset($_POST['hantar'])) { 
if($_POST['jantina'] == NULL) {
echo "<script> alert('Pilih Jantina'); 
window.location=' signup.php'</script>";
}else{
#TERIMA VALUE YANG DIPOST
$Kp = $_POST['nomkp'];
$LP = $_POST['jantina']; 
$Nama = $_POST['nama'];
$Hp = $_POST['nomhp'];
#PASSWORD 6 DIGIT DARI KANAN
$Pw=(substr($Kp, 6));
#SEMAK DULU REKOD SEDIA ADA
$semakan1=mysqli_query($con, "SELECT * FROM hp
WHERE nomHp='$Hp'");
$semakan2=mysqli_query($con, "SELECT * FROM peserta 
WHERE nomKp='$Kp'");
#LAKSANA ATURCARA
$detail1=mysqli_num_rows($semakan1); 
$detail2=mysqli_num_rows($semakan2); 
#PASTIKAN TIADA REKOD
if (($detail1 ==0) AND ($detail2 ==0)){ 
mysqli_query($con, "INSERT INTO hp
VALUES ('$Hp', '$Nama ')") or die(mysqli_error()); 
mysqli_query($con, "INSERT INTO peserta
VALUES ('$Kp', '$LP', '$Pw', 'PENGGUNA', '$Hp')") 
or die(mysqli_error());
echo "<script>alert('Pendaftaran berjaya'); 
window.location='index.php '</script>";
}else{
echo "<script>
alert('Pendaftaran gagal, Semak Nombor KP/HP'); 
window.location= 'signup.php'</script>";
}
}
}
?>