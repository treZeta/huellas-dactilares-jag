<div class="container">
    <form autocomplete="off" id="formRegistroUsuarios" name="formRegistroUsuarios" action="" method="POST"
        onsubmit="return validarCampos()">

        <h1><?php if(isset($_POST['id_estudiante'])){ echo "Editar Estudiante"; } else { echo "Registrar Estudiante"; } ?></h1>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" <?php echo "value='$nombres'" ?>>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" <?php echo "value='$apellidos'" ?>>
        <input type="text" name="id" id="id" placeholder="ID" <?php echo "value='$id'" ?>>

        <div class="radioContainer">
            <input type="radio" name="programaAlimentario" id="checkboxAlmuerzo" value="Almuerzo" <?php if ($programaAlimentario == "Almuerzo") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
            <label class="labelAlmuerzo" for="checkboxAlmuerzo">Almuerzo</label>
        </div>
        <div class="radioContainer">
            <input type="radio" name="programaAlimentario" id="checkboxRefrigerio" value="Refrigerio" <?php if ($programaAlimentario == "Refrigerio") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
            <label class="labelRefrigerio" for="checkboxRefrigerio">Refrigerio</label>
        </div>

        <div class="fingerprint-writer-container">
            <?php
            echo $load_enroll_user;
            ?>
        </div>

        <input type="submit" class="button" value="Guardar">
        <input type='hidden' name="huella1" id="huella1" value="">
        <input type='hidden' name='huella1_id' id='huella1_id' value="" size='30'>
        <input type='hidden' name="huella2" id="huella2" value="">
        <input type='hidden' name='huella2_id' id='huella2_id' value="" size='30'>
        <?php

        if (isset($_POST['id_estudiante'])) {
        ?>
        <input type='hidden' name='id_estudiante' id='id_estudiante' value="<?php echo $_POST['id_estudiante'] ?>"
            size='30'>
        <?php
        }
        ?>
    </form>
</div>