<form action="<?= site_url('api/actualizar_temporada') ?>" method="post">
    <input type="hidden" name="id" value="<?= $temporada['id'] ?>">
    <input type="date" name="inicio" value="<?= $temporada['inicio'] ?>">
    <input type="date" name="fin" value="<?= $temporada['fin'] ?>">
    <input type="submit" value="Actualizar">

</form>