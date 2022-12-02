
<?php

class CampoExtra
{
    //Variables o atributos
    var $id;
    var $id_usuario;
    var $pais;
    var $ciudad;
    var $fecha_ini;
    var $fecha_fin;
    var $fecha_nacimiento;
    var $telefono;
    var $altura;
    var $correo;
    private $conectar;
    private $db;

    function __construct()
    {
        require_once 'Conectar.php';
        $this->id = 0;
        $this->id_usuario = 0;
        $this->pais = '';
        $this->ciudad = '';
        $this->fecha_ini = '';
        $this->fecha_fin = '';
        $this->fecha_nacimiento = '';
        $this->telefono = '';
        $this->altura = 0;
        $this->correo = '';
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conexion();
    }

    function save()
    {
        try {
            $query = "INSERT INTO usuarios (id_usuario, pais, ciudad, fecha_ini, fecha_fin, fecha_nacimiento, telefono, altura, correo) VALUES (?,?,?,?,?,?,?,?)";
            $save = $this->db->prepare($query);
            $save->execute([
                $this->id_usuario,
                $this->pais,
                $this->ciudad,
                $this->fecha_ini,
                $this->fecha_fin,
                $this->fecha_nacimiento,
                $this->telefono,
                $this->altura,
                $this->correo,
            ]);
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
            $query = $this->db->query("SELECT ce.*, CONCAT(u.nombres, ' ', u.apellidos) as usuario FROM campos_extra as ce INNER JOIN usuarios as u on u.id = ce.id_usuario ;");
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
            $query = "SELECT * FROM campos_extra WHERE id = ?";
            $smtp = $this->db->prepare($query);
            $smtp->execute([$id]);
            while ($row = $smtp->fetch_assoc()) {
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
            $query = "UPDATE campos_extra SET id_usuario = ?, pais = ?, ciudad = ?, fecha_ini = ?, fecha_fin = ?, fecha_nacimiento = ?, telefono = ?, altura = ?, correo = ? WHERE id = ?";
            $smtp = $this->db->prepare($query);
            $smtp->execute([
                $this->id_usuario,
                $this->pais,
                $this->ciudad,
                $this->fecha_ini,
                $this->fecha_fin,
                $this->fecha_nacimiento,
                $this->telefono,
                $this->altura,
                $this->correo,
                $this->id
            ]);
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
            $query = "DELETE FROM campos_extra WHERE id = ?";
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
