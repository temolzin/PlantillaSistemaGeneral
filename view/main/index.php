<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantilla | Dashboard</title>

    <link rel="icon" href="<?php echo constant('URL'); ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/sweetalert2/sweetalert2.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="login">
        <h1>Inicia Sesión</h1>
        <form method="post" id="formLogin" name="formLogin">
            <input type="text" id="username" name="username" placeholder="Email" />
            <input type="password" id="password" name="password" placeholder="Contraseña" />

            <button type="submit" class="btn btn-primary btn-block btn-large">Aceptar</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="<?php echo constant('URL'); ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo constant('URL'); ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Jquery Validate -->
    <script src="<?php echo constant('URL'); ?>public/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- SWEETALERT2 -->
    <script src="<?php echo constant('URL'); ?>public/plugins/sweetalert2/sweetalert2.js"></script>

    <script>
        $(document).ready(function (){
            login();
        });

        var login = function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    var datos = $('#formLogin').serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo constant('URL');?>usuario/login",
                        data: datos,
                        success: function (data) {
                            if (data == false) {
                                Swal.fire(
                                    "¡Error!",
                                    "Usuario y Contraseña incorrectos" + data,
                                    "error"
                                );
                            } else {
                                window.location = "<?php echo constant('URL');?>tablero";
                            }
                        },
                    });
                }
            });
            $('#formLogin').validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Ingresa tu email"
                    },
                    password: {
                        required: "Ingresa tu password"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        }
    </script>
</body>
</html>
