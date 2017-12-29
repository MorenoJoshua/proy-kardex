<table class="table ">
    <thead>
    <tr>
        <th>id</th>
        <th>Nombre</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($alumnos as $alumno) {


        ?>
        <tr class="<?= @$_GET['creado'] == $alumno['id'] ? 'table-success' : '' ?>">
            <td><?= $alumno['id'] ?></td>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['apellido'] ?></td>
            <td><?= $alumno['matricula'] ?></td>
            <td>
                <a href="<?= site_url('admin/alumno/' . $alumno['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>

        <?php
    }

    ?>
    <form action="<?= site_url('api/crear_alumno') ?>" method="post">
        <tr>
            <td></td>
            <td>
                <input type="text" name="nombre" id="crear_alumno_nombre" class="form-control form-control-sm"
                       placeholder="nombre" required>
            </td>
            <td>
                <input type="text" name="apellido" id="crear_alumno_apellido" class="form-control form-control-sm"
                       placeholder="apellido" required>
            </td>
            <td>
                <input type="text" name="matricula" id="crear_alumno_matricula" class="form-control form-control-sm"
                       placeholder="matricula" required>
            </td>
            <td>
                <input type="submit" class="btn btn-sm btn-success" value="Crear">
            </td>
        </tr>
    </form>
    </tbody>
</table>