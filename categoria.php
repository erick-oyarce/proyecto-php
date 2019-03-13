<!-- Incluimos los helpers y la conexion para comprobar que el id existe
     de ese modo determinamos si cargar la pagina o redireccionar al index
-->
<?php require_once 'includes/conexion.php'; ?>      
<?php require_once 'includes/helpers.php'; ?>      

<?php
    $categoria_actual = conseguirCategoria($db, $_GET['id']);
    
    if(!isset($categoria_actual['id'])){
        header("Location:index.php");
    }
?>


<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
    
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>

<!-- Contenido principal -->

<div id="principal">
    
    <h1>Entradas de <?=$categoria_actual['nombre'] ?></h1>
    <?php 
        $entradas = conseguirEntradas($db, null, $_GET['id']);
        
        if(!empty($entradas) && mysqli_num_rows($entradas)):
            
            while($entrada = mysqli_fetch_assoc($entradas)):
                
    ?>
                <article class="entrada">
         
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?> </span>

                        <p>
                            <?= substr($entrada['descripcion'], 0,200)."..." ?>
                        </p>
                    </a>
                </article>

    <?php
            endwhile;

        else : 
    ?>
    <div class="alerta">No hay entradas en esta categoría</div>
    
    <?php    endif; ?>
    
 

</div> <!-- Fin principal -->
        
       

<!-- Pie de pagina -->
        
<?php require 'includes/pie.php'; ?>