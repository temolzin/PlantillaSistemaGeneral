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
            $imagen = 'generica.png';

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cuit = $_POST['cuit'];
            $empresa = $_POST['empresa'];
            $zona = $_POST['zona'];
            $email = $_POST['email'];

            $data = array(
                'id_empresa' => $empresa,
                'id_zona' => $zona,
                'imagen' => $imagen,
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
            $imagen = 'generica.png';
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
                'imagen' => $imagen,
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
