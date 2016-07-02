<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    
</head>

<body role="login">
<div class="container">
  
  <div class="row">
    
    
    <div class="col-md-6 col-xs-12 col-md-offset-3">
      
        <form  class="login-form" method="post" action="index.php" role="login" id="formLogin">
          <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />
          
          <input type="email" name="email" id="email" placeholder="example@example.com" required class="form-control input-lg"/>
          
          <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required />
          
          <?php
          echo $mensajeLogin;
          ?>
          <input type="submit" class="btn btn-lg btn-primary btn-block" name="botonLogin" value="Sing in"/>
          
        </form>
        
        <div class="form-links">
          <a href="http://www.2r0consulting.com/" target="_blank">http://www.2r0consulting.com/</a>
        </div>
      
      </div>
      
  </div>
  
</div>
</body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</html>