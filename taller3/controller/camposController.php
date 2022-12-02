<?php
require_once 'model/Usuario.php';
require_once 'model/CampoExtra.php';
class camposController
{
    public $vista = '';

    public function index()
    {
        $obj = new CampoExtra();
        $usuarios = $obj->all();
        $this->vista = 'indexCampos';
        return $usuarios;
    }

    public function crearCampos()
    {
        $this->vista = 'crearCampos';
        $obj = new Usuario();
        $usuarios = $obj->all();
        return $usuarios;
    }

    public function registrarCampoExtra()
    {
        $obj = new CampoExtra();
        $obj->id_usuario = $_POST['usuario'];
        $obj->pais = $_POST['pais'];
        $obj->fecha_ini = $_POST['fecha_ini'];
        $obj->fecha_fin = $_POST['fecha_fin'];
        $obj->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $obj->telefono = $_POST['telefono'];
        $obj->altura = $_POST['altura'];
        $obj->correo = $_POST['correo'];
        $res = $obj->save();
        return $res;
    }

    public function buscarCampoExtra()
    {
        $obj = new CampoExtra();
        $res = $obj->find($_GET['id']);
        return $res;
    }

    public function actilizarCampoExtra()
    {
        $obj = new CampoExtra();
        $obj->id_usuario = $_POST['id_usuario'];
        $obj->pais = $_POST['pais'];
        $obj->fecha_ini = $_POST['fecha_ini'];
        $obj->fecha_fin = $_POST['fecha_fin'];
        $obj->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $obj->telefono = $_POST['telefono'];
        $obj->altura = $_POST['altura'];
        $obj->correo = $_POST['correo'];
        $res = $obj->update();
        if ($res) {
            return ["mensaje" => "Registro actializado satisfactoriamnte"];
        } else {
            return ["mensaje" => "No se puedo actulizar el registro"];
        }
    }

    public function eliminarCampoExtra()
    {
        $obj = new CampoExtra();
        $res = $obj->delete($_GET['id']);
        if ($res) {
            return ["mensaje" => "Registro eliminado satisfactoriamnte"];
        } else {
            return ["mensaje" => "No se puedo borrar el registro"];
        }
    }
}
