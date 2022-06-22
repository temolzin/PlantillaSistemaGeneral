<?php
    class Cliente extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('cliente/index');
        }

        function insert() {
            $nombreImagen = 'generica.png';
            if($_FILES["imagen_cliente"]["name"] != null) {
                $imagen = $_FILES["imagen_cliente"];
                $nombreImagen = $imagen["name"];

                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $_POST['email'];
                $carpeta = "public/img/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);
                }
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cuit = $_POST['cuit'];
            $empresa = $_POST['empresa'];
            $zona = $_POST['zona'];
            $email = $_POST['email'];

            $data = array(
                'id_empresa' => $empresa,
                'id_zona' => $zona,
                'imagen' => $nombreImagen,
                'cuit' => $cuit,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email'=>$email
            );

            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO->insert($data);
        }

        function update() {
            $nombreImagen = 'generica.png';
            if($_FILES["imagen_cliente_actualizar"]["name"] != null) {
                $imagen = $_FILES["imagen_cliente_actualizar"];
                $nombreImagen = $imagen["name"];

                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $_POST['email_actualizar'];
                $carpeta = "public/img/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);
                }
            }

            $idCliente = $_POST['id_cliente_actualizar'];
            $nombre = $_POST['nombre_actualizar'];
            $apellido = $_POST['apellido_actualizar'];
            $cuit = $_POST['cuit_actualizar'];
            $empresa = $_POST['empresa_actualizar'];
            $zona = $_POST['zona_actualizar'];
            $email = $_POST['email_actualizar'];

            $data = array(
                'id_cliente' => $idCliente,
                'id_empresa' => $empresa,
                'id_zona' => $zona,
                'imagen' => $nombreImagen,
                'cuit' => $cuit,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email'=>$email
            );

            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO->update($data);
        }

        function delete(){
            $matricula = $_POST['idEliminarCliente'];

            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO->delete($matricula);
        }

        function read() {
            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO = $clienteDAO->read();
            echo $clienteDAO;
        }

        function readEmpresa() {
            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO = $clienteDAO->readEmpresa();
            echo $clienteDAO;
        }

        function readZona() {
            require 'model/clienteDAO.php';
            $this->loadModel('ClienteDAO');
            $clienteDAO = new ClienteDAO();
            $clienteDAO = $clienteDAO->readZona();
            echo $clienteDAO;
        }
    }
