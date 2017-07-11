<html>
    <head>
        <title>Login Beer</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <link href="materialize/css/css.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/jpg" href="../../img/icon-prosaloma.jpg" />
    </head>
    <body>
      <?php
      if (isset($_GET["e"])) {
        echo "<script>alert('usuario o contraseña incorrecto')</script>";
      }
      ?>
        <style>
            body {
                background-image: url("img/background.jpg");
                background-repeat: no-repeat;
            }
        </style>
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>
        <center class="col s12">
            <div class="col s12">
                <div class="z-depth-1 white col s12" style="//display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 350px;">
                    <img width="100" height="80" src="img/logo.png" alt=""/><br><br>
                    <form method="POST" action="./controllers/usuarios/login.php" class="col s12 m12">
                        <div class='row col s12'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='username' id='username' required/>
                                <label for='username'>Ingresa tu correo</label>
                            </div>
                        </div>
                        <div class='row col s12'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' required/>
                                <label for='password'>Ingresa tu password</label>
                            </div>
                        </div>
                        <center>
                            <div class='row col s12'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo darken-4'>Login</button>
                            </div>
                        </center>
                    </form>
                    <a class='pink-text' href='loginrecover.php'><b>¿Problemas para ingresar?</b></a><br><br>
                </div>
            </div>
        </center>
          <script src="materialize/js/jquery.js" type="text/javascript"></script>
          <script src="materialize/js/materialize.js" type="text/javascript"></script>
</body>
</html>
