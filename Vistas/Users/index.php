

<?php
       include '../../AccesoADatos/Servicio.php';
       //include '../AccesoADatos/ServicioLoggin.php';
        include '../../AccesoADatos/Exceptions/GlobalException.php';
        include '../../AccesoADatos/Exceptions/NoDataException.php';


        if(isset($_POST['cedula']) && isset($_POST['clave'])){
            try {
             // $this->conectar();
              require_once ("AccesoADatos/ServicioLoggin.php");
          } catch (Exception $e) {
              echo "Exception:" . $e->getMessage();
          }
           
          }
  ?>
<html lang="en">

<head>
    <title>How To Create jQuery Form Validation For Login And Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
            text-decoration: none;
        }

        body {
            background: #5c2fab;
        }

        a:focus,
        button:focus {
            outline: none;
        }

        .login-form {
            max-width: 470px;
            background: #673AB7;
            padding: 30px 60px;
            margin: 50px auto 0px;
        }

        .logo {
            margin: 0 auto;
            display: table;
        }

        .logo img {
            max-width: 60px;
        }

        .social-btn {
            display: flex;
            margin: 40px 0px;
            padding: 15px 0px;
            background-color: #5c2fab;
        }

        .social-btn button {
            width: 100%;
            cursor: pointer;
            border: none;
            background-color: transparent;
            font-size: 22px;
            color: #fff;
        }

        .input-box {
            width: 100%;
            height: 50px;
            position: relative;
            margin-top: 15px;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            border: none;
            background: #ffffff;
            padding: 0 15px;
            font-size: 16px;
            outline: none;
            color: #5c2fab;
            border-radius: 4px;
        }

        .require-msg {
            position: absolute;
            top: -20%;
            right: 0px;
            font-size: 15px;
            background-color: #FF9800;
            color: #ffffff;
            padding: 3px 5px;
            border-radius: 4px;
        }

        .input-box input:focus+.require-msg {
            display: none;
        }

        .remember-pwd {
            margin-top: 15px;
            color: #f4f4f480;
            overflow: hidden;
            font-size: 14px;
        }

        .remember-pwd a {
            color: #f4f4f480;
            font-size: 14px;
            float: right;
        }

        .remember {
            float: left;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .checkbox {
            display: inline-block;
            width: 18px;
            height: 18px;
            background: #5c2fab;
            border-radius: 50px;
            margin-right: 10px;
            position: relative;
            border: 2px solid #fff;
        }

        .checkbox input {
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .checked {
            position: absolute;
            left: 5px;
            top: 2px;
            width: 4px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(35deg);
            display: none;
        }

        .checkbox input:checked+.checked {
            display: block;
        }

        .login-btn {
            width: 100%;
            margin-top: 30px;
            background: #5c2fab;
            border: none;
            color: #fff;
            outline: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50px;
            padding: 15px 0px;
            transition: .3s linear;
        }

        .login-btn.active {
            background: #ffffff;
            color: #5c2fab;
        }

        .hide-msg {
            display: none;
        }

        .policy-link {
            text-align: center;
            padding: 20px 0px 0px;
            color: #f1f1f1;
            font-size: 14px;
            display: table;
            margin: 0 auto;
        }

        .new-account a {
            color: #f1f1f1;
            font-size: 14px;
        }

        .new-account {
            font-size: 14px;
            text-align: center;
            color: #f4f4f480;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <a href="#" class="logo"><img src="https://www.markuptag.com/images/white-logo-icon.png" alt="logo"></a>

        <!-- Login by social media -->


        <br><br><br>

        <!-- Login by username and password -->
        <form action="index.php" method="POST">
            <div class="input-box">
                <input type="text" placeholder="Cédula" name="cedula">
                <span class="require-msg hide-msg">Required</span>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Contraseña" name="clave">
                <span class="require-msg hide-msg">Required</span>
            </div>

            <div class="remember-pwd">
                <label class="remember">
                    <span class="checkbox">
                        <input type="checkbox">
                        <span class="checked"></span>
                    </span>Recordarme
                </label>
            </div>

            <input type="submit" value="Iniciar sesión" class="login-btn" disabled>
            
        </form>
        <p class="new-account">¿No tiene cuenta? <a href="#">Registrarse</a></p>
    </div>
</body>
<script type="text/javascript">
    // Show/Hide required msg
    $(".input-box input").focusout(function() {
        if ($(this).val() == "") {
            $(this).siblings().removeClass("hide-msg");
        } else {
            $(this).siblings().addClass("hide-msg");
        }
    });

    // Login button able and disabled
    $(".input-box input").keyup(function() {
        var inputs = $(".input-box input");
        if (inputs[0].value != "" && inputs[1].value) {
            $(".login-btn").attr("disabled", false);
            $(".login-btn").addClass("active");
        } else {
            $(".login-btn").attr("disabled", true);
            $(".login-btn").removeClass("active");
        }
    });
</script>

</html>