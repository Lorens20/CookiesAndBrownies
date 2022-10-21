<?php
include "config/conexion.php";
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="descripcion" content="PASTELERIA BROWNIES AND COOKIES">
    <title>Cookie</title>
    <link rel="shortcut icon" href="assets/logo.ico" />
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<header>
    <div class="ancho">
    <a href="./index.php"><img src="assets/logo.ico" id="logo" ></a>
    <nav>
        
    </nav>
    <div class="menu">
        <nav>
            <ul>
                <li><a href="./frmproducto.php">Producto</a></li>
                <li><a href="./frmReceta.php">Receta</a></li>
                <li><a href="./frmcontactanos.php">Contactanos</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>
<body>
    <div class="container-form">
        <div class="info-form">
            <h2>Contáctanos</h2>
            <p>Contactanos para tener el gusto de atenderte y poder aclarar tus dudas</p>
            <a href="#"><i class="fa fa-phone"></i> 123-456-789</a>
            <a href="#"><i class="fa fa-envelope"></i> cookiesandbrownies@gmail.com</a>
            <a href="#"><i class="fa fa-map-marked"></i> Barranquilla, Colombia</a>
        </div>
        <form action="#" autocomplete="off">
            <input type="text" name="nombre" placeholder="Tu Nombre" class="campo">
            <input type="emal" name="email" placeholder="Tu Email" class="campo">
            <textarea name="mensaje" placeholder="Tu Mensaje..."></textarea>
            <input type="submit" name="enviar" value="Enviar Mensaje" class="btn-enviar">
        </form>
    </div>
    <div class="footer-basic">
            <footer>
                <center>
                <nav>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
            </nav>
        </center>
                <p class="copyright">Company Lgp © 2022</p>
            </div>
           </footer>
</body>
</html>