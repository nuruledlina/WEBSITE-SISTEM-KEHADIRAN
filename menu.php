<html>
<div id="menu">
<?php
if ($_SESSION['level']=="ADMIN"){
?><!-- ARAS LOGIN - ADMIN-->
<ul>
<li><a href="dashboard.php">HOME</a></li>
<li><a href="aktiviti.php">SENARAI AKTIVITI</a></li>
<li><a href="senarai_ahli.php">SENARAI AHLI</a></li>
<li><a href="carian.php">CARIAN KEHADIRAN</a></li> 
<li><a href="laporan1.php">LAPORAN KEHADIRAN</a></li>
<li><a href="laporan2.php">LAPORAN TIDAK HADIR</a></li>
<li><a href="logout.php">KELUAR</a></li>
</ul>
<?php
}else{
?><!-- #ARAS LOGIN PENGGUNA -->
<ul>
<li><a href="dashboard.php">HOME</a></li> 
<li><a href="logout.php">KELUAR</a></li> 
</ul>
<?php } ?> 
</div>
</html>