
<!-- Include para comprobar que existe una sesión o no
    en caso de que no exista no permitira entrar a la pagina
-->
<?php require_once 'includes/redireccion.php'; ?>      

<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
        
      
        
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Crear categorias</h1>
    
    <p>
        Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear
        sus entradas.
    </p>
    <br>
    <form action="acciones/guardar-categoria.php" method="POST">
        <label for="titulo">Nombre de la categoria: </label>
        <input type="text" name="nombre">
        
        <input type="submit" value="Guardar">
        
    </form>

</div> <!-- Fin principal -->
        
       

<!-- Pie de pagina -->
        
<?php require 'includes/pie.php'; ?>
