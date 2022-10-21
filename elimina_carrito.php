/*
require_once "config/conexion.php";

if (isset($_POST['action'])){
    $action =$_POST['action'];
    $id =$isset($_POST['id'])?$_POST['id']:0;

    if ($action == 'eliminar'){
        $datos['ok']=eliminar($id);

    }
}

function eliminar($id){
    if($id >0){
        if(isset($_SESSION['carrito']['productos'][$id])){
           unset($_SESSION['carrito']['productos'][$id]);
           return true;
        }
        }else {
            return false;
    }
}*/
<?php
session_start();
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id']!=$_POST['Id']){
			$datosNuevos[]=array(
				'Id'=>$arreglo[$i]['Id'],
				'Nombre'=>$arreglo[$i]['Nombre'],
				'Precio'=>$arreglo[$i]['Precio'],
				'Imagen'=>$arreglo[$i]['Imagen'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
	}else{
		unset($_SESSION['carrito']);
		echo '0';
	}
?>