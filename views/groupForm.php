<div class="container">
    <form autocomplete="off" id="formRegistroGrupos" name="formRegistroGrupos" action="" method="POST">

        <h1><?php if(isset($_POST['nombreGrupoOriginal'])){ echo "Editar Grupo"; } else { echo "Registrar Grupo"; } ?></h1>
        <div class="input">
            <strong>Nombre del grupo</strong>
            <input type="text" name="nombreGrupo" id="nombreGrupo" placeholder="Nombre del grupo" <?php echo "value='$nombreGrupo'" ?>>
        </div>

        <div class="input">
            <h3>Grados cursados:</h3>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxPreescolar" value="0" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "0") { echo "checked"; } } ?>>
                <label class="labelPreescolar" for="checkboxPreescolar">Preescolar</label>
            </div>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxPrimero" value="1" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "1") { echo "checked"; } } ?>>
                <label class="labelPrimero" for="checkboxPrimero">Primero</label>
            </div>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxSegundo" value="2" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "2") { echo "checked"; } } ?>>
                <label class="labelSegundo" for="checkboxSegundo">Segundo</label>
            </div>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxTercero" value="3" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "3") { echo "checked"; } } ?>>
                <label class="labelTercero" for="checkboxTercero">Tercero</label>
            </div>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxCuarto" value="4" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "4") { echo "checked"; } } ?>>
                <label class="labelCuarto" for="checkboxCuarto">Cuarto</label>
            </div>
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxQuinto" value="5" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "5") { echo "checked"; } } ?>>
                <label class="labelQuinto" for="checkboxQuinto">Quinto</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxSexto" value="6" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "6") { echo "checked"; } } ?>>
                <label class="labelSexto" for="checkboxSexto">Sexto</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkbox7" value="7" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "7") { echo "checked"; } } ?>>
                <label class="labelSeptimo" for="checkboxSeptimo">Septimo</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxOctavo" value="8" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "8") { echo "checked"; } } ?>>
                <label class="labelOctavo" for="checkboxOctavo">Octavo</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxNoveno" value="9" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "9") { echo "checked"; } } ?>>
                <label class="labelNoveno" for="checkboxNoveno">Noveno</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxDecimo" value="10" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "10") { echo "checked"; } } ?>>
                <label class="labelDecimo" for="checkboxDecimo">Decimo</label>
            </div>
        
            <div class="checkboxContainer">
                <input type="checkbox" name="gradosCursados[]" id="checkboxOnce" value="11" <?php foreach($gradosCursados as $gradoCursado) { if($gradoCursado == "11") { echo "checked"; } } ?>>
                <label class="labelOnce" for="checkboxOnce">Once</label>
            </div>

        </div>

        <input type="submit" class="button" value="Guardar">
        <?php
        if (isset($_POST['nombreGrupoOriginal'])) {
        ?>
        <input type='hidden' name='nombreGrupoOriginal' id='nombreGrupoOriginal' value="<?php echo $_POST['nombreGrupoOriginal'] ?>"
            size='30'>
        <?php
        }
        ?>
    </form>
</div>