<table class="table ">
    <thead>
    <tr>
        <th>id</th>
        <th>Inicio</th>
        <th>Fin</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($temporadas as $temporada) {


        ?>
        <tr class="<?= @$_GET['creado'] == $temporada['id'] ? 'table-success' : '' ?>">
            <td><?= $temporada['id'] ?></td>
            <td><?= $temporada['inicio'] ?></td>
            <td><?= $temporada['fin'] ?></td>
            <td>
                <a href="<?= site_url('admin/temporada/' . $temporada['id']) ?>"
                   class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>

        <?php
    }

    ?>
    <tr>
        <form action="<?= site_url('api/crear_temporada') ?>" method="post">
            <td></td>
            <td><input type="date" name="inicio" id="crear_temporada_inicio" class="form-control form-control-sm"
                       placeholder="nombre" required></td>
            <td><input type="date" name="fin" id="crear_temporada_fin" class="form-control form-control-sm"
                       placeholder="nombre" required></td>
            <td>
                <input type="submit" class="btn btn-sm btn-success" value="Crear">
            </td>
        </form>
    </tr>
    </tbody>
</table>