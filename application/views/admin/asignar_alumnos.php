<table class="table ">
    <thead>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>
    </thead>

    <tbody id="alumnos">
    <?php
    foreach ($alumnos as $alumno) {
//        $alumno = $alumnoInfo['alumno'];
        print_r($alumno);
        ?>
        <tr class="<?= @$_GET['creado'] == $alumno['id'] ? 'table-success' : '' ?>">
            <td><?= $alumno['id'] ?></td>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['apellido'] ?></td>
            <td><?= $alumno['matricula'] ?></td>
            <td>
                <a href="<?= site_url('admin/asignar_alumnos/') . $alumno['id'] ?>">Asignar Alumnos</a>
            </td>

            <td>
                <a href="<?= site_url('admin/alumno/' . $alumno['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>

        <?php
    }

    ?>
    <form action="<?= site_url('api/crear_alumno') ?>" method="post" id="forma_busqueda">
        <tr>
            <td></td>
            <td>
                <input type="text" name="nombre" placeholder="nombre" class="busqueda">
            </td>
            <td>
                <input type="text" name="apellido" placeholder="apellido" class="busqueda">
            </td>
            <td>
                <input type="text" name="matricula" placeholder="matricula" class="busqueda">
            </td>
        </tr>
    </form>
    </tbody>
    <tbody id="resultados"></tbody>
</table>
<script>
    $('.busqueda').on('keyup', function (e) {
        e.preventDefault();
        let valor = $(this).val();
        let target = $(this).attr('name');

        if (valor.length >= 3) {
            console.log(valor, target);
            let topost = `${target}=${valor}\&curso=<?=$curso?>`;
            console.log(topost);
            $.post('<?=site_url('api/busqueda_alumno_curso/')?>', topost, function (data) {
                data = JSON.parse(data);
                let toInsert = '';
                data.forEach(function (i, k) {
                    toInsert += lineaTemplate(i);
                });
                $('#resultados').html(toInsert);
            });

        }
    });

    function lineaTemplate(json) {
        return `<tr id="linea${json.id}">
        <td>${json.id}</td>
        <td>${json.nombre}</td>
        <td>${json.apellido}</td>
        <td>${json.matricula}</td>
        <td>
            <button onclick="agregar(${json.id}, <?=$curso?>)">Asignar</button>
        </td>
    </tr>`
    }

    function agregar(alumnoId, cursoId) {
        $.post('<?=site_url('api/asignar_curso')?>', `alumno=${alumnoId}&curso=${cursoId}`, function (data) {
            data = JSON.parse(data);
            if (data.status === 'ok') {
                let linea = $('#linea' + alumnoId);
                let lineaHtml = linea.html();
                linea.remove();
                $('#alumnos').append(lineaHtml);
            } else {
                console.error(data);
//                alert('error al asignar y asi');
            }
        });
    }
</script>
