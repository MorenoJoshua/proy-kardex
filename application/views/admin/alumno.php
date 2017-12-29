<form action="<?= site_url('api/actualizar_alumno') ?>" method="post">
    <input type="hidden" name="id" value="<?= $alumno['id'] ?>">
    <input type="text" name="nombre" value="<?= $alumno['nombre'] ?>">
    <input type="text" name="apellido" value="<?= $alumno['apellido'] ?>">
    <input type="text" name="matricula" value="<?= $alumno['matricula'] ?>">
    <input type="submit" value="Actualizar">

</form>