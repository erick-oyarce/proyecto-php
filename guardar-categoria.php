<?php


if(isset($_POST)){
     // conexion a la base de datos
    require_once 'includes/conexion.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false ;
    
     $errores = array();
    
    // validar datos antes de almacenarlos
    
    //validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_valido = true;
    }else{
        $nombre_valido = false;
        $errores ['nombre'] = "El nombre no es válido";
    }
    
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES (null, '$nombre');";
        $guardar = mysqli_query($db, $sql);
        echo "<script language=JavaScript>alert('Guardado con exito');</script>"; 
        header( "refresh:0.5; url=index.php" );
    }else{
        echo "<script language=JavaScript>alert('El nombre de la categoría no es válido');</script>"; 
        header( "refresh:0.5; url=crear-categoria.php" );
    }
    
    
        
}



