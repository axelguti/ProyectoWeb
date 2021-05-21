<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="../js/scrollreveal.js"></script>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--CSS links-->
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/producto.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <img src="../imagenes/mi-tienda-segura-1.png" alt="logo tienda" style="width: 5%">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav clase-ul">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="menu.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="usuario.php">Usuario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categoria.php">Categoria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cliente.php">Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ventas.php">Ventas</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mas acciones
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="login.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <p class="nav-link" >Bienvenido <?php echo " jimmy"; ?></p>
              </li>
            </ul>
          </div>
        
      </nav>

      <div class="container bg-light rounded table-distance">

              <div class="content-wrapper">

              <section class="content-header">
                
                <h1>
                  
                  Administrar productos
                
                </h1>

              </section>

<section class="content">

    <div class="box">

              <section class="content">

                <div class="box">

                  <div class="box-header with-border">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
                      Agregar Usuario
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalModificarUsuario">
                      Modificar Usuario
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEliminarUsuario">
                      Eliminar Usuario
                    </button>
                  </div>

                  <div class="box-body options-distance">
                    
                  <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
                    
                    <thead>
                    
                    <tr>
                      


                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>password</th>
                      <th>Perfil</th>
                      <th>estado</th>
                      <th>Ultima conexion</th>
                      <th>Fecha de creacion</th>     
                    </tr> 

                    </thead>

                    <tbody>
                        <?php

                        include_once "../Controlador/usuarios.controlador.php";
                        $mostrarUsers = ControladorUsuarios::ctrMostrarUsuarios();

                        foreach ($mostrarProd as $mostrarProd) {
                        ?>

                        <tr>
                            <td><?php echo $mostrarProd['nombre'];?></td>
                            <td><?php echo $mostrarProd['usuario'];?></td>
                            <td><?php echo $mostrarProd['password'];?></td>
                            <td><?php echo $mostrarProd['perfil'];?></td>
                            <td><?php echo $mostrarProd['estado'];?></td>
                            <td><?php echo $mostrarProd['ultimo_login'];?></td>
                            <td><?php echo $mostrarProd['fecha'];?></td>



                        </tr>
                        <?php
                        }
                        ?>




                    </tbody>
                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

                  </div>

                </div>

              </section>

              </div>


                <!--=====================================
                MODAL AGREGAR PRODUCTO
                ======================================-->
                <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                            <div class="modal-header bg-success" style="background:#3c8dbc; color:white">

                                <h4 class="modal-title">Agregar producto</h4>

                            </div>

                            <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                            <div class="modal-body">


                                <div class="box-body">


                                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                            <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                                                <option value="">Selecionar categoría</option>

                                                <?php

                                                $item = null;
                                                $valor = null;

                                                include_once "../Controlador/categorias.controlador.php";
                                                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                                                print_r($categorias);
                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="'.$value["id_categoria"].'">'.$value["categoria"].'</option>';
                                                }

                                                ?>



                                            </select>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA EL CÓDIGO -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                            <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                            <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA STOCK -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                            <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA PRECIO COMPRA -->

                                    <div class="form-group row options-distance">

                                        <div class="col-xs-6">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                                            </div>

                                        </div>

                                        <!-- ENTRADA PARA PRECIO VENTA -->

                                        <div class="col-xs-6 options-distance">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                                            </div>

                                            <br>

                                            <!-- CHECKBOX PARA PORCENTAJE -->

                                            <div class="col-xs-6 options-distance">

                                                <div class="form-group">

                                                    <label>

                                                        <input type="checkbox" class="minimal porcentaje" checked>
                                                        Utilizar procentaje
                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>

                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary">Guardar producto</button>

                            </div>
                    </form>

                    <?php

                    include_once "../Controlador/productos.controlador.php";
                    $crearProducto = new ControladorProductos();
                    $crearProducto -> ctrCrearProducto();
                
                    ?>  

                    </div>
                  </div>
                </div>

                <!--=====================================
                MODAL EDITAR PRODUCTO
                ======================================-->
                <div class="modal fade" id="modalModificarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                            <div class="modal-header bg-success" style="background:#3c8dbc; color:white">

                                <h4 class="modal-title">Modificar producto</h4>

                            </div>

                            <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                            <div class="modal-body">


                                <div class="box-body">


                                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                            <select class="form-control input-lg" id="editarCategoria" name="editarCategoria" required>

                                                <option value="">Selecionar categoría</option>

                                                <?php

                                                $item = null;
                                                $valor = null;

                                                include_once "../Controlador/categorias.controlador.php";
                                                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                                                }

                                                ?>

                                            </select>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA EL CÓDIGO -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                            <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" placeholder="Ingresar código" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                            <input type="text" class="form-control input-lg" name="editarDescripcion" placeholder="Ingresar descripción" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA STOCK -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                            <input type="number" class="form-control input-lg" name="editarStock" min="0" placeholder="Stock" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA PRECIO COMPRA -->

                                    <div class="form-group row options-distance">

                                        <div class="col-xs-6">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                                            </div>

                                        </div>

                                        <!-- ENTRADA PARA PRECIO VENTA -->

                                        <div class="col-xs-6 options-distance">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                                <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                                            </div>

                                            <br>

                                            <!-- CHECKBOX PARA PORCENTAJE -->

                                            <div class="col-xs-6 options-distance">

                                                <div class="form-group">

                                                    <label>

                                                        <input type="checkbox" class="minimal porcentaje" checked>
                                                        Utilizar procentaje
                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary">Modificar producto</button>

                            </div>
                    </form>

                    <?php

                    include_once "../Controlador/productos.controlador.php";
                    $ModificarProducto = new ControladorProductos();
                    $ModificarProducto -> ctrEditarProducto();
                
                    ?>  

                    </div>
                  </div>
                </div>
                 <!--=====================================
                MODAL Eliminar PRODUCTO
                ======================================-->
                <div class="modal fade" id="modalEliminarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="get">
                            <!--=====================================
                            CABEZA DEL MODAL
                            ======================================-->

                            <div class="modal-header bg-success" style="background:#3c8dbc; color:white">

                                <h4 class="modal-title">Eliminar producto</h4>

                            </div>

                            <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                            <div class="modal-body">


                                <div class="box-body">

                                    <!-- ENTRADA PARA EL CÓDIGO -->

                                    <div class="form-group options-distance">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                            <input type="text" class="form-control input-lg" id="Codigo" name="Codigo" placeholder="Ingresar código" required>

                                        </div>

                                    </div>
                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary">Eliminar producto</button>

                            </div>
                        </form>

                        <?php

                        include_once "../Controlador/productos.controlador.php";
                        $EliminarProducto = new ControladorProductos();
                        $EliminarProducto -> ctrEliminarProducto();
                    
                        ?>  

                    </div>
                  </div>
                </div>

    </div>
    <!--Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <!--script scroll reveal-->
    <script src="../js/scroll/loginscroll.js"></script>
</body>
</html>