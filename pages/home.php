<?php
  //Page Safety Initializer
  session_start();

  if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php");
    die();
  }

?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <!-- meta's -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Title-->
  <title>FOCA Automotive - Portal de reservas</title>
  <!--Assets-->
  <!--Favicon-->
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <!--Fonts and icons-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- Main CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <!-- Auxiliary CSS Files-->
  <link href="../custom_assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <!--Side Bar-->
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">  
        <div class="logo-image-big">
            <img src="../custom_assets/img/foca.png">
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="./home.php">
              <i class="nc-icon nc-bank"></i>
              <p>Entrada</p>
            </a>
          </li>
          <li >
            <a href="./vehicles.php">
              <i class="nc-icon nc-bus-front-12"></i>
              <p>Viaturas</p>
            </a>
          </li>
          <li>
            <a href="./bookings.php">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Reservas</p>
            </a>
          </li>
          <li>
            <a href="./history.php">
              <i class="nc-icon nc-paper"></i>
              <p>Historial</p>
            </a>
          </li>
        </ul>
        <p class="version-text">v1.0.0 | <a href="./info.php">Informação</a></p>
      </div>     
    </div>
    <!-- Main Panel -->
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Portal para reservas</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">        
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link btn-rotate" href="./logout.php">
                  <i class="nc-icon nc-simple-remove"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Sair</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Main Panel Content -->
      <div class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              <h5 class="card-title">Bem-vindo!</h5>
              </div>
              <div class="card-body">
                <p>Se é um novo utilizador, comece por registar uma viatura. A viatura irá permanecer associada à sua conta.</p>
                <p>Após registar pelo menos uma viatura, pode utilizar o separador "Reservas" para ver os horários disponíveis e efetuar reservas.</p>
                <p>Durante o período de lavagem, pode seguir o estado da mesma no separador "Historial".<br>Quando a viatura estiver pronta, irá receber um e-mail a notificá-lo do mesmo. 
                <hr>
                <p>Para reservas manuais pode utilizar os seguintes contactos:</p><b>914351417</b> ou <b>919008175</b>
                <hr>
                <p>Se encontrar algum problema com a aplicação ou necessitar de mudar alguma informação (endereço de e-mail, nº telefone...), pode utilizar:</p><b>foca.auto.online@gmail.com</b> ou <b>jlucasp25@gmail.com</b>   
              </div>
            </div>
          </div>
        </div>
        
       
      </div>
      <footer class="footer footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                
                <script>
                  document.write(new Date().getFullYear())
                </script> FOCA Automotive Lda. | Back-End by <a href="https://github.com/iSynthx" target="_blank"> João Lucas Pires</a> | Front-End by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
              </span>
            </div>
          </div>
        </div>
      </footer>
      </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
  <!-- Auxiliary JS Files -->
</body>
</html>

<!-- Front-End elements license -->
<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
