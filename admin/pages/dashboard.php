<?php
include_once("../../db.php");

session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit;
}

// Consultas para los widgets
$totalUsuarios = $pdo->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
$totalInscripciones = $pdo->query('SELECT COUNT(*) FROM inscripciones')->fetchColumn();
$totalRoles = $pdo->query('SELECT COUNT(*) FROM roles')->fetchColumn();

// Consultas para las gráficas
$usuariosEsteMes = $pdo->query('SELECT COUNT(*) FROM usuarios WHERE MONTH(creado_en) = MONTH(CURRENT_DATE()) AND YEAR(creado_en) = YEAR(CURRENT_DATE())')->fetchColumn();
$inscripcionesEsteMes = $pdo->query('SELECT COUNT(*) FROM inscripciones WHERE MONTH(fecha_inscripcion) = MONTH(CURRENT_DATE()) AND YEAR(fecha_inscripcion) = YEAR(CURRENT_DATE())')->fetchColumn();

// Obtener datos de los últimos 6 meses para las gráficas
$datosMensuales = [];
for ($i = 5; $i >= 0; $i--) {
  $mes = date('Y-m', strtotime("-$i months"));
  $usuariosMes = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE DATE_FORMAT(creado_en, '%Y-%m') = '$mes'")->fetchColumn();
  $inscripcionesMes = $pdo->query("SELECT COUNT(*) FROM inscripciones WHERE DATE_FORMAT(fecha_inscripcion, '%Y-%m') = '$mes'")->fetchColumn();

  $datosMensuales[] = [
    'mes' => date('M', strtotime("-$i months")),
    'usuarios' => $usuariosMes,
    'inscripciones' => $inscripcionesMes
  ];
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
    Dashboard administrador.
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Reemplazar Nucleo y FontAwesome demo por CDN confiable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Eliminar o comentar Nucleo si no se usa -->
  <!-- <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" /> -->
  <!-- <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" /> -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main" style="background: linear-gradient(135deg, #f8fafc 60%, #e0f2fe 100%);">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/landing/index.html">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard admin</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <!-- Enlace Dashboard -->
        <li class="nav-item">
          <a class="nav-link active" href="../pages/dashboard.php"
            style="background:#05bca9; color:#ffffff; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  box-shadow:0 12px 16px rgba(1,45,41,0.2), 0 17px 50px rgba(1,45,41,0.15); transition:background 0.3s ease;">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- SVG ICON -->
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Enlace Usuarios -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/usuarios.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- SVG ICON -->
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>

        <!-- Enlace Inscripciones -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/inscripciones.php"
            style="background:transparent; color:#0a2239; border-radius:12px; padding:0.75rem 1rem; margin:0.3rem 0;
                  transition:background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.background='rgba(56,189,248,0.15)'; this.style.boxShadow='0 0 12px rgba(56,189,248,0.3)'"
            onmouseout="this.style.background='transparent'; this.style.boxShadow='none'">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- SVG ICON -->
            </div>
            <span class="nav-link-text ms-1">Inscripciones</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
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
    <!-- ================== INICIO WIDGETS PRINCIPALES ================== -->
    <section style="background: linear-gradient(135deg, #f8fafc 60%, #e0f2fe 100%); padding-top: 2rem; padding-bottom: 0;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 mb-4">
            <div style="background:#fff;border-radius:20px;box-shadow:0 0 35px rgba(56,189,248,0.3);padding:2rem;border:2px solid rgba(56, 189, 248, 0.4);text-align:center;">
              <div class="mb-3">
                <i class="fa-solid fa-users" style="color:#0a2239;font-size:2rem;"></i>
              </div>
              <h4 style="color:#0a2239;font-weight:700;"><?php echo $totalUsuarios; ?></h4>
              <p style="color:#4b5563;">Usuarios registrados</p>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div style="background:#fff;border-radius:20px;box-shadow:0 0 35px rgba(56,189,248,0.3);padding:2rem;border:2px solid rgba(56, 189, 248, 0.4);text-align:center;">
              <div class="mb-3">
                <i class="fa-solid fa-user-plus" style="color:#0a2239;font-size:2rem;"></i>
              </div>
              <h4 style="color:#0a2239;font-weight:700;"><?php echo $totalInscripciones; ?></h4>
              <p style="color:#4b5563;">Inscripciones</p>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div style="background:#fff;border-radius:20px;box-shadow:0 0 35px rgba(56,189,248,0.3);padding:2rem;border:2px solid rgba(56, 189, 248, 0.4);text-align:center;">
              <div class="mb-3">
                <i class="fa-solid fa-user-shield" style="color:#0a2239;font-size:2rem;"></i>
              </div>
              <h4 style="color:#0a2239;font-weight:700;"><?php echo $totalRoles; ?></h4>
              <p style="color:#4b5563;">Roles</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================== INICIO GRÁFICAS ================== -->
    <section style="background: linear-gradient(135deg, #f8fafc 60%, #e0f2fe 100%); padding-top: 2rem; padding-bottom: 2rem;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4">
            <!-- Gráfica de barras - Usuarios registrados -->
            <div style="background:#fff; border-radius:20px; box-shadow:0 0 35px rgba(56,189,248,0.3);
                    padding:2rem; border:2px solid rgba(56,189,248,0.4);">
              <div class="card-header pb-0" style="border-bottom:1px solid #e0f2fe; margin-bottom:1rem;">
                <h6 style="color:#0a2239; font-weight:700;">Usuarios registrados</h6>
                <p style="color:#4b5563;" class="text-sm">
                  <i class="fa fa-arrow-up text-success"></i>
                  <span style="font-weight:bold;"><?php echo $usuariosEsteMes; ?></span> este mes
                </p>
              </div>
              <div class="card-body">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12 mb-4">
            <!-- Gráfica de líneas - Inscripciones -->
            <div style="background:#fff; border-radius:20px; box-shadow:0 0 35px rgba(56,189,248,0.3);
                    padding:2rem; border:2px solid rgba(56,189,248,0.4);">
              <div class="card-header pb-0" style="border-bottom:1px solid #e0f2fe; margin-bottom:1rem;">
                <h6 style="color:#0a2239; font-weight:700;">Inscripciones</h6>
                <p style="color:#4b5563;" class="text-sm">
                  <i class="fa fa-arrow-up text-success"></i>
                  <span style="font-weight:bold;"><?php echo $inscripcionesEsteMes; ?></span> este mes
                </p>
              </div>
              <div class="card-body">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================== FIN GRÁFICAS ================== -->

    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [<?php echo '"' . implode('","', array_column($datosMensuales, 'mes')) . '"'; ?>],
        datasets: [{
          label: "Usuarios registrados",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#1976d2",
          data: [<?php echo implode(',', array_column($datosMensuales, 'usuarios')); ?>],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: Math.max(...[<?php echo implode(',', array_column($datosMensuales, 'usuarios')); ?>]) + 5,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: [<?php echo '"' . implode('","', array_column($datosMensuales, 'mes')) . '"'; ?>],
        datasets: [{
            label: "Inscripciones",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [<?php echo implode(',', array_column($datosMensuales, 'inscripciones')); ?>],
            maxBarThickness: 6

          },
          {
            label: "Usuarios",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [<?php echo implode(',', array_column($datosMensuales, 'usuarios')); ?>],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
</body>

</html>
