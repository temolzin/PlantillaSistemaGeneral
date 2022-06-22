<?php
    class Usuario extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('main/index');
        }

        function login() {
            require 'model/usuarioDAO.php';
            $this->loadModel('UsuarioDAO');
            $data = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            );

            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->login($data);
        }

        function logout() {
            session_start();
            session_destroy();

            header('location: ' . constant('URL') );
        }
    }
