<!DOCTYPE html>
<html>
<head>
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
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" class="form-control" type="email" placeholder="La tua email">
    </div>
    <button type="submit" id="submit" class="btn btn-default">Reset Password</button>
    <div id="display"></div>
    <script>
        $(document).ready(function(){
            $(#submit).click(function(){
                var em =$("#email").val();
                var dataString = 'eml=' + em;
                $.ajax({
                    type:"POST",
                    url:"processor.php",
                    data:dataString,
                    cache:false,
                    success:function(result){
                        $("#display").html(result);
                    }
                });
            return false});
        </script>
</body>
</head>
</html>