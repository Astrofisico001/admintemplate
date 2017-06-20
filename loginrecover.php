<html>
    <head>
        <title>Login Beer</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <link rel="icon" type="image/png" href="./img/logo.png" />  
        <link href="util/css/login/logincss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require './controllers/Usuario.php';
        $usuario = new Usuario();
        if (isset($_POST["correo"]) && isset($_POST["password"])) {


            if ($usuario->validarUsuario($_POST["correo"], $_POST["password"])) {
                header("Location:./views/admin/inicio-panel.php");
            }
        }
        ?>
        <div class="section"></div>
        <main>
            <center>
                <img class="responsive-img" style="width: 100px;" src="https://s-media-cache-ak0.pinimg.com/originals/9d/63/bd/9d63bd96356d4ac066ee53aa699250e9.png" />
                <div class="section"></div>
                <h5 class="indigo-text">¡Beer!</h5>
                <div class="section"></div>
                <div class="container">
                    <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 350px;">
                        <form class="col s12" method="post" action="#">
                            <div class='row'>
                                <div class='col s12'>
                                    <label>Enviaremos la nueva clave a su correo</label>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='input-field col s12 m12'>
                                    <input class='validate' type='email' name='correo' id='correo' />
                                    <label for='correo'>Ingresar email</label>
                                </div>
                            </div>
                            <br/>
                            <center>
                                <div class='row'>
                                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect '>Enviar</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </center>

        </main>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    </body>
</html>