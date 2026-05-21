<?php
#SAMBUNG KE DATABASE 
require 'database.php'; 
#MULA SESSION 
session_start();
#DAPATAKAN POST VALUES
if (isset($_POST['user'])) {
#POST VALUE KE VARIABLE
$user = mysqli_real_escape_string($con, $_POST['user']); 
$pass = mysqli_real_escape_string($con, $_POST['pass']); 
#LAKSANA SQL
$query = mysqli_query($con, "
SELECT * FROM peserta AS t1 
INNER JOIN hp AS t2
ON t1.nomHp=t2.nomHp
WHERE t1.nomKp='$user' AND t1.password='$pass'"); 
$row = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) == 0||$row['password']!=$pass)
{
#MSG JIKA GAGAL
echo "<script>alert('Nom KP atau Password yang salah'); 
window.location='index.php'</script>";
}else{
#CIPTA SESSION
$_SESSION['user'] = $row['nomKp'];
$_SESSION['nama'] = $row['nama'];
$_SESSION['level'] = $row['aras']; 
#BUKA DASHBOARD
header("Location: dashboard.php");
}
}
?>