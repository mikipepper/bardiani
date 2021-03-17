<?php
include_once('db.php');
$con = mysqli_connect("localhost","username","","provabardiani");
if(mysqli_connect_errno())
{
    echo "Connessione fallita:" .mysqli_connect_error();
}
else{
    echo"";
}