<ul>
    <li><a href="<?= site_url('admin/crear_usuario') ?>">Crear Usuario</a></li>
</ul>
<table class="table ">
    <thead>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>password</th>
        <th>nombre</th>
        <th>apellido</th>
        <th>apellido_m</th>
        <th>matricula</th>
        <th>permisos</th>
        <th>maestro</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($usuarios as $usuario) {

        if ($usuario['activo']) {

            if (strlen($usuario['matricula']) != 0 && $usuario['maestro'] != '') {
                $matricula = $usuario['matricula'];
                $maestro = '<span class="text-success">&check;</span>';
            } elseif ($usuario['matricula'] != '' && $usuario['maestro'] == '') {
                $matricula = $usuario['matricula'];
                $maestro = '<a href="' . site_url('admin/crear_maestro/' . $usuario['id']) . '" class="btn btn-sm btn-info">Crear</a>';
            } else {
                $matricula = '';
                $maestro = '';
            }

            ?>
            <tr class="<?= @$_GET['creado'] == $usuario['id'] ? 'table-success' : '' ?>">
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= substr($usuario['password'], 0, 10) ?>...</td>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['apellido'] ?></td>
                <td><?= $usuario['apellido_m'] ?></td>
                <td><?= $matricula ?></td>
                <td><?= $usuario['permisos'] ?></td>
                <td><?= $maestro ?></td>
                <td><a href="<?= site_url('admin/usuario/' . $usuario['id']) ?>"
                       class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>

            <?php
        }
    }

    ?>
    <tr>
        <form action="<?= site_url('api/crear_usuario') ?>" method="post">
            <td></td>
            <td><input type="email" name="email" id="crear_usuario_email" class="form-control form-control-sm"
                       placeholder="email" required></td>
            <td><input type="password" name="password" id="crear_usuario_password" class="form-control form-control-sm"
                       placeholder="password" value="pass" required></td>
            <td><input type="text" name="nombre" id="crear_usuario_nombre" class="form-control form-control-sm"
                       placeholder="nombre" required></td>
            <td><input type="text" name="apellido" id="crear_usuario_apellido" class="form-control form-control-sm"
                       placeholder="apellido" required></td>
            <td><input type="text" name="apellido_m" id="crear_usuario_apellido_m" class="form-control form-control-sm"
                       placeholder="apellido_m"></td>
            <td><input type="text" name="matricula" id="crear_usuario_matricula" class="form-control form-control-sm"
                       placeholder="matricula"></td>
            <td><input type="text" name="permisos" id="crear_usuario_permisos" class="form-control form-control-sm"
                       placeholder="permisos"></td>
            <td>
                <input type="text" name="maestro" id="crear_usuario_maestro" class="form-control form-control-sm"
                       placeholder="maestro">
            </td>
            <td>
                <input type="submit" class="btn btn-sm btn-success" value="Crear">
            </td>
        </form>
    </tr>
    </tbody>
</table>