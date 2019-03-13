
<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
        
      
        
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>

<!-- Contenido principal -->

<div id="principal">
    <h1>Todas las entradas</h1>
    <?php 
        $entradas = conseguirEntradas($db);
        
        if(!empty($entradas)):
            
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

        endif;
    ?>
    
 

</div> <!-- Fin principal -->
        
       

<!-- Pie de pagina -->
        
<?php require 'includes/pie.php'; ?>