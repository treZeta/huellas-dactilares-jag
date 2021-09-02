<div class="container">
    <form autocomplete="off" id="formRegistroProgramasAlimentarios" name="formRegistroProgramasAlimentarios" action="" method="POST">

        <h1><?php if(isset($_POST['nombreProgramaAlimentarioOriginal'])){ echo "Editar Programa"; } else { echo "Registrar Programa"; } ?></h1>
        <input type="text" name="nombreProgramaAlimentario" id="nombreProgramaAlimentario" placeholder="Nombre del programa alimentario" <?php echo "value='$nombreProgramaAlimentario'" ?>>

        <input type="submit" class="button" value="Guardar">
        <?php
        if (isset($_POST['nombreProgramaAlimentarioOriginal'])) {
        ?>
        <input type='hidden' name='nombreProgramaAlimentarioOriginal' id='nombreProgramaAlimentarioOriginal' value="<?php echo $_POST['nombreProgramaAlimentarioOriginal'] ?>"
            size='30'>
        <?php
        }
        ?>
    </form>
</div>