<?php
require_once 'model/Usuario.php';
require_once 'model/CampoExtra.php';
class usuarioController
{
    public $vista = '';

    public function index()
    {
        $obj = new Usuario();
        $usuarios = $obj->all();
        $this->vista = 'index';
        return $usuarios;
    }

    public function crearUsuario()
    {
        $this->vista = 'crearUsuario';
        return [];
    }

    public function busqueda()
    {
        $this->vista = 'buscarUsuario';
        return [];
    }

    public function registrarUsuario()
    {
        $obj = new Usuario();
        $obj->nombre = $_POST['nombres'];
        $obj->apellido = $_POST['apellidos'];
        $obj->edad = $_POST['edad'];
        $res = $obj->save();
        if ($res) {
            $this->vista = 'crearUsuario';
            return [];
        } else {
            return ["mensaje" => "No se puedo guardar el registro"];
        }
    }

    public function buscarUsuario()
    {
        $obj = new Usuario();
        $res = $obj->findNombre($_POST['nombre']);
        $this->vista = 'buscarUsuario';
        return $res;
    }

    public function editarUsuario()
    {
        $obj = new Usuario();
        $res = $obj->find($_GET['id']);
        $this->vista = 'editarUsuario';
        return $res;
    }

    public function actilizarUsuario()
    {
        $obj = new Usuario();
        $obj->id = $_POST['id'];
        $obj->nombre = $_POST['nombres'];
        $obj->apellido = $_POST['apellidos'];
        $obj->edad = $_POST['edad'];
        $res = $obj->update();
        if ($res) {
            $this->vista = 'crearUsuario';
            return [];
        } else {
            return ["mensaje" => "No se puedo actulizar el registro"];
        }
    }

    public function eliminarUsuario()
    {
        $obj = new Usuario();
        $res = $obj->delete($_POST['id']);
        if ($res) {
            return ["mensaje" => "Registro eliminado satisfactoriamnte"];
        } else {
            return ["mensaje" => "No se puedo borrar el registro"];
        }
    }

}
