<?php
  //Page Safety Initializer
  session_start();

  if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php");
    die();
  }
  require __DIR__.'../dotenv/autoload.php';
  $dotenv = Dotenv\Dotenv::create(__DIR__."../../../../../../.");
  $dotenv->load();
  $serverhost = getenv('DATABASE_HOST');
  $username = getenv('DATABASE_USER');
  $password = getenv('DATABASE_PSW');
  $database = getenv('DATABASE_NAME');
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <!-- meta's -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Title-->
  <title>FOCA Automotive - Reserva de Lavagem</title>
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
  <div class="wrapper ">
    <!--Side Bar-->
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">  
        <div class="logo-image-big">
            <img src="../custom_assets/img/foca.png">
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
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
          <li class="active">
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
            <a class="navbar-brand">Reservar Lavagem</a>
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
          <div class="card">
            <div class="card-body">
      <?php
        include "auxiliary.php";


        //MySQL Connection
        $connection = mysqli_connect($serverhost,$username,$password);
             
        if (!$connection) {
          $_SESSION['customError'] = "Ocorreu um erro na comunicação com o servidor. Por favor tente mais tarde.";
          header("Location: ../error.php");
          die();
        }

        mysqli_set_charset($connection,"utf8");
        mysqli_select_db($connection,$database);

        $query = "SELECT Data,Bloco,NumVagas FROM BlocoLavagem WHERE Data >= DATE(NOW()) AND NumVagas > 0";
                           
        $result = mysqli_query($connection,$query);

        if ($result == FALSE) {
          $_SESSION['customError'] = "Ocorreu um erro na comunicação com o servidor. Por favor tente mais tarde.";
          header("Location: ../error.php");
          die();
        }
        else {
          $index = 1;
          echo "<div class=\"container\">
                <div class=\"row text-center booking-row\">";
          while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class=\"col-lg-3 text-center booking-square\">
                <h5 class=\"title booking-date\">".parseDate($row['Data'])."</h5>
                <p class=\"category booking-block\">".parseBlock($row['Bloco'])."</p>
                <input type=\"hidden\" name=\"openingDate\" value=\"".$row['Data']."\">
                <input type=\"hidden\" name=\"openingBlock\" value=\"".$row['Bloco']."\">
                Vagas atuais: <b>".$row['NumVagas']."</b>
                <br>
                <button class=\"btn btn-danger\" onclick=\"showBookingsModalBox('".$row['Data']."','".$row['Bloco']."')\">Escolher</button>
                </div>";
                
                if ( ($index % 3 == 0)) {
                  echo "</div><div class=\"row text-center booking-row\">";
                }
                
                $index = $index + 1;
          }
          
          if ($index == 1) {
            echo "<h3 class=\"text-center no-booking-text\">Não há vagas abertas.</h3>";
          }

        }  
//Close SQL connection
mysqli_close($connection);
        ?>
             
                  </div>
                  </div>
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
                ©
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

<!-- Hidden Elements -->
  <!-- Modal Box -->
  <div id="modalBox" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <button id="exitCross" onClick="exitModal()">X</button>
  <h4 class="card-title modal-title">Efetuar Reserva</h4>
  <hr> 
  <p id="chosenDateTime"></p>
    <div class="form-group booking-form">
    <form method="POST" action="processBooking.php">
    <?php 

      //MySQL Connection
      $connection = mysqli_connect($serverhost,$username,$password);
      
      if (!$connection) {
        $_SESSION['customError'] = "Ocorreu um erro na comunicação com o servidor. Por favor tente mais tarde.";
        header("Location: ../error.php");
        die();
      }

      mysqli_set_charset($connection,"utf8");
      mysqli_select_db($connection,$database);

      $query = "SELECT Marca, Modelo, Matricula,idViatura FROM Viatura WHERE idUtilizadorV = '".$_SESSION['userId']."';";
      
      $result = mysqli_query($connection,$query);
      
      if ($result == FALSE) {
                $_SESSION['customError'] = "Ocorreu um erro na comunicação com o servidor. Por favor tente mais tarde.";
                header("Location: ../error.php");
                die();
              }
     
      echo "
              <div class=\"form-group\">
                <form method=\"POST\" action=\"processBooking.php\">
                  <input type=\"hidden\" id=\"choosenDate\" name=\"choosenDate\">
                  <input type=\"hidden\" id=\"choosenBlock\" name=\"choosenBlock\">";

      $count = 0;
      
      while ($row = mysqli_fetch_assoc($result)) {
        if ($count == 0) {
          echo "<br><label>Viatura</label><br><select autocomplete=\"off\" class=\"form-control border-input\" name=\"vehicle\">";
        }
        echo "<option value=".$row['idViatura'].">".$row['Marca']." ".$row['Modelo']." - ".$row['Matricula']."</option>";
        $count++;
      }
      
      if ($count == 0)
        echo "<br><p style=\"color:red;text-align:center\">Ainda não tem viaturas registadas.<br>Registe primeiro uma viatura para fazer marcações.</p></form></div>";
      else
        echo "</select><br> <label>Observações (opcional): </label><br> <input type=\"textarea\" autocomplete=\"off\" class=\"form-control border-input\" name=\"obs\"><br><input type=\"submit\" value=\"Adicionar\" class=\"btn btn-danger\"></form></div> ";
    //Close SQL connection
    mysqli_close($connection);
    ?>
      
     </div>
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
  <script src="../custom_assets/js/auxiliary.js"></script>
</body>

</html>

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
