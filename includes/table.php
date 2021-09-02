<?php

include 'db.php';

class table extends db
{
    private $paginaActual;
    private $totalPaginas;
    private $numeroDeRegistros;
    private $resultadosPorPagina;
    private $indice;
    private $entidad;
    private $error = false;

    public function __construct($resultadosPorPagina, $entidad)
    {
        parent::__construct();
        $this->resultadosPorPagina = $resultadosPorPagina;
        $this->indice = 0;
        $this->entidad = $entidad;
        $this->paginaActual = 1;

        $this->calcularPaginas();
    }

    public function calcularPaginas(){

        if($this->entidad == "estudiantes"){
            $query = $this->connect()->query("SELECT COUNT(*) AS totalRegistros FROM estudiantes");
        } else if($this->entidad == "grupos"){
            $query = $this->connect()->query("SELECT COUNT(*) AS totalRegistros FROM grupos");
        } else if($this->entidad == "programasAlimentarios"){
            $query = $this->connect()->query("SELECT COUNT(*) AS totalRegistros FROM programasAlimentarios");
        }

        $this->numeroDeRegistros = $query->fetch(PDO::FETCH_OBJ)->totalRegistros;
        $this->totalPaginas = ceil($this->numeroDeRegistros / $this->resultadosPorPagina);

        if (isset($_GET['pagina'])) {

            if (is_numeric($_GET['pagina'])) {
                if ($_GET['pagina'] > 0 && $_GET['pagina'] <= $this->totalPaginas) {
                    $this->paginaActual = $_GET['pagina'];
                    $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
                } else {
                    echo "No se puede acceder a esta pagina";
                    $this->error = true;
                }
            } else {
                echo "La pagina debe ser un numero";
                $this->error = true;
            }
        }
    }

    public function mostrarEstudiantes()
    {
        if (!$this->error) {

            $query = $this->connect()->prepare("SELECT nombres, apellidos, idEstudiante, idHuellas, programaAlimentario, nombreGrupo, genero  FROM estudiantes LIMIT :indice, :resultadosPorPagina");
            $query->execute(array(":indice" => $this->indice, ":resultadosPorPagina" => $this->resultadosPorPagina));
?>
            <table>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>ID</th>
                    <th>Programa Alimentario</th>
                    <th>Nombre del grupo</th>
                    <th>Genero</th>
                    <th>Acciones</th>
                </tr>
                <?php
                foreach ($query as $estudiante) {
                    include 'views/vistaEstudiante.php';
                }
                ?>
            </table>
        <?php
        } else {
            echo "Hubo un error";
        }
    }

    public function mostrarGrupos()
    {
        if (!$this->error) {

            $query = $this->connect()->prepare("SELECT nombreGrupo, gradosCursados  FROM grupos LIMIT :indice, :resultadosPorPagina");
            $query->execute(array(":indice" => $this->indice, ":resultadosPorPagina" => $this->resultadosPorPagina));
        ?>
            <table>
                <tr>
                    <th>Nombres del grupo</th>
                    <th>Grados cursados</th>
                    <th>Acciones</th>
                </tr>
                <?php
                foreach ($query as $grupo) {
                    include 'views/vistaGrupo.php';
                }
                ?>
            </table>
        <?php
        } else {
            echo "Hubo un error";
        }
    }

    public function mostrarProgramasAlimentarios()
    {
        if (!$this->error) {

            $query = $this->connect()->prepare("SELECT nombreProgramaAlimentario  FROM programasAlimentarios LIMIT :indice, :resultadosPorPagina");
            $query->execute(array(":indice" => $this->indice, ":resultadosPorPagina" => $this->resultadosPorPagina));
        ?>
            <table>
                <tr>
                    <th>Nombre del Programa Alimentario</th>
                    <th>Acciones</th>
                </tr>
                <?php
                foreach ($query as $programaAlimentario) {
                    include 'views/vistaProgramaAlimentario.php';
                }
                ?>
            </table>
        <?php
        } else {
            echo "Hubo un error";
        }
    }

    public function mostrarPaginas()
    {
        ?>

        <ul>
            <?php
            for ($i = 1; $i <= $this->totalPaginas; $i++) {
            ?>
                <li <?php if (isset($_GET['pagina'])) {
                        if ($_GET['pagina'] == $i) {
                            echo "class='paginaActual'";
                        }
                    } else if ($i == 1) {
                        echo "class='paginaActual'";
                    } ?>>
                    <a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
            <?php
            }
            ?>
        </ul>

<?php
    }
}

?>