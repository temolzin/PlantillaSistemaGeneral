<?php
    class UsuarioDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO cliente values (null, :id_empresa, :id_zona, :imagen, :cuit, :nombre, :apellido, :email)');
            $query->execute(
                [
                    ':id_empresa' => $data['id_empresa'],
                    ':id_zona' => $data['id_zona'],
                    ':imagen' => $data['imagen'],
                    ':cuit' => $data['cuit'],
                    ':nombre' => $data['nombre'],
                    ':apellido' => $data['apellido'],
                    ':email' => $data['email'],
                ]
            );
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare(
                'UPDATE cliente SET 
                           id_empresa = :id_empresa, 
                           id_zona = :id_zona, 
                           imagen = :imagen, 
                           cuit = :cuit, 
                           email = :email, 
                           nombre = :nombre, 
                           apellido = :apellido
                       WHERE id_cliente = :id_cliente'
            );
            $query->execute(
                [
                    ':id_cliente' => $data['id_cliente'],
                    ':id_empresa' => $data['id_empresa'],
                    ':id_zona' => $data['id_zona'],
                    ':imagen' => $data['imagen'],
                    ':cuit' => $data['cuit'],
                    ':nombre' => $data['nombre'],
                    ':apellido' => $data['apellido'],
                    ':email' => $data['email']
                ]
            );
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM cliente where id_cliente = :id_cliente');
            $query->execute([':id_cliente' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'clienteDTO.php';
            $query = "SELECT * FROM cliente c INNER JOIN empresa e ON c.id_empresa = e.id_empresa INNER JOIN zona z ON c.id_zona = z.id_zona";
            $objClientes = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->idCliente = $value['id_cliente'];
                $cliente->idEmpresa = $value['id_empresa'];
                $cliente->idZona = $value['id_zona'];
                $cliente->imagen = $value['imagen'];
                $cliente->cuit = $value['cuit'];
                $cliente->email = $value['email'];
                $cliente->nombre = $value[5];
                $cliente->apellido = $value['apellido'];
                $cliente->nombreEmpresa = $value[9];
                $cliente->nombreZona = $value[11];
                $objClientes['data'][] = $cliente;
            }
            echo json_encode($objClientes, JSON_UNESCAPED_UNICODE);
        }

        public function readEmpresa()
        {
            require_once 'empresaDTO.php';
            $query = "SELECT * FROM empresa";
            $empresaArray = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $empresaDTO = new EmpresaDTO();
                $empresaDTO->idEmpresa = $value['id_empresa'];
                $empresaDTO->nombre = $value['nombre'];
                $empresaArray[] = $empresaDTO;
            }
            echo json_encode($empresaArray, JSON_UNESCAPED_UNICODE);
        }

        public function readZona()
        {
            require_once 'zonaDTO.php';
            $query = "SELECT * FROM zona";
            $empresaArray = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $zonaDTO = new ZonaDTO();
                $zonaDTO->idZona = $value['id_zona'];
                $zonaDTO->nombre = $value['nombre'];
                $empresaArray[] = $zonaDTO;
            }
            echo json_encode($empresaArray, JSON_UNESCAPED_UNICODE);
        }
    }
?>
