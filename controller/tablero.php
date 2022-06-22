<?php
	/**
	 *
	 */
	class Tablero extends Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->view->render('tablero/index');
		}

		function index() {
			$this->view->render('tablero/index');
		}

		function saludo() {
			echo "METODO SALUDO";
		}
	}
?>
