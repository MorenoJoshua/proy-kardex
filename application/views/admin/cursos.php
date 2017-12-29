<pre class="row">
<?php

print_r($cursos);
//print_r($temporadas);
//print_r($maestros);
//print_r($materias);


?>
</pre>

<div class="row">
    <table class="table ">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($cursos as $cursoId => $cursoInfo) {
            $curso = $cursoInfo['curso'];
            $curso['cursoId'] = $cursoId;
            print_r($curso);
            ?>
            <tr class="<?= @$_GET['creado'] == $curso['id'] ? 'table-success' : '' ?>">
                <td><?= $curso['id'] ?></td>
                <td><?= $curso['materia'] ?></td>
                <td><?= $curso['maestro'] ?></td>
                <td><?= $curso['temporada'] ?></td>
                <td><?= $curso['nombre'] ?></td>
                <td><?= $curso['apellido'] ?></td>
                <td><?= $curso['matricula'] ?></td>
                <td><?= $curso['inicio'] ?></td>
                <td><?= $curso['fin'] ?></td>
                <td>
                    <a href="<?= site_url('admin/asignar_alumnos/') . $curso['cursoId'] ?>">Asignar Alumnos</a>
                </td>

                <td>
                    <a href="<?= site_url('admin/curso/' . $curso['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>

            <?php
        }

        ?>
        <!--<tr>
            <form action="<? /*= site_url('api/crear_curso') */ ?>" method="post">
                <td></td>
                <td>
                    <input type="text" name="nombre" id="crear_curso_nombre" class="form-control form-control-sm"
                           placeholder="nombre" required>
                </td>
                <td>
                    <input type="text" name="apellido" id="crear_curso_apellido" class="form-control form-control-sm"
                           placeholder="apellido" required>
                </td>
                <td>
                    <input type="text" name="matricula" id="crear_curso_matricula" class="form-control form-control-sm"
                           placeholder="matricula" required>
                </td>
                <td>
                    <input type="submit" class="btn btn-sm btn-success" value="Crear">
                </td>
            </form>
        </tr>-->
        </tbody>
    </table>
</div>
<div class="row">
    <form action="<?= site_url('api/crear_curso') ?>" method="post">
        <select name="maestro" id="maestro" required>
            <?= maestrosASelect($maestros, 'id', 'nombre') ?>
        </select>
        <select name="materia" id="materias" required>
            <?= materiasASelect($materias, 'id', 'nombre') ?>
        </select>
        <select name="temporada" id="temporadas" required>
            <?= temporadasASelect($temporadas, 'id', 'nombre') ?>
        </select>
        <input type="submit" value="crear">
    </form>
</div>