<?php

class Calificaciones
{
    public $db;

    public function __construct()
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . '../../MysqliDb.php';
        $this->db = new MysqliDb(DBHOST, DBUSER, DBPASS, DBDB);

    }

    public function get_usuarios($master = false)
    {
        return $this->db->where('permisos', '0', $master ? '>' : null)->get('usuarios');
    }

    public function get_usuario($id)
    {
        return $this->db->where('id', $id)->getOne('usuarios');
    }


    public function existe_matricula($matricula)
    {
        return count($this->db->where('matricula', $matricula)->get('maestros')) > 0;
    }

    public function get_materias()
    {
        return $this->db->get('materias');
    }

    public function get_materia($materiaId)
    {
        return $this->db->where('id', $materiaId)->getOne('materias');
    }

    public function get_temporadas()
    {
        return $this->db->get('temporadas');
    }

    public function get_temporada($temporadaId)
    {
        return $this->db->where('id', $temporadaId)->getOne('temporadas');
    }

    public function get_alumnos()
    {
        return $this->db->get('alumnos');
    }

    public function get_alumno($alumnoId)
    {
        return $this->db->where('id', $alumnoId)->getOne('alumnos');
    }

    public function get_maestros()
    {
        return $this->db->get('maestros');
    }

    public function get_maestro($maestroId)
    {
        return $this->db->where('id', $maestroId)->getOne('maestros');
    }

    public function get_cursos()
    {
        $relCurso = $this->db->get('cursos');
        $cursos = [];
        foreach ($relCurso as $curso) {
            $temp['curso'] = $this->get_curso($curso['id']);
            $temp['alumnos'] = $this->get_alumnos_por_curso($curso['id']);
            $cursos[$curso['id']] = $temp;
        }
        return $cursos;
    }

    public function get_curso($cursoId)
    {
        return $this->db->where('cursos.id', $cursoId)
            ->join('materias', 'cursos.materia = materias.id')
            ->join('maestros', 'cursos.maestro = maestros.id')
            ->join('temporadas', 'cursos.temporada = temporadas.id')
            ->getOne('cursos');
    }

    public function get_alumnos_por_curso($cursoId)
    {
        return $this->db
            ->where('curso', $cursoId)
            ->join('alumnos', 'calificaciones.alumno = alumnos.id')
            ->get('calificaciones');
    }

    public function busqueda_alumno($target, $valor)
    {
        return $this->db->where("$target REGEXP '$valor'")->get('alumnos');
    }

    public function busqueda_alumno_curso($target, $valor, $curso)
    {
        $blacklist = $this->db->where('curso', $curso)->get('calificaciones');
        $b = [];
        foreach ($blacklist as $alumno) {
            $b[] = $alumno['alumno'];
        }

        $notIn = join(',', $b);
        return $this->db->where('id not in (' . $notIn . ')')->where("$target REGEXP '$valor'")->get('alumnos');
    }
}