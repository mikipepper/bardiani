<!DOCTYPE html>
<html>
<head>
<?php include_once('config.php'); $oldp=$_GET["p"]?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Bardiani</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    $result = $con->query("SELECT * FROM utenti WHERE password='$oldp' LIMIT 1");
$total=$result->num_rows;
if($total<1){
    echo '<div class="alert alert-warning">Non corretto</div>';
    }
    else{
        while($row=$result->fetch_assoc()){$email=$row['email'];}
        echo '<div class="form-group">
        <label for="password">Nuova password:</label>
        <input id="password" class="form-control" type="password" placeholder="Nuova password">
        </div>
        <input type ="hidden" id="email" value="'.email.'"/>
        <button type="submit" id="submit" class="btn btn-default">Cambia Password</button>
        <div id="display"></div>'; 
        echo '<script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var pw= $("#password").val();
                var em = $("#email").val();
                var dataString = "pwl="+pw+"$eml="+em;
                $.ajax({
                type: "POST",
                url: "lostpasswordprocessor.php",
                data: dataString,
                cache: false,
                success: function(result){
                    $("#display").html(result):
                }
            });
            return false;
        });
    });
    </script> ';
    }
    ?>
</body>
</html>