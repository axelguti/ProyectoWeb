<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css">
  <script src="../js/scrollreveal.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
  

  <div class="row align-items-center justify-content-around">
    
    <div class="col-md-6">

      <img src="../imagenes/mi-tienda-segura-1.png" class="img-responsive img-tienda d-none d-lg-block" width="100%">

    </div>

    <div class="col-md-6 columna-form">


        <form class="" method="post">
            <img class ="img-fluid" src="../svg/person-circle-outline.svg " alt="" >
            <div class="mb-3">
              <label for="user" class="form-label">Usuario</label>
              <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Acceder</button>
            
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Registrar</button>
            
          </form>

          <?php
            include "../Controlador/usuarios.controlador.php";
            include "../Modelos/usuarios.modelo.php";
            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
          ?>
      
    </div>

      <!-- Modal -->
      <div id="modalAgregarUsuario" class="modal fade" role="dialog">

          <div class="modal-dialog">

              <div class="modal-content">

                  <form role="form" method="post" enctype="multipart/form-data">

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header bg-success" >

                          <h5 class="modal-title text-light">Registrarse</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body">

                          <div class="box-body">

                              <!-- ENTRADA PARA EL NOMBRE -->

                              <div class="form-group options-distance">

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                                  </div>

                              </div>

                              <!-- ENTRADA PARA EL USUARIO -->

                              <div class="form-group options-distance">

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                      <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                                  </div>

                              </div>

                              <!-- ENTRADA PARA LA CONTRASEÑA -->

                              <div class="form-group options-distance">

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                      <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                                  </div>

                              </div>

                              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                              <div class="form-group options-distance">

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                      <select class="form-control input-lg" name="nuevoPerfil">

                                          <option value="">Selecionar perfil</option>

                                          <option value="Administrador">Administrador</option>

                                          <option value="Especial">Especial</option>

                                          <option value="Vendedor">Vendedor</option>

                                      </select>

                                  </div>

                              </div>

                              <!-- ENTRADA PARA SUBIR FOTO -->

                              <div class="form-group options-distance">

                                  <div class="panel">SUBIR FOTO</div>

                                  <input type="file" class="nuevaFoto" name="nuevaFoto">

                                  <p class="help-block">Peso máximo de la foto 2MB</p>

                                  <img src="../svg/image-outline.svg" class="img-thumbnail previsualizar" width="100px">

                              </div>

                          </div>

                      </div>

                      <!--=====================================
                      PIE DEL MODAL
                      ======================================-->

                      <div class="modal-footer">

                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          <button type="submit" class="btn btn-primary">Guardar usuario</button>

                      </div>

                      <?php

                      $crearUsuario = new ControladorUsuarios();
                      $crearUsuario -> ctrCrearUsuario();

                      ?>

                  </form>

              </div>

          </div>

      </div>

  </div>

  <!--script scroll reveal-->
  <script src="../js/scroll/loginscroll.js"></script>
</body>
</html>



