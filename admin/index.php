<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: productos.php');
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Ingrese usuario y contraseña
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            require_once "../config/conexion.php";
            $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
            $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$clave'");
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['id'] = $dato['id'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['user'] = $dato['usuario'];
                header('Location: productos.php');
            } else {
                $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Contraseña incorrecta
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                session_destroy();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar Sesión</title>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" />
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
    <section>
        <div class="ancho">
        </div>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx"><img src="../assets/imagenes/Pastel.jpg" ></div>
                <div class="formBx">
                        <form onsubmit="user" method="POST" action="" autocomplete="off">
                        <h2> Bienvenido</h2>
                        
                        <?php echo (isset($alert)) ? $alert : ''; ?>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario" >
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Password">
                        <input type="submit" name="" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>