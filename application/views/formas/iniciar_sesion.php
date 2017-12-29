<div class="v-center h-100">
    <div class="card ">
        <form action="<?= site_url('api/iniciar_sesion') ?>" method="post">
            <div class="card-header">Iniciar Sesion</div>
            <div class="card-block">
                <h4 class="card-title">Bienvenido al sistema de calificaciones</h4>
                <div class="row">
                    <div class="col-12">
                        <label for="correo">Correo</label>
                    </div>
                    <div class="col-12">
                        <input type="text" name="correo" id="correo" placeholder="abc@123.com" class="form-control">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-12">
                        <label for="password">Contrase&ntilde;a</label>
                    </div>
                    <div class="col-12">
                        <input type="password" name="password" id="password" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-12 text-right">
                        <input type="submit" class="btn btn-success" value="Iniciar Sesion">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>