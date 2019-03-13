<!-- Include de la conexion a la bd -->
<?php require_once 'conexion.php'; ?>

<!-- Include de funciones para acciones especificas -->
<?php require_once 'helpers.php'; ?>

<!Doctype HTML>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Blog de Videojuegos</title>
        
        <!-- Estilos css -->
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
        
    </head>
    <body>
        <!--Cabecera-->
        <header id="cabecera">
            <!-- Logo -->
            <div id="logo">
                <a href="index.php">
                    Blog de VideoJuegos
                </a>
            </div>
            
        <!-- Menu -->
         
        
        
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias = conseguirCategorias($db);
                        if(!empty($categorias)):
                            while($categoria = mysqli_fetch_assoc($categorias)): 
                    ?>
                                <li>
                                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                                </li>
                    
                    <?php 
                            endwhile;
                        endif;
                    ?>
                    <li>
                        <a href="index.php">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            
            </nav>    
         <div class="clearfix"></div>
        </header>
        
          <div id="contenedor">