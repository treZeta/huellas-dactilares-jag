<tr>
    <td><?php echo $estudiante['nombres']; ?></td>
    <td><?php echo $estudiante['apellidos']; ?></td>
    <td><?php echo $estudiante['id']; ?></td>
    <td><?php echo $estudiante['programaAlimentario']; ?></td>
    <td>
        <div class="actions-container">
            <form id="form-editar" method="POST" action="editStudent.php">
                <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $estudiante["id"]; ?> ">
                <div class="button-editar" onclick="submit()">
                    <i class="fas fa-user-edit"></i>
                    <input class="button-editar" type="submit" value="editar">
                </div>
            </form>

            <form id="form-eliminar" method="POST" action="includes/deleteStudent.php">
                <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $estudiante["id"]; ?>">
                <div class="button-eliminar" onclick="submit()">
                    <i class="fas fa-user-minus"></i>
                    <input class="button-eliminar" type="submit" value="eliminar">
                </div>
            </form>
        </div>
    </td>
</tr>