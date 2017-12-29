<?php

class Reset extends CI_Controller
{

    // para resetear el password de el "usuario maestro"
    public function index()
    {
        echo $this->db->where('id', '0')->update('usuarios', ['password' => password_hash('123tamarindo', PASSWORD_DEFAULT)]) ? ':)' : ':(';
    }

}