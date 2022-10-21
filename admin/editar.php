<?php 
if(isset($_GET["id"])) exit();
$id =$_GET["id"];
require_once "../config/conexion.php";
$sentencia=$lorainegomezp_basededato -> prepare("SELECT * FROM productos where id =?;");
$sentencia->execute([$id]);
$data = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto ===FALSE){
    echo"NO EXITE PRODUCTO CON ESE ID";
    exit();
}
$id= $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$p_normal = $_POST['p_normal'];
$p_rebajado = $_POST['p_rebajado'];
$categoria = $_POST['categoria'];


$sentencia = $lorainegomezp_basededato ->prepare("UPDATE productos SET nombre=:nombre;cantidad=:cantidad;descripcion=:descripcion;p_normal=:p_normal;p_rebajado=:p_rebajado;categoria=:categoria where id=:id;");
$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':p_normal',$p_normal);
$sentencia->bindParam(':p_rebajado',$p_rebajado);
$sentencia->bindParam(':categoria',$categoria);

if($sentencia-> execute()){
    return header("Location:index.php");

}else{
    return"error";
}

?>
