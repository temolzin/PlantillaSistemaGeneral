<?php

    class Menu
    {
        function header($title)
        {
            echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <title>Plantilla | Dashboard</title>
                
                  <!-- Google Font: Source Sans Pro -->
                  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
                  <!-- Font Awesome -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/fontawesome-free/css/all.min.css">
                  <!-- Ionicons -->
                  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                  <!-- DATATABLES -->
                  <link rel="stylesheet" href="'. constant('URL'). 'public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
                  <link rel="stylesheet" href="'. constant('URL'). 'public/plugins/datatables-responsive/css/responsive.bootstrap4.css">
                  <link rel="stylesheet" href="'. constant('URL'). 'public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
                  <!-- Tempusdominus Bootstrap 4 -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
                  <!-- iCheck -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
                  <!-- JQVMap -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/jqvmap/jqvmap.min.css">
                  <!-- Theme style -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/css/adminlte.min.css">
                  <!-- overlayScrollbars -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
                  <!-- Daterange picker -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/daterangepicker/daterangepicker.css">
                  <!-- summernote -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/summernote/summernote-bs4.min.css">
                  <!-- sweetalert2 -->
                  <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/sweetalert2/sweetalert2.css">
                  <!-- icon -->
                  <link rel="icon" href="' . constant('URL') . 'public/img/favicon.png" type="image/x-icon">
                </head>
                <body class="hold-transition sidebar-mini layout-fixed">
                <div class="wrapper">
                  <!-- Navbar -->
                  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                      </li>
                      <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                      </li>
                    </ul>
                
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                      <!-- Notifications Dropdown Menu -->
                      <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="fa fa-power-off"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <a href="'.constant('URL').'usuario/logout"><span class="dropdown-item dropdown-header">Cerrar Sesión</span></a>
                          <div class="dropdown-divider"></div>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                          <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <!-- /.navbar -->
                
                  <!-- Main Sidebar Container -->
                  <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="index3.html" class="brand-link">
                      <img src="' . constant('URL') . 'public/img/favicon.png" alt="DIPREM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                      <span class="brand-text font-weight-light">DIPREM</span>
                    </a>
                
                    <!-- Sidebar -->
                    <div class="sidebar">
                      <!-- Sidebar user panel (optional) -->
                      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                          <img src="' . constant('URL') . 'public/img/perfil.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                          <a href="#" class="d-block">'.$_SESSION['nombre'].' '.$_SESSION['apellido'].'</a>
                        </div>
                      </div>
                
                      <!-- Sidebar Menu -->
                      <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                          <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                          <li class="nav-item">
                            <a id="tablero" name="tablero" href="'.constant('URL').'tablero" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                Tablero
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a id="cliente" name="cliente" href="'.constant('URL').'cliente" class="nav-link">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                Cliente
                              </p>
                            </a>
                          </li>
                        </ul>
                      </nav>
                      <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                  </aside>
                
                  <!-- Content Wrapper. Contains page content -->
                  <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                      <div class="container-fluid">
                        <div class="row mb-2">
                          <div class="col-sm-6">
                            <h1>' . $title . '</h1>
                          </div>
                          <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">' . $title . '</li>
                            </ol>
                          </div>
                        </div>
                      </div><!-- /.container-fluid -->
                    </section>';
        }

        function footer()
        {
            echo '    <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->
              <footer class="main-footer">
                <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 3.1.0-rc
                </div>
              </footer>
            
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>
              <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
            
            <!-- jQuery -->
            <script src="' . constant('URL') . 'public/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="' . constant('URL') . 'public/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
              $.widget.bridge(\'uibutton\', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="' . constant('URL') . 'public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="' . constant('URL') . 'public/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="' . constant('URL') . 'public/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="' . constant('URL') . 'public/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="' . constant('URL') . 'public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="' . constant('URL') . 'public/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="' . constant('URL') . 'public/plugins/moment/moment.min.js"></script>
            <script src="' . constant('URL') . 'public/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="' . constant('URL') . 'public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="' . constant('URL') . 'public/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="' . constant('URL') . 'public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="' . constant('URL') . 'public/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="' . constant('URL') . 'public/js/demo.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="' . constant('URL') . 'public/js/pages/dashboard.js"></script>
            <!-- Idioma DataTable-->
            <script>
                var idiomaDataTable = {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Registros del _START_ al _END_, Total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                };
            </script>
            <!-- DataTables  & Plugins -->
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
              <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>

            <!-- JQUERY VALIDATE -->
            <script src="' . constant('URL') . 'public/plugins/jquery-validation/jquery.validate.js"></script>
            <!-- SWEETALERT2 -->
            <script src="' . constant('URL') . 'public/plugins/sweetalert2/sweetalert2.js"></script>
            <script>
                 $(document).ready(function (){
                         dataModuloActive();
                 });
                 const dataModuloActive = () => {
                        var URLactual = window.location.href;
                        //****************************** Apartado para mostrar el item activo en el menú ***************************
                        var modulo = URLactual.split("/")[4];
                        var submodulo = URLactual.split("/")[5];
                        //console.log("modulo: "+modulo)
                        //console.log("submodulo: "+submodulo);
                        $(".nav-link").removeClass("active");
                        
                        $("#" + modulo ).addClass("active");
                        if(submodulo != ""){
                            $("#" + submodulo ).addClass("active");
                            $("#" + modulo + "" + submodulo).addClass("active");
                        }
                        
                        //**************************************************************************************************
                        $("#modulo").val(URLactual);
                        $("#modulo2").val(URLactual);
                 }
            </script>
            </body>
            </html>';
        }
    }

?>
