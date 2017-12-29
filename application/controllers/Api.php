<?php

//maneja todas las llamadas a logica
class Api extends CI_Controller
{
    public function iniciar_sesion()
    {
        $usuario = $this->_autenticar($_POST['correo'], $_POST['password']);
        if ($usuario) {
            $_SESSION = $usuario;
            $_SESSION['creada'] = time();

            header('location: ' . site_url('landing/sesion_iniciada'));
        }
    }

    //Fucion privada para verificar el inicio de sesion o las credenciales de un usuario
    private function _autenticar($email, $password)
    {

        //Obtenemso el usuario de la base de datos (por correo)
        if ($usuario = $this->db->where('email', $email)->getOne('usuarios')) {

            //si el usuario existe y la constraseña es correcta, regresamos el usuario eliminando el hash del arreglo
            if (password_verify($password, $usuario['password'])) {
                unset($usuario['password']);
                return $usuario;
            } else {

                //hubo un error al autenticar
                return false;
            }
        } else {

            //el usuario no existe
            return false;
        }
    }

    public function crear_usuario()
    {
        // verificar que se reciba suficiente informacion par acrear un usuario
        $continuar = true;
        $continuar = isset($_POST['email']);
        $continuar = isset($_POST['password']);
        $continuar = isset($_POST['nombre']);

        //si no hay un nivel asignado, se asigna el 5 (minimos permisos)
        if ($_POST['permisos'] == '' || !isset($_POST['permisos'])) {
            $_POST['permisos'] = 5;
        }
        if ($_POST['maestro'] == '' || !isset($_POST['maestro'])) {
            $_POST['maestro'] = null;
        }

        if ($_POST['matricula'] == '' || !isset($_POST['matricula'])) {
            $_POST['matricula'] = null;
        }

        if ($continuar) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            var_dump($_POST);
            if ($this->db->insert('usuarios', $_POST)) {
                header('location: ' . site_url('admin/usuarios') . '?creado=' . $this->db->getInsertId());
            } else {
                echo 'hubo un error al insertar el usuario';
            }
        }
    }

    public function actualizar_usuario()
    {
        $usuarioId = $_POST['id'];
        unset($_POST['id']);
        if ($this->db->where('id', $usuarioId)->update('usuarios', $_POST)) {
            header('location: ' . site_url('admin/usuarios') . '?creado=' . $usuarioId);
        } else {
            echo 'Hubo algun error al actualiar el usuario';
        }
    }

    public function crear_maestro()
    {
        $usuario = $_POST['usuario'];
        unset($_POST['usuario']);
        print_r($_POST);

        if ($this->calificaciones->existe_matricula($_POST['matricula'])) {
            die('matricula existente');
        }

        if ($this->db->insert('maestros', $_POST)) {
            $maestroId = $this->db->getInsertId();
            if ($this->db->where('id', $usuario)->update('usuarios', ['maestro' => $maestroId])) {
                header('location: ' . site_url('admin/usuarios/' . $usuario));
            } else {
                ;
                die('hubo un problema al actualizar el usuario) - ' . $this->db->getLastError());
            }
        } else {
            die('error al crear maestro - ' . $this->db->getLastError());
        }

        die();
    }

    public function crear_materia()
    {
        if ($this->db->insert('materias', $_POST)) {
            header('location: ' . site_url('admin/materias') . '?creado=' . $this->db->getInsertId());
        } else {
            die('hubo algun error al crear la materia');
        }
    }

    public function actualizar_materia()
    {
        $materiaId = $_POST['id'];
        unset($_POST['id']);
        if ($this->db->where('id', $materiaId)->update('materias', $_POST)) {
            header('location: ' . site_url('admin/materias') . '?creado=' . $materiaId);
        } else {
            die('hubo un problema al actualizar la materia');
        }
    }

    public function crear_temporada()
    {
        if ($this->db->insert('temporadas', $_POST)) {
            header('location: ' . site_url('admin/temporadas') . '?creado=' . $this->db->getInsertId());
        }
    }

    public function actualizar_temporada()
    {
        $temporadaId = $_POST['id'];
        unset($_POST['id']);
        if ($this->db->where('id', $temporadaId)->update('temporadas', $_POST)) {
            header('location: ' . site_url('admin/temporadas') . '?creado=' . $temporadaId);
        } else {
            die('hubo un problema al actualizar la temporada');
        }
    }

    public function crear_alumno()
    {
        if ($this->db->insert('alumnos', $_POST)) {
            $alumnoId = $this->db->getInsertId();
            header('location: ' . site_url('admin/alumnos') . '?creado=' . $alumnoId);
        } else {
            die('hubo un error al crear alumno');
        }
    }

    public function actualizar_alumno()
    {
        $alumnoId = $_POST['id'];
        unset($_POST['id']);
        if ($this->db->where('id', $alumnoId)->update('alumnos', $_POST)) {
            header('location: ' . site_url('admin/alumnos') . '?creado=' . $alumnoId);
        }
    }

    public function calificar_alumno()
    {
        if ($this->db
            ->where('alumno', $_POST['alumno'])
            ->where('curso', $_POST['curso'])
            ->replace('calificaciones', $_POST['calificacion'])
        ) {
            header('location:' . site_url('admin/calificaciones/'));
        }
    }

    public function crear_curso()
    {
        if ($this->db->insert('cursos', $_POST)) {
            header('location: ' . site_url('admin/cursos') . '?creado=' . $this->db->getInsertId());
        } else {
            die('hubo un problema al crear curso');
        }
    }

    public function busqueda_alumno_curso()
    {
        $target = array_keys($_POST)[0];
        $toreturn = $this->calificaciones->busqueda_alumno_curso($target, $_POST[$target], $_POST['curso']);
        echo json_encode($toreturn);
    }

    public function asignar_curso()
    {
        if ($this->db->insert('calificaciones', $_POST)) {
            echo json_encode(['status' => 'ok', 'info' => $_POST]);
        } else {
            echo json_encode(['status' => 'no', 'info' => $_POST, 'error' => $this->db->getLastError()]);
        }
    }

}