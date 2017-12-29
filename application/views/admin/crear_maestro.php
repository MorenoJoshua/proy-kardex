<form action="<?= site_url('api/crear_maestro') ?>" method="post">
    <input type="text" name="usuario" id="crear_maestro_usuario" placeholder="usuario" value="<?= $usuario['id'] ?>">
    <input type="text" name="nombre" id="crear_maestro_nombre" placeholder="nombre" value="<?= $usuario['nombre'] ?>">
    <input type="text" name="apellido" id="crear_maestro_apellido" placeholder="apellido"
           value="<?= $usuario['apellido'] ?>">
    <input type="text" name="matricula" id="crear_maestro_matricula"
           placeholder="matricula" value="<?= $usuario['matricula'] ?>">
    <input type="submit" value="Confirmar informacion">
</form>