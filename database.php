 <?php
#KEKALKAN SETUP INI
#SET TIME ZONE WAKTU
date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikhKini=date("Y-m-d"); 
$masaKini=date("H:i:s"); 
#SETTING DATABASE
$host="localhost"; 
$user="root";
#UBAH DI SINI NAMA DB
$db="hadir2";
$password="";
#SAMBUNGAN PANGKALAN DATA
$con = mysqli_connect($host, $user, $password, $db); 
#PAPARAN MSG JIKA SAMBUNGAN GAGAL
if (mysqli_connect_errno()) {
echo "Database tidak berhubung!: ".mysqli_connect_error();
}
#UBAH DI SINI UNTUK TETAPAN SISTEM
$namasys = "SMART IT";
$namasys1 = "SISTEM REKOD KEHADIRAN MURID KELAB SMART IT ";
$motto= "BERSAMA MEMBINA GENERASI CELIK IT";
?>