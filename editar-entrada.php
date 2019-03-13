<!-- Include para comprobar que existe una sesión o no
    en caso de que no exista no permitira entrar a la pagina
-->
<?php require_once 'includes/redireccion.php'; ?> 

<!-- Incluimos los helpers y la conexion para comprobar que el id existe
     de ese modo determinamos si cargar la pagina o redireccionar al index
-->
<?php require_once 'includes/conexion.php'; ?>      
<?php require_once 'includes/helpers.php'; ?>      

<?php
    $entrada_actual = conesguirEntrada($db, $_GET['id']);
   
    
    if(!isset($entrada_actual['id'])){
        header("Location:index.php");
    }
?>


<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
    
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Editar Entrada</h1>
    
    <p>
        Edita tu entrada <strong> <?=$entrada_actual['titulo']?> </strong>
    </p>
    <br>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Nombre de la entrada: </label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        <br>
        <label for="descripcion">Descripción: </label><br>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?> </textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        <br>
        <label for="categoria">Categoria: </label><br>
        <select name="categoria">            
                <?php
                    $categorias = conseguirCategorias($db) ;
                   
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                        
                ?>
                    <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : ''?> >
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