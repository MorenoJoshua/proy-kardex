<form action="<?= site_url('api/actualizar_usuario') ?>" method="post">
    <input type="hidden" value="<?= $usuario['id'] ?>" name="id">
    <div class="row pt-3">
        <div class="col-6">
            <div class="col-12">
                <label for="email">Correo</label>
            </div>
            <div class="col-12">
                <input type="text" name="email" id="email" value="<?= $usuario['email'] ?>" class="form-control ">
            </div>
        </div>
        <div class="col-6">
            <div class="col-12">
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-12">
                <input type="text" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" class="form-control ">
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-6">
            <div class="col-12">
                <label for="apellido">Apellido Paterno</label>
            </div>
            <div class="col-12">
                <input type="text" name="apellido" id="apellido" value="<?= $usuario['apellido'] ?>"
                       class="form-control ">
            </div>
        </div>
        <div class="col-6">
            <div class="col-12">
                <label for="apellido_m">Apellido Materno</label>
            </div>
            <div class="col-12">
                <input type="text" name="apellido_m" id="apellido_m" value="<?= $usuario['apellido_m'] ?>"
                       class="form-control ">
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-6">
            <div class="col-12">
                <label for="matricula">Matricula</label>
            </div>
            <div class="col-12">
                <input type="text" name="matricula" id="matricula" value="<?= $usuario['matricula'] ?>"
                       class="form-control "<?= $usuario['matricula'] ? ' disabled' : '' ?>>
            </div>
        </div>
        <div class="col-6">
            <div class="col-12">
                <label for="permisos">Permisos</label>
            </div>
            <div class="col-12">
                <input type="text" name="permisos" id="permisos" value="<?= $usuario['permisos'] ?>"
                       class="form-control ">
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-6"></div>
    </div>
    <div class="row pt-3">
        <div class="col-12 text-right">
            <input type="submit" class="btn btn-sm btn-success" value="Actualizar">
        </div>
    </div>
</form>