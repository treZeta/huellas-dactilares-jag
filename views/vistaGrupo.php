<tr>
    <td><?php echo $grupo['nombreGrupo']; ?></td>
    <td><?php echo $grupo['gradosCursados']; ?></td>
    <td>
        <div class="actions-container">
            <form id="form-editar" method="POST" action="editarGrupo.php">
                <input type="hidden" id="nombreGrupo" name="nombreGrupoOriginal" value="<?php echo $grupo["nombreGrupo"]; ?> ">
                <div class="button-editar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-edit"></i>
                    <input class="button-editar" type="submit" value="editar">
                </div>
            </form>

            <form id="form-eliminar" method="POST" action="includes/eliminarGrupo.php">
                <input type="hidden" id="nombreGrupo" name="nombreGrupoOriginal" value="<?php echo $grupo["nombreGrupo"]; ?>">
                <div class="button-eliminar" onclick="this.parentNode.submit()">
                    <i class="fas fa-user-minus"></i>
                    <input class="button-eliminar" type="submit" value="eliminar">
                </div>
            </form>
        </div>
    </td>
</tr>