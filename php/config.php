<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Bardiani";
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(mysqli_connect_errno())
{
    echo "Connessione fallita:" .mysqli_connect_error();
}
else{
    echo"";
}
?>