<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])) {
        header("Location: " . constant('URL'));
    }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('Cliente');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarCliente'> <i class="fas fa-plus-circle"></i> Registrar Cliente </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Cliente</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableCliente" name="dataTableCliente" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>ID Cliente</th>
                                    <th>CUIT</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Empresa</th>
                                    <th>Zona</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarCliente" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarCliente" name="formRegistrarCliente">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <span><label>Foto Cliente (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" name="imagen_cliente" id="imagen_cliente"
                                               lang="es">
                                        <label   class="custom-file-label" for="imagen">Selecciona Imagen</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Apellidos (*)</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Email (*)</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CUIT (*)</label>
                                    <input type="text" class="form-control" maxlength="11" id="cuit" name="cuit" placeholder="Clave Única de Identificación Tributaria"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Empresa (*)</label>
                                    <select name="empresa" id="empresa" class="form-control">
                                        <option value="">Seleccione Empresa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Zona (*)</label>
                                    <select name="zona" id="zona" class="form-control">
                                        <option value="">Seleccione Zona</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarCliente" tabindex="-1" role="dialog" aria-labelledby="modalActualizarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarCliente" name="formActualizarCliente">
                    <div class="card-body">
                        <input type="text" hidden class="form-control" id="id_cliente_actualizar" name="id_cliente_actualizar" />
                        <div class="row">
                            <div class="img-fluid col-12 col-sm-12 text-center" id="imagen_container_actualizar"></div>
                            <div class="col-12 col-sm-12">
                                <span><label>Foto Cliente (*)</label></span>
                                <div class="col-sm-12 text-center" id="containerFotoActualizar" name="containerFotoActualizar"></div>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" name="imagen_cliente_actualizar" id="imagen_cliente_actualizar"
                                               lang="es">
                                        <label   class="custom-file-label" for="imagen">Selecciona Imagen</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre_actualizar" name="nombre_actualizar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Apellidos (*)</label>
                                    <input type="text" class="form-control" id="apellido_actualizar" name="apellido_actualizar" placeholder="Apellidos"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Email (*)</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="email_actualizar" name="email_actualizar" placeholder="Correo electrónico"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CUIT (*)</label>
                                    <input type="text" class="form-control" id="cuit_actualizar" name="cuit_actualizar" placeholder="Clave Única de Identificación Tributaria"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Empresa (*)</label>
                                    <select name="empresa_actualizar" id="empresa_actualizar" class="form-control">
                                        <option value="">Seleccione Empresa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Zona (*)</label>
                                    <select name="zona_actualizar" id="zona_actualizar" class="form-control">
                                        <option value="">Seleccione Zona</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal DetalleCliente----------------------------------------------->
<div class="modal fade" id="modalDetalleCliente" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center" id="containerFotoDetalle"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input readonly type="text" class="form-control" id="nombre_detalle" name="nombre_detalle" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Apellidos (*)</label>
                                    <input readonly type="text" class="form-control" id="apellido_detalle" name="apellido_detalle" placeholder="Apellidos"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Email (*)</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input readonly type="email" class="form-control" id="email_detalle" name="email_detalle" placeholder="Correo electrónico"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CUIT (*)</label>
                                    <input readonly type="text" class="form-control" id="cuit_detalle" name="cuit_detalle" placeholder="Clave Única de Identificación Tributaria"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Empresa (*)</label>
                                    <select disabled name="empresa_detalle" id="empresa_detalle" class="form-control">
                                        <option value="default">Seleccione Empresa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Zona (*)</label>
                                    <select disabled name="zona_detalle" id="zona_detalle" class="form-control">
                                        <option value="default">Seleccione Zona</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar Cliente *************************************************-->
<div class="modal fade" id="modalEliminarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarCliente" name="formActualizarCliente">
                <input type="text" hidden id="idEliminarCliente" name="idEliminarCliente">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Cliente?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    $menu->footer();
?>

<script>

    $(document).ready(function (){
        mostrarClientes();
        llenarComboEmpresa();
        llenarComboZona();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var llenarComboEmpresa = function () {
        var url = '<?php echo constant('URL');?>cliente/readEmpresa';
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, registro) {
                    var id = registro.idEmpresa;
                    var nombre = registro.nombre;
                    $("#empresa").append('<option value='+id+'>'+nombre+'</option>');
                    $("#empresa_actualizar").append('<option value='+id+'>'+nombre+'</option>');
                    $("#empresa_detalle").append('<option value='+id+'>'+nombre+'</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var llenarComboZona = function () {
        var url = '<?php echo constant('URL');?>cliente/readZona';
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, registro) {
                    var id = registro.idZona;
                    var nombre = registro.nombre;
                    $("#zona").append('<option value='+id+'>'+nombre+'</option>');
                    $("#zona_actualizar").append('<option value='+id+'>'+nombre+'</option>');
                    $("#zona_detalle").append('<option value='+id+'>'+nombre+'</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarClientes = function() {
        var tableCliente = $('#dataTableCliente').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL');?>cliente/read"
            },
            "columns": [
                {
                    defaultContent: "",
                    "render": function (data, type, full) {
                        if(full['imagen'] == 'generica.png' || full['imagen'] == '' || full['imagen'] == null ) {
                            return '<img class="text-center img-fluid direct-chat-img" src="<?php echo constant('URL');?>public/img/generica.png" alt=""/>';
                        } else {
                            return '<img class="text-center img-fluid direct-chat-img" src="<?php echo constant('URL');?>public/img/'+full['email']+'/'+full['imagen']+'" alt=""/>';
                        }
                    }
                },
                { "data": "idCliente" },
                { "data": "cuit" },
                { "data": "nombre" },
                { "data": "apellido" },
                { "data": "nombreEmpresa" },
                { "data": "nombreZona" },
                {data:null,
                    "defaultContent":
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCliente' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarCliente' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarCliente' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableCliente);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableCliente tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarCliente').val(data.idCliente);

            var idActualizar = $("#id_cliente_actualizar").val(data.idCliente);
            var nombre = $("#nombre_actualizar").val(data.nombre);
            var apellido = $("#apellido_actualizar").val(data.apellido);

            if(data.imagen == 'generica.png' || data.imagen == '' || data.imagen == null ) {
                $('#containerFotoDetalle').html('<img class="profile-user-img img-fluid " src="<?php echo constant('URL');?>public/img/generica.png" alt=""/>');
                $('#containerFotoActualizar').html('<img class="profile-user-img img-fluid " src="<?php echo constant('URL');?>public/img/generica.png" alt=""/>');
            } else {
                $('#containerFotoDetalle').html('<img class="profile-user-img img-fluid " src="<?php echo constant('URL');?>public/img/'+data.email+'/'+data.imagen+'" alt=""/>');
                $('#containerFotoActualizar').html('<img class="profile-user-img img-fluid " src="<?php echo constant('URL');?>public/img/'+data.email+'/'+data.imagen+'" alt=""/>');
            }

            var cuit = $("#cuit_actualizar").val(data.cuit);
            var idEmpresa = $("#empresa_actualizar").val(data.idEmpresa);
            var idZona = $("#zona_actualizar").val(data.idZona);
            var email = $("#email_actualizar").val(data.email);

            var nombre = $("#nombre_detalle").val(data.nombre);
            var apellido = $("#apellido_detalle").val(data.apellido);
            // var imagen = $("#imagen_cliente_detalle").val(data.imagen);
            var cuit = $("#cuit_detalle").val(data.cuit);
            var idEmpresa = $("#empresa_detalle").val(data.idEmpresa);
            var idZona = $("#zona_detalle").val(data.idZona);
            var email = $("#email_detalle").val(data.email);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarCliente').serialize();
                var form_data = new FormData(document.getElementById("formRegistrarCliente"));
                var imagen = "";
                if ($('#imagen_cliente').val() != null) {
                    imagen = $('#imagen_cliente').prop('files')[0];
                }
                form_data.append('imagen_cliente', imagen);

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>cliente/insert",
                    dataType: "html",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Cliente ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>cliente";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el cliente. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarCliente').validate({
            rules: {
                email: {
                    required: true
                },
                nombre: {
                    required: true
                },
                apellido: {
                    required: true
                },
                imagen_cliente: {
                    required: true
                },
                empresa: {
                    required: true
                },
                zona: {
                    required: true
                },
                cuit: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Ingresa un email"
                },
                nombre: {
                    required: "Ingresa un nombre"
                },
                apellido: {
                    required: "Ingresa un apellido"
                },
                empresa: {
                    required: "Selecciona una empresa"
                },
                zona: {
                    required: "Selecciona una zona"
                },
                imagen_cliente: {
                    required: "Selecciona una foto"
                },
                cuit: {
                    required: "Ingresa un cuit"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formActualizarCliente').serialize();
                var imagen = "";
                var form_data = new FormData(document.getElementById("formActualizarCliente"));
                if ($('#imagen_cliente_actualizar').val() != null) {
                    imagen = $('#imagen_cliente_actualizar').prop('files')[0];
                }
                form_data.append('imagen_cliente_actualizar', imagen);

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>cliente/update",
                    dataType: "html",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Cliente ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>cliente";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el cliente. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarCliente').validate({
            rules: {
                email_actualizar: {
                    required: true
                },
                nombre_actualizar: {
                    required: true
                },
                apellido_actualizar: {
                    required: true
                },
                imagen_cliente_actualizar: {
                    required: true
                },
                empresa_actualizar: {
                    required: true
                },
                zona_actualizar: {
                    required: true
                },
                cuit_actualizar: {
                    required: true
                }
            },
            messages: {
                email_actualizar: {
                    required: "Ingresa un email"
                },
                nombre_actualizar: {
                    required: "Ingresa un nombre"
                },
                apellido_actualizar: {
                    required: "Ingresa un apellido"
                },
                empresa_actualizar: {
                    required: "Selecciona una empresa"
                },
                zona_actualizar: {
                    required: "Selecciona una zona"
                },
                imagen_cliente_actualizar: {
                    required: "Selecciona una foto"
                },
                cuit_actualizar: {
                    required: "Ingresa un cuit"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var eliminarRegistro = function () {
        $( "#formEliminarCliente" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarCliente').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>cliente/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Cliente ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>cliente";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el cliente. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    // Código para cambiar el texto del input al seleccionar una imagen
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
