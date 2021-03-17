<?php
include_once('config.php');
$pw=mysqli_real_escape_string($con, $_POST['pw1']);
$pwclean = filter_var($pw, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$hash=shal(md5($pwclean));
$em=mysqli_real_escape_string($con, $_POST['eml']);
$emclean = filter_var($em, FILTER_SANITIZE_STRING);
mysqli_query($con, "UPDATE utenti SET password='$hash' WHERE email='$emclean' ");
echo '<div class="alert alert-success">La tua password è stata cambiata<a href="#">Entra</a></div>';
$con->close();
?>