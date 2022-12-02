
<?php

class Usuario
{
    //Variables o atributos
    var $id;
    var $nombre;
    var $apellido;
    var $edad;
    private $conectar;
    private $db;

    function __construct()
    {
        require_once 'Conectar.php';
        $this->id = 0;
        $this->nombre = '';
        $this->apellido = '';
        $this->edad = 0;
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conexion();
    }

    //Funciones o métodos
    function setId($id)
    {

        $this->id = $id;
    }

    function getId()
    {

        return $this->id;
    }

    function setNombre($nombre)
    {

        $this->nombre = $nombre;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setApellido($apellido)
    {

        $this->apellido = $apellido;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function setEdad($edad)
    {

        $this->edad = $edad;
    }

    function getEdad()
    {
        return $this->edad;
    }

    function save()
    {
        try {
            $query = "INSERT INTO usuarios (nombres, apellidos, edad) VALUES (?,?,?)";
            $save = $this->db->prepare($query);
            $save->execute([$this->nombre, $this->apellido, $this->edad]);
            return $save;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $this->db->error
                ]
            ]);
        }
    }

    function all()
    {
        try {
            $query = $this->db->query("SELECT * FROM usuarios;");
            $resultSet = [];
            while ($row = $query->fetch_assoc()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    function findNombre($nombre)
    {
        try {
            $query = "";
            $query = $this->db->query("SELECT * FROM usuarios WHERE nombres like '%$nombre%';");
            $resultSet = [];
            while ($row = $query->fetch_assoc()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    function find($id)
    {
        try {
            $query = "";
            $query = $this->db->query("SELECT * FROM usuarios WHERE id = $id;");
            $resultSet = [];
            while ($row = $query->fetch_assoc()) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    function update()
    {
        try {
            $query = "UPDATE usuarios SET nombres = ?,  apellidos = ?, edad = ? WHERE id = ?";
            $smtp = $this->db->prepare($query);
            $smtp->execute([$this->nombre, $this->apellido, $this->edad, $this->id]);
            return $smtp;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $this->db->error
                ]
            ]);
        }
    }

    function delete($id)
    {
        try {
            $query = "DELETE FROM usuarios WHERE id = ?";
            $smtp = $this->db->prepare($query);
            $smtp->execute([$id]);           
            return $smtp;
        } catch (Exception $e) {
            return json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }
}
