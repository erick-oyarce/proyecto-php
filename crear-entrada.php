
<!-- Include para comprobar que existe una sesión o no
    en caso de que no exista no permitira entrar a la pagina
-->
<?php require_once 'includes/redireccion.php'; ?>      

<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
        
      
        
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Crear Entradas</h1>
    
    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlar y disfrutar
        de nuestro contenido
    </p>
    <br>
    <form action="acciones/guardar-entrada.php" method="POST">
        <label for="titulo">Nombre de la entrada: </label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        <br>
        <label for="descripcion">Descripción: </label><br>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        <br>
        <label for="categoria">Categoria: </label><br>
        <select name="categoria">            
                <?php
                    $categorias = conseguirCategorias($db) ;
                   
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                        
                ?>
                    <option value="<?=$categoria['id']?>">
                        <?=$categoria['nombre']?>
                    </option>
                
                <?php
                    endwhile;
                    endif;
                ?>
            </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
       
        
        <input type="submit" value="Guardar">
        
    </form>
    <?php borrarErrores(); ?>

</div> <!-- Fin principal -->
        
       

<!-- Pie de pagina -->
        
<?php require 'includes/pie.php'; ?>