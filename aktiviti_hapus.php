<?php
#SAMBUNG KE DB
require 'database.php'; 
#DAPATKAN URL
$AktivitiDel = $_GET['id']; 
mysqli_query($con, "DELETE FROM aktiviti
WHERE kod='$AktivitiDel'");
#PAPAR MESEJ
echo "<script>alert('Aktiviti berjaya dihapuskan'); 
window.location=' aktiviti.php'</script>";
?>