<div class="container">
    <form autocomplete="off" id="formRegistroUsuarios" name="formRegistroUsuarios" action="" method="POST">

        <h1><?php if (isset($_POST['id_estudiante'])) {
                echo "Editar Estudiante";
            } else {
                echo "Registrar Estudiante";
            } ?></h1>
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" <?php echo "value='$nombres'" ?>>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" <?php echo "value='$apellidos'" ?>>
        <input type="text" name="idEstudiante" id="idEstudiante" placeholder="ID" <?php echo "value='$idEstudiante'" ?>>

        <h3>Programa Alimentario:</h3>
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


        <h3>Genero:</h3>
        <div class="radioContainer">
            <input type="radio" name="genero" id="checkboxGeneroMasculino" value="Masculino" <?php if ($genero == "Masculino") {
                                                                                                    echo "checked";
                                                                                                } ?>>
            <label class="labelMasculino" for="checkboxGeneroMasculino">Masculino</label>
        </div>
        <div class="radioContainer">
            <input type="radio" name="genero" id="checkboxGeneroFemenino" value="Femenino" <?php if ($genero == "Femenino") {
                                                                                                echo "checked";
                                                                                            } ?>>
            <label class="labelGeneroFemenino" for="checkboxGeneroFemenino">Femenino</label>
        </div>

        <select name="grupo" id="grupo">
            <option value="" hidden>Selecciona un grupo</option>
            <?php
            include_once 'includes/grupo.php';
            $grupo = new grupo();
            $grupos = $grupo->getGrupos();
            foreach ($grupos as $grupo) {
            ?>
            <option <?php if($grupoEstudiante == $grupo['nombreGrupo']){ echo "selected"; } ?> value="<?php echo $grupo['nombreGrupo']; ?>"><?php echo $grupo['nombreGrupo']; ?></option>
            <?php
            }
            ?>
        </select>

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

        if (isset($_POST['idEstudianteOriginal'])) {
        ?>
        <input type='hidden' name='idEstudianteOriginal' id='idEstudianteOriginal' value="<?php echo $_POST['idEstudianteOriginal'] ?>"
            size='30'>
        <input type='hidden' name='idHuellasOriginal' id='idHuellasOriginal' value="<?php echo $_POST['idHuellasOriginal'] ?>"
            size='30'>
        <?php
        }
        ?>
    </form>
</div>