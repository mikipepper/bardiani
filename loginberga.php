<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <form method="post">
            <h1>Login</h1>
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="password" placeholder="Password" name="password">
            <button type="submit" name="login">Accedi</button>
        </form>
    </body>
</html>

            echo <script>
                  $(document).ready(function(){
                      $("#submit").click(function(){
                          var pw= $("#password").val();
                          var em = $("#email").val();
                          var dataString = "pwl="+pw+"$eml="+em;
                          $.ajax({
                          type: "POST",
                          url: "/php/ajaxlogin.php",
                          data: dataString,
                          cache: false,
                          success: function(result){
                              if(result = 1){
							  $("index.html").html(result):
								else{
									echo "Password errata";
								}
                          }
                      });
                      return false;
                  });
              });
              </script> ;

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>