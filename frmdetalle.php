
<?php
	include_once 'config/conexion.php';
    $id = isset($_GET['id']) ?$_GET['id']:'';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="descripcion" content="PASTELERIA BROWNIES AND COOKIES">
    <title>Cookie</title>
    <link rel="shortcut icon" href="assets/logo.ico" />
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<header>
    <div class="ancho">
        <a href="./index.php"><img src="assets/logo.ico" id="logo" ></a>
    </div>
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
    <div id = "contenedor" style="margin-left: 250px;margin-right: 250px;">
    <section> 
        
    <?php
     $re=mysqli_query($conexion,"SELECT * FROM recetas where id=".$_GET['id'])or die(mysqli_error($conexion));
     while ($f=mysqli_fetch_array($re)) {
        ?>
        <center>
        <h3><?php echo $f['nombre']; ?></h3>
        <img src="./assets/imagenes/<?php echo $f['imagen']; ?>" width="200px" style ="vertical-align: middle; border-radius: 13px;">
        <hr>
        <div>
            <h2>INGREDIENTES</h2>
        </div>
        <div>
            <ul>
                <li style="margin-left: 10px;text-align: initial;"><?php echo $f['ingredientes']; ?></li>
            </ul>
        </div>
        <div>
            <h2>PREPARACION</h2>
        </div>
        <article style="text-align: initial;">
            <td><?php echo $f['descripcion']; ?></td></article>
        </div>
        </center>
    </section>

        
        <?php
    }
        ?>
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