<?php
    class UsuarioDAO extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function login($data)
        {
            require_once 'usuarioDTO.php';
            $query = $this->db->consultar("SELECT * FROM usuario WHERE email = '" . $data['username'] . "' AND password = AES_ENCRYPT('" . $data['password'] . "', 'diprem')");

            if($query != null) {
                foreach ($query as $key => $value) {
                    session_start();
                    $_SESSION['id_empresa'] = $value['id_empresa'];
                    $_SESSION['id_usuario'] = $value['id_usuario'];
                    $_SESSION['cuit'] = $value['cuit'];
                    $_SESSION['nombre'] = $value['nombre'];
                    $_SESSION['apellido'] = $value['apellido'];
                    $_SESSION['email'] = $value['email'];
                }
                echo true;
            } else {
                session_start();
                session_destroy();
                echo false;
            }
        }
    }
?>
