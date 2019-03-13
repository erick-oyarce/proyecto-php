<!-- Include para comprobar que existe una sesión o no
    en caso de que no exista no permitira entrar a la pagina
-->
<?php require_once 'includes/redireccion.php'; ?>      

<!-- Incluir la cabecera de la pagina -->       
<?php require_once 'includes/cabecera.php'; ?>      
        
      
        
<!-- Sidebar -->
<?php require 'includes/lateral.php'; ?>


<div id="principal">
    <h1>Mis datos</h1>
     <div id="register" class="bloque">
            <h3>Registrate</h3>

            <!-- Errores -->
            <?php if(isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
               <div class="alerta alerta-error">
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

            <form action="acciones/actualizar-usuario.php" method="POST">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos </label>
                <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos'];?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email </label>
                <input type="email" name="email" value="<?=$_SESSION['usuario']['email'];?>" >
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                

                <input type="submit" name="submit" value="Actualizar">

            </form>
            <?php borrarErrores(); ?>
        </div>
    
</div> <!-- Fin principal -->
        
       

<!-- Pie de pagina -->
        
<?php require 'includes/pie.php'; ?>