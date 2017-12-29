<?php

class Admin extends CI_Controller
{

    public function usuarios()
    {
        $data['usuarios'] = $this->calificaciones->get_usuarios(true);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/usuarios', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }

    public function usuario($usuarioId)
    {
        $data['usuario'] = $this->calificaciones->get_usuario($usuarioId);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/usuario', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }

    public function crear_maestro($usuarioId)
    {
        $data['usuario'] = $this->calificaciones->get_usuario($usuarioId);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/crear_maestro', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }

    public function materias()
    {
        $data['materias'] = $this->calificaciones->get_materias();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/materias', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }

    public function materia($materiaId)
    {
        $data['materia'] = $this->calificaciones->get_materia($materiaId);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/materia', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }

    public function temporadas()
    {
        $data['temporadas'] = $this->calificaciones->get_temporadas();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/temporadas', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function temporada($temporadaid)
    {
        $data['temporada'] = $this->calificaciones->get_temporada($temporadaid);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/temporada', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function alumnos()
    {
        $data['alumnos'] = $this->calificaciones->get_alumnos();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/alumnos', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function alumno($alumnoid)
    {
        $data['alumno'] = $this->calificaciones->get_alumno($alumnoid);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/alumno', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function cursos()
    {
        $data['cursos'] = $this->calificaciones->get_cursos();
        $data['temporadas'] = $this->calificaciones->get_temporadas();
        $data['maestros'] = $this->calificaciones->get_maestros();
        $data['materias'] = $this->calificaciones->get_materias();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/cursos', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function curso($cursoid)
    {
        $data['curso'] = $this->calificaciones->get_curso($cursoid);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/curso', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function asignar_alumnos($cursoId)
    {
        $data['alumnos'] = $this->calificaciones->get_alumnos_por_curso($cursoId);
        $data['curso'] = $cursoId;
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/asignar_alumnos', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }
}