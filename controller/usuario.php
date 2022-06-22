<?php
    class Cliente extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('main/index');
        }

        function login() {
            require 'model/usuarioDAO.php.php';
            $this->loadModel('UsuarioDAO');
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO = $usuarioDAO->login();
            echo $usuarioDAO;
        }
    }
