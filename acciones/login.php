<?php

//Iniciar la sesion y conexion a la red
require_once 'includes/conexion.php';


//Recojer los datos del formulario
if(isset($_POST)){
    
    //Borrar error de sesion
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }
    
    //recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    

    //Consulta para comprobar las credenciales del usuario
    
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $query);
    
    if($login && mysqli_num_rows($login) == 1){
                
        $usuario = mysqli_fetch_assoc($login);
        
        //Comprobar la contraseña /cifrar
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            
            //utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
            
            
            
        }else{
            
            //Si algo falla, enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
            
        }
        
        
    }else{
        //mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
      
    }
 
    
}

//Redirigir al index.php
header('Location: index.php');

