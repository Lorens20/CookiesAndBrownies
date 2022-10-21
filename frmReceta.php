<?php
include_once "config/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="descripcion" content="PASTELERIA BROWNIES AND COOKIES">
    <title>Cookie</title>
    <link rel="shortcut icon" href="assets/logo.ico" />
    <link rel="stylesheet" href="assets/css/estilo.css">
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
<body>
    <div id="main-container">
        <div id="recetas-section" class="bg-recetas">
            <div class="recetas-titulo">
                 <h1>LAS MEJORES RECETAS</h1>
                 <h2>Recetas Especiales</h2> 
            </div>   
        </div>
        <div id="recetas-content">
                   <section >
                       <h2>Recetas secretas</h2>
                       <?php
                            $re = mysqli_query($conexion, "SELECT * FROM recetas");
                            while ($f = mysqli_fetch_array($re)) {
                            ?>
                       <div class="thumbnail">
                           <div class="image">
                          
                            
                           <a href="./frmdetalle.php?id=<?php  echo $f['id'];?>">
                             <img src="assets/Imagenes/<?php echo $f['imagen']; ?>"width="300px" height="200px" alt=".." style ="border-radius: 13px;"></a>

                            
                        </div>
                        </div>
                        <?php
                     }
                     ?>
                        <div class="info">
                            
                       
                       </div>
                             
                </section>
                </div>
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