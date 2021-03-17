<?php
include_once('config.php');
$email = mysqli_real_escape_string($con, $_POST['eml']);
$emailclean = filter_var($email, FILTER_SANITIZE_EMAIL);
$result = $con->query("SELECT * FROM utenti WHERE email='$emailclean' LIMIT 1");
$total = $result->num_rows;
if($total<1){
    echo '<div class="alert alert-warning">Email non corretta, riprova.</div>'
    die();
}
    while($row = $result->fetch_assoc()){
        $emaill=$row['email'];
        $password=$row['password'];
    }
//phpmailer
//undone
echo '<div class="alert alert-success">Email inviata a '.$email.'</div>';
$con->close();
?>
