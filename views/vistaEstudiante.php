<tr>
    <td><?php echo $estudiante['nombres']; ?></td>
    <td><?php echo $estudiante['apellidos']; ?></td>
    <td><?php echo $estudiante['idEstudiante']; ?></td>
    <td><?php echo $estudiante['programaAlimentario']; ?></td>
    <td><?php if ($estudiante['nombreGrupo'] == null) { echo "No tiene"; } else { echo $estudiante['nombreGrupo']; } ; ?></td>
    <td><?php echo $estudiante['genero']; ?></td>
    <td>
        <div class="actions-container">
            <form id="form-editar" method="POST" action="editStudent.php">
                <input type="hidden" id="idEstudianteOriginal" name="idEstudianteOriginal" value="<?php echo $estudiante["idEstudiante"]; ?>">
                <input type="hidden" id="idHuellasOriginal" name="idHuellasOriginal" value="<?php echo $estudiante["idHuellas"]; ?>">
                <div class="button-editar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-edit"></i>
                    <input class="button-editar" type="submit" value="editar">
                </div>
            </form>

            <form id="form-eliminar" method="POST" action="includes/deleteStudent.php">
                <input type="hidden" id="idEstudianteOriginal" name="idEstudianteOriginal" value="<?php echo $estudiante["idEstudiante"]; ?>">
                <input type="hidden" id="idHuellasOriginal" name="idHuellasOriginal" value="<?php echo $estudiante["idHuellas"]; ?>">
                <div class="button-eliminar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-minus"></i>
                    <input class="button-eliminar" type="submit" value="eliminar">
                </div>
            </form>
        </div>
    </td>
</tr>