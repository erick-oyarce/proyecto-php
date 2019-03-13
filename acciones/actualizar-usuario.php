<?php



if(isset($_POST)){
    
    // conexion a la base de datos
    require_once '../includes/conexion.php';
    
    if(!isset($_SESSION)){
        session_start();
    }
    //Recoger los valores del formulario de actualizacion
    /* con mysqli_real_escape_string evitamos que el usuario ingrese comillas u otros valores
     que puedan ser interpretados como codigo, ya que todo lo contenido en la variable sera
    considerado como un string
     */
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    //Array de errores
    
    $errores = array();
    
    // validar datos antes de almacenarlos
    
    //validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_valido = true;
    }else{
        $nombre_valido = false;
        $errores ['nombre'] = "El nombre no es válido";
    }
    
    //validar campo nombre
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellido_valido = true;
    }else{
        $apellido_valido = false;
        $errores ['apellidos'] = "Los apellidos no son válidos";
    }
    
    //validar el email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_valido = true;
    }else{
        $email_valido = false;
        $errores ['email'] = "El email no es válido";
    }
    
  
        if(sizeof($errores) == 0){
           
            $usuario = $_SESSION['usuario'];
            
            //Comprobar si el email existe o no
            $query = "SELECT id, email FROM usuarios WHERE email = '$email'";
            $isset_email = mysqli_query($db, $query);
            $isset_user = mysqli_fetch_assoc($isset_email);
            
            if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
                
                //actualizar usuario en la base de datos en la tabla correspondiente
            
                $sql = "UPDATE usuarios SET ".
                        "nombre = '$nombre', ".
                        "apellidos = '$apellidos', ".
                        "email = '$email' ".
                        "WHERE id = ".$usuario['id'];

                $guardar = mysqli_query($db, $sql);


                if($guardar){
                    $_SESSION['usuario']['nombre'] =$nombre;
                    $_SESSION['usuario']['apellidos'] = $apellidos;
                    $_SESSION['usuario']['email'] = $email;
                    $_SESSION['completado'] = "Tus datos se han actualizado con exito";
                }else{
                    $_SESSION['errores']['general'] = "Fallo al actualizar tus datos!!";
                }
                
            }else{
                $_SESSION['errores']['general'] = "El usuario con ese email ya existe!!";
            }
        
            
        
    }else{
        $_SESSION['errores'] = $errores;
       
    }
}

 header('Location: ../mis-datos.php');

