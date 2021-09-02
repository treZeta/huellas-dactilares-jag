<tr>
    <td><?php echo $programaAlimentario['nombreProgramaAlimentario']; ?></td>
    <td>
        <div class="actions-container">
            <form id="form-editar" method="POST" action="editarProgramaAlimentario.php">
                <input type="hidden" id="nombreProgramaAlimentario" name="nombreProgramaAlimentarioOriginal" value="<?php echo $programaAlimentario["nombreProgramaAlimentario"]; ?> ">
                <div class="button-editar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-edit"></i>
                    <input class="button-editar" type="submit" value="editar">
                </div>
            </form>

            <form id="form-eliminar" method="POST" action="includes/eliminarProgramaAlimentario.php">
                <input type="hidden" id="nombreProgramaAlimentario" name="nombreProgramaAlimentarioOriginal" value="<?php echo $programaAlimentario["nombreProgramaAlimentario"]; ?>">
                <div class="button-eliminar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-minus"></i>
                    <input class="button-eliminar" type="submit" value="eliminar">
                </div>
            </form>
        </div>
    </td>
</tr>