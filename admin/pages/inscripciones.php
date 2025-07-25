<?php
include_once("../../db.php");

session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    inscripciones
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!-- Agregar CDN de DataTables CSS en el <head> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />
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

        <!-- Dashboard (estilo hover) -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Dashboard icon -->
              <!-- SVG permanece igual -->
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Usuarios (estilo hover) -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/usuarios.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Usuarios icon -->
              <!-- SVG permanece igual -->
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>

        <!-- Inscripciones (Activo y verde) -->
        <li class="nav-item">
          <a class="nav-link active" href="../pages/inscripciones.php"
            style="background:#05bca9; color:#ffffff; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  box-shadow:0 12px 16px rgba(1,45,41,0.2), 0 17px 50px rgba(1,45,41,0.15); transition:background 0.3s ease;">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- Inscripciones icon -->
              <!-- SVG permanece igual -->
            </div>
            <span class="nav-link-text ms-1">Inscripciones</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <!-- ================== FIN SIDEBAR ================== -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inscripciones</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Inscripciones</h6>
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
    <!-- End Navbar -->

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4" style="border-radius:12px; box-shadow:0 0 10px rgba(56,189,248,0.1); background-color:#f8fafc;">
        <div class="card-header pb-0" style="background: linear-gradient(135deg, #e0f2fe, #f8fafc); border-top-left-radius:12px; border-top-right-radius:12px;">
          <h6 style="color:#0a2239;">Inscripciones</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="tabla-inscripciones"
                   class="table align-items-center mb-0 display responsive nowrap"
                   style="width:100%; background-color:#ffffff; border-radius:12px; overflow:hidden;">
              <thead style="background: linear-gradient(135deg, #e0f2fe, #f8fafc); color:#0a2239;">
                <tr>
                  <th style="padding:0.75rem;">ID</th>
                  <th style="padding:0.75rem;">Nombre completo</th>
                  <th style="padding:0.75rem;">Cédula</th>
                  <th style="padding:0.75rem;">Email</th>
                  <th style="padding:0.75rem;">Teléfono</th>
                  <th style="padding:0.75rem;">Profesión</th>
                  <th style="padding:0.75rem;">Fecha de inscripción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $stmt = $pdo->query("SELECT id, nombre_completo, cedula, email, telefono, profesion, fecha_inscripcion FROM inscripciones");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['id']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['nombre_completo']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['cedula']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['email']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['telefono']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['profesion']) . '</td>';
                  echo '<td style="padding:0.75rem;">' . htmlspecialchars($row['fecha_inscripcion']) . '</td>';
                  echo '</tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
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
      $('#tabla-inscripciones').DataTable({
        responsive: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        }
      });
    });
  </script>
</body>

</html>
