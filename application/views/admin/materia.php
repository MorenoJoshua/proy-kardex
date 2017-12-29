<form action="<?= site_url('api/actualizar_materia') ?>" method="post">
    <input type="hidden" name="id" value="<?= $materia['id'] ?>">
    <input type="text" name="nombre" value="<?= $materia['nombre'] ?>">
    <input type="submit" value="Actualizar">

</form>