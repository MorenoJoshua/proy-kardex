<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller
{

//    public function __construct()
//    {
//        if (!isset($_SESSION['usuario'])) {
//            $this->index();
//        } else {
//            $this->sist();
//        }
//    }

    public function index()
    {
        $this->load->view('templates/header');

        $this->load->view('formas/iniciar_sesion');
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');
    }

    public function usuario_creado()
    {

    }

    public function sesion_iniciada()
    {
        $data['links'] = [
            [
                'texto' => 'administrar usuarios',
                'url' => site_url('admin/usuarios')
            ],
            [
                'texto' => 'administrar materias',
                'url' => site_url('admin/materias')
            ],
            [
                'texto' => 'administrar temporadas',
                'url' => site_url('admin/temporadas')
            ],
            [
                'texto' => 'administrar alumnos',
                'url' => site_url('admin/alumnos')
            ],
            [
                'texto' => 'administrar cursos',
                'url' => site_url('admin/cursos')
            ],
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
        $this->load->view('templates/fin');

    }


    public function sist()
    {
        $this->sesion_iniciada();
    }

}
