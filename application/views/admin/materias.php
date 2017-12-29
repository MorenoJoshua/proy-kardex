<table class="table ">
    <thead>
    <tr>
        <th>id</th>
        <th>Nombre</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($materias as $materia) {


        ?>
        <tr class="<?= @$_GET['creado'] == $materia['id'] ? 'table-success' : '' ?>">
            <td><?= $materia['id'] ?></td>
            <td><?= $materia['nombre'] ?></td>
            <td>
                <a href="<?= site_url('admin/materia/' . $materia['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>

        <?php
    }

    ?>
    <tr>
        <form action="<?= site_url('api/crear_materia') ?>" method="post">
            <td></td>
            <td><input type="text" name="nombre" id="crear_materia_nombre" class="form-control form-control-sm"
                       placeholder="nombre" required></td>
            <td>
                <input type="submit" class="btn btn-sm btn-success" value="Crear">
            </td>
        </form>
    </tr>
    </tbody>
</table>