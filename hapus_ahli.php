<?php
#SAMBUNG KE DB
require 'database.php';
#DAPATKAN URL
$hpDel = $_GET['hp'];
mysqli_query($con,"DELETE FROM hp WHERE
nomHP='$hpDel'");
#PAPAR MESEJ
echo "<script>alert('Ahli berjaya dihapuskan');
window.location='senarai_ahli.php'</script>";
?>