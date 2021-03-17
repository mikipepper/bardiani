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
    $row = $result->fetch_assoc();
    $idutente=$row['id'];
//creare nuova password
function generatePassword ( $length = 8 )
{
  $password = '';
  $possibleChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_?*+&%!#@><°-:,/';  
  $i = 0;  
  while ($i < $length) { 
    $char = substr($possibleChars, mt_rand(0, strlen($possibleChars)-1), 1);
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }
  }
  return $password;
}
$pwd = generatePassword(16);
$md5pwd = md5($pwd);
//query update password criptata
$update = $con->query("UPDATE utenti SET password=$md5pwd WHERE email = $email");
//phpmailer
    $server_smtp = 'mail.xxxxxxx';
    $username_smtp= '';
    $password_smtp ='';
    $indirizzo_mittente = '';
    $descrizione_mittente = '';
    $indirizzo_destinatario = '';
    
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
    
            require "Exception.php";
            require "PHPMailer.php";
            require "SMTP.php";
    
            $mail = new PHPMailer(true); 
    
            $mail->IsSMTP();
            $mail->SMTPOptions = array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
             )
            );
            $mail->SMTPAuth   = true;
            $mail->Host       = $server_smtp;
            $mail->Port       = 587;
            $mail->SMTPSecure = "tls"; 
            $mail->Username   = $username_smtp;
            $mail->Password   = $password_smtp;
            
            $mail->setFrom($indirizzo_mittente, $descrizione_mittente);
            $mail->addAddress($indirizzo_destinatario);
    
            $mail->Subject = "Hai ricevuto un nuovo messaggio";
            $mail->Body    = " Corpo del messaggio";
    
            if (!$mail->send())
                echo $mail->ErrorInfo;
            else
                echo "ok!";
//undone
echo '<div class="alert alert-success">Email inviata a '.$email.'</div>';
$con->close();
?>
