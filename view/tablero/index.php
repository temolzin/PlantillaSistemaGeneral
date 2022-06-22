<?php
session_start();
if(!isset($_SESSION['id_usuario'])) {
    header("Location: " . constant('URL'));
}

require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12 card text-center">
                <div class="card-header">
                    Bienvenido
                </div>
                <div class="card-body">
                    <h5 class="text-center font-weight-bold">¡Te damos la bienvenida <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];?>!</h5>
                    <p class="card-text">Actualmente tu CUIT es: <?php echo $_SESSION['cuit']; ?></p>
                    <a href="<?php echo constant('URL')?>cliente" class="btn btn-primary">Registra un cliente</a>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $_SESSION['email']; ?>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

<?php
$menu->footer();
?>
