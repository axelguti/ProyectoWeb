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
    <link rel="stylesheet" href="../css/categoria.css">
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
                  
                  Administrar Categorias
                
                </h1>

              </section>

<section class="content">

    <div class="box">

              <section class="content">

                <div class="box">

                  <div class="box-header with-border">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                      Agregar Categoria
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalModificarCategoria">
                      Modificar Categoria
                    </button>
                  </div>

                  <div class="box-body options-distance">
                    
                  <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
                    
                    <thead>
                    
                    <tr>
                      
                      <th>Código</th>
                      <th>Categoria</th>
                      <th>Fecha</th>
                      
                    </tr> 

                    </thead>

                    <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    include_once "../Controlador/categorias.controlador.php";
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    foreach ($categorias as $key => $value) {
                    
                        echo ' <tr>

                                <td>'.($key+1).'</td>

                                <td class="text-uppercase">'.$value["categoria"].'</td>

                                <td>

                                <div class="btn-group">
                                    
                                    <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';

                                    if($_SESSION["perfil"] == "Administrador"){

                                    echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                                    }

                                echo '</div>  

                                </td>

                            </tr>';
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
                MODAL AGREGAR CATEGORIA
                ======================================-->
                <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <!--=====================================
                            CABEZA DEL MODAL
                            ======================================-->

                            <div class="modal-header bg-success" style="background:#3c8dbc; color:white">

                                <h4 class="modal-title">Agregar categoria</h4>

                            </div>

                            <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                            <div class="modal-body">

                                <div class="box-body">

                                <!-- ENTRADA PARA EL NOMBRE -->
                                
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                        
                                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                                        <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary">Guardar Categoria</button>

                            </div>
                    </form>

                    <?php

                    include_once "../Controlador/categorias.controlador.php";
                    $crearCategoria = new ControladorCategorias();
                    $crearCategoria -> ctrCrearCategoria();
                
                    ?>  

                    </div>
                  </div>
                </div>

                <!--=====================================
                MODAL EDITAR CATEGORIA
                ======================================-->

                <div class="modal fade" id="modalModificarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">

                        <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                            <div class="modal-header bg-success" style="background:#3c8dbc; color:white">

                                <h4 class="modal-title">Modificar Categoria</h4>

                            </div>

                            <!--=====================================
                            CUERPO DEL MODAL
                            ======================================-->

                            <div class="modal-body">

                                <div class="box-body">

                                    <!-- ENTRADA PARA EL NOMBRE -->
                                    
                                    <div class="form-group">
                                    
                                    <div class="input-group">
                                    
                                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                                        <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                                        <input type="hidden"  name="idCategoria" id="idCategoria" required>

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

                    include_once "../Controlador/categorias.controlador.php";
                    $editarCategoria = new ControladorCategorias();
                    $editarCategoria -> ctrEditarCategoria();

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