<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>usuarios</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Agregar CDN de DataTables CSS en el <head> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!-- ================== INICIO SIDEBAR ================== -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main"
    style="background: linear-gradient(135deg, #f8fafc 60%, #e0f2fe 100%);">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../pages/dashboard.php"
        target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard admin</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <!-- Dashboard (hover) -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Dashboard icon (sin cambios) -->
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Usuarios (activo en verde) -->
        <li class="nav-item">
          <a class="nav-link active" href="../pages/usuarios.php"
            style="background:#05bca9; color:#ffffff; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  box-shadow:0 12px 16px rgba(1,45,41,0.2), 0 17px 50px rgba(1,45,41,0.15); transition:background 0.3s ease;">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Usuarios icon (sin cambios) -->
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>

        <!-- Inscripciones (hover) -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/inscripciones.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Inscripciones icon (sin cambios) -->
            </div>
            <span class="nav-link-text ms-1">Inscripciones</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <!-- ================== FIN SIDEBAR ================== -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- ================== INICIO NAVBAR ================== -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Usuarios</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Usuarios</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- ================== FIN NAVBAR ================== -->
    <!-- ================== INICIO TABLA DE USUARIOS ================== -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Usuarios</h6>
              <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario"><i class="fa fa-plus"></i> Agregar usuario</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="tabla-usuarios"
                  class="table align-items-center mb-0 display responsive nowrap"
                  style="width:100%; background-color: #f8fafc; border-radius:12px; box-shadow:0 0 10px rgba(56,189,248,0.1); overflow:hidden;">
                  <thead style="background: linear-gradient(135deg, #e0f2fe, #f8fafc); color:#0a2239;">
                    <tr>
                      <th style="padding:0.75rem;">ID</th>
                      <th style="padding:0.75rem;">Usuario</th>
                      <th style="padding:0.75rem;">Email</th>
                      <th style="padding:0.75rem;">Rol</th>
                      <th style="padding:0.75rem;">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once("../../db.php");
                    $stmt = $pdo->query("SELECT u.id, u.username, u.email, r.nombre AS rol, u.creado_en FROM usuarios u JOIN roles r ON u.rol_id = r.id");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo '<tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">';
                      echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['id']) . '</td>';
                      echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['username']) . '</td>';
                      echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['email']) . '</td>';
                      echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['rol']) . '</td>';
                      echo '<td style="padding:0.75rem;">';
                      echo '<button class="btn btn-sm me-1 btn-editar-usuario"
                   style="background:#05bca9; color:white; border-radius:8px; box-shadow:0 4px 8px rgba(1,45,41,0.2);"
                   data-id="' . $row['id'] . '"
                   data-username="' . htmlspecialchars($row['username'], ENT_QUOTES) . '"
                   data-email="' . htmlspecialchars($row['email'], ENT_QUOTES) . '"
                   data-bs-toggle="modal" data-bs-target="#modalEditarUsuario">
              <i class="fa fa-edit"></i>
            </button>';
                      echo '<button class="btn btn-sm btn-borrar-usuario"
                   style="background:#ef4444; color:white; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.1);"
                   data-id="' . $row['id'] . '">
              <i class="fa fa-trash"></i>
            </button>';
                      echo '</td>';
                      echo '</tr>';
                    }
                    ?>
                  </tbody>
                </table>
                <!-- ================== FIN TABLA DE USUARIOS ================== -->
  </main>
  <!-- ================== INICIO PLUGINS Y SCRIPTS ================== -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  <!-- Agregar CDN de jQuery y DataTables JS antes de </body> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tabla-usuarios').DataTable({
        responsive: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
      });
    });
  </script>
  <!-- Modal Editar Usuario -->
  <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formEditarUsuario" method="post" action="editar_usuario.php">
          <div class="modal-body">
            <input type="hidden" name="id" id="editar-id">
            <div class="mb-3">
              <label for="editar-username" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="username" id="editar-username" required>
            </div>
            <div class="mb-3">
              <label for="editar-email" class="form-label">Correo</label>
              <input type="email" class="form-control" name="email" id="editar-email" required>
            </div>
            <div class="mb-3">
              <label for="editar-password" class="form-label">Nueva clave</label>
              <input type="password" class="form-control" name="password" id="editar-password" placeholder="Dejar en blanco para no cambiar">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Botón y Modal para agregar usuario -->
  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formAgregarUsuario">
          <div class="modal-body">
            <div class="mb-3">
              <label for="agregar-username" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="username" id="agregar-username" required>
            </div>
            <div class="mb-3">
              <label for="agregar-email" class="form-label">Correo</label>
              <input type="email" class="form-control" name="email" id="agregar-email" required>
            </div>
            <div class="mb-3">
              <label for="agregar-password" class="form-label">Clave</label>
              <input type="password" class="form-control" name="password" id="agregar-password" required>
            </div>
            <div class="mb-3">
              <label for="agregar-rol" class="form-label">Rol</label>
              <select class="form-control" name="rol_id" id="agregar-rol">
                <option value="1">Administrador</option>
                <option value="2" selected>Usuario</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ================== FIN PLUGINS Y SCRIPTS ================== -->
  <script>
    // Envío AJAX para agregar usuario
    $('#formAgregarUsuario').on('submit', function(e) {
      e.preventDefault();
      var datos = $(this).serialize() + '&action=add';
      $.post('../controllers/usuarios.php', datos, function(resp) {
        if (resp === 'ok') {
          location.reload();
        } else {
          alert('Error: ' + resp);
        }
      });
    });

    // Llenar el modal de editar usuario automáticamente
    $(document).on('click', '.btn-editar-usuario', function() {
      var id = $(this).data('id');
      var username = $(this).data('username');
      var email = $(this).data('email');
      $('#editar-id').val(id);
      $('#editar-username').val(username);
      $('#editar-email').val(email);
      $('#editar-password').val('');
    });

    // Envío AJAX para editar usuario
    $('#formEditarUsuario').on('submit', function(e) {
      e.preventDefault();
      var datos = $(this).serialize() + '&action=edit';
      $.post('../controllers/usuarios.php', datos, function(resp) {
        if (resp === 'ok') {
          location.reload();
        } else {
          alert('Error: ' + resp);
        }
      });
    });

    // Envío AJAX para eliminar usuario
    $(document).on('click', '.btn-borrar-usuario', function() {
      if (confirm('¿Seguro que deseas borrar este usuario?')) {
        var id = $(this).data('id');
        $.post('../controllers/usuarios.php', {
          id: id,
          action: 'delete'
        }, function(resp) {
          if (resp === 'ok') {
            location.reload();
          } else {
            alert('Error: ' + resp);
          }
        });
      }
    });
  </script>
</body>

</html>
