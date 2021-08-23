<?php
  //Page Safety Initializer
  session_start();

  if (isset($_SESSION['userId'])) {
    header("Location: ./pages/home.php");
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
  <title>FOCA Automotive</title>
  <!--Assets-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--Favicon-->
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <!-- Auxiliary CSS Files-->
  <link href="./custom_assets/css/indexstyle.css" rel="stylesheet" />

</head>

<body>
    <input id="scene-1" type="radio" name="scene" value="1" checked />
    <input id="scene-2" type="radio" name="scene" value="2" />
    <input id="scene-3" type="radio" name="scene" value="3" />
    <input id="scene-4" type="radio" name="scene" value="4" />

<main class="site">
	<div class="landscape" id="topbackground">
		<div class="landscape-text">
        <img class="foca-logo" src="custom_assets/img/foca.png" style="">
		</div>
	</div>
	<div class="left-side">
    
		</div>
	</div>
	<div class="hero">
		<div class="layer" data-scene="1">
			<h1 class="heading">
				Lavagens
			</h1>
		</div>
		<div class="layer" data-scene="2">
			<h1 class="heading">
				Revisões
			</h1>
		</div>
		<div class="layer" data-scene="3">
			<h1 class="heading">
				Mudança de Óleo
			</h1>
		</div>
		<div class="layer" data-scene="4">
			<h1 class="heading">
				Marcações Online
			</h1>
		</div>
    </div>
    <div class="left-content">
    <a class="arrowbutton" href="javascript:showLoginModalBox()">
    <svg class="icon-arrow before">
        <use xlink:href="#arrow"></use>
    </svg>
    <span class="label">Portal de Marcações</span>
    <svg class="icon-arrow after">
        <use xlink:href="#arrow"></use>
    </svg>
</a>

<svg style="display: none;">
  <defs>
    <symbol id="arrow" viewBox="0 0 35 15">
      <title>Arrow</title>
      <path d="M27.172 5L25 2.828 27.828 0 34.9 7.071l-7.07 7.071L25 11.314 27.314 9H0V5h27.172z "/>
    </symbol>
  </defs>
</svg>

    </div>
	<div class="right-content">
		<div class="layer" data-scene="1">
			<h2 class="heading">Lavagem Manual</h2>
			<p class="paragraph">
            Fazemos lavagem manual e de interior de todo o tipo de viaturas.<br><br>
            Abertos de Segunda à Sexta de manhã e de tarde.
			</p>
		</div>
		<div class="layer" data-scene="2">
			<h2 class="heading">Revisões</h2>
			<p class="paragraph">
                Tratamos da revisão da sua viatura por si.<br><br>
                Para marcações de revisão, por favor utilize os números de telefone fornecidos.
			</p>
		</div>
		<div class="layer" data-scene="3">
			<h2 class="heading">Mudança de Óleo</h2>
			<p class="paragraph">
                Fazemos a mudança do óleo da sua viatura no momento.<br><br>
                Para marcar, por favor utilize os números de telefone fornecidos.
			</p>
		</div>
		<div class="layer" data-scene="4">
			<h2 class="heading">Marcações Online</h2>
			<p class="paragraph">
                Já pode utilizar o nosso website ou a nossa aplicação para smartphones Android para marcar as suas lavagens.
                <br><a href="https://play.google.com/store/apps/details?id=pt.focaautomotiveonline.booking_app">Aplicação Android</a>
			</p>
		</div>
    </div>
    <div class="footer">
        <b><a href="./pages/info.php">Informações</a></b> | © Copyright FOCA Automotive Lda. | Back-End and Front-End by <a href="https://github.com/iSynthx" target="_blank"> João Lucas Pires</a> | Some Front-End elements by <a href="https://codepen.io/tingc10" target="_blank">tingc10</a> and <a href="https://codepen.io/webinyoureyes" target="_blank">webinyoureyes</a>
	</div>
	 <!-- Hidden Elements -->
  <!-- Modal Box -->
  <div id="modalBox" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <button id="exitCross" onclick="exitModal()" style="z-index:999">X</button>
	<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Entrar</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Registar</a>
  </div>
  <div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  <br>
  <div class="form-group">
      <form method="POST" action="login.php" onsubmit="return checkEmptyInputsLogin();">
        <label>Nome de Utilizador</label>
        <input type="text" autocomplete="off" class="form-control border-input" id="loginUserBox" name="username">
        <br>
        <label>Password</label>
        <input type="password" autocomplete="off" class="form-control border-input" id="loginPasswordBox" name="password">
        <br>
		<input type="submit" value="Entrar" class="btn btn-danger"> 
		 </form>
      </div>
	</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="form-group">
      <form method="POST" action="register.php" onsubmit="return checkEmptyInputsRegister();">
        <label>Primeiro e Último Nome / Nome da Empresa</label>
        <input type="text" autocomplete="off" class="form-control border-input" id="registerNameBox" name="fullname">
		<br>
		<label>Nome de Utilizador</label>
		<input type="text" autocomplete="off" class="form-control border-input" id="registerUsernameBox" name="username">
		<br>
		<label>Password</label>
        <input type="password" autocomplete="off" class="form-control border-input" id="registerPasswordBox" name="password">
        <br>
		<label>Endereço de e-mail</label>
		<input type="email" autocomplete="off" class="form-control border-input" id="registerEmailBox" name="email">
		<br>
		<label>Número Telemóvel</label>
        <input type="number" autocomplete="off" class="form-control border-input" id="registerPhoneBox" name="numtel">
		   <br>
		   <label>Número Contribuinte</label>
        <input type="number" autocomplete="off" class="form-control border-input" id="registerNifBox" name="nif">
       	<br>
		<input type="submit" value="Registar" class="btn btn-danger"> 
		 </form>
      </div>
	</div>
 
</div>
</nav>
     
    </div> <!-- End of modal box content -->
  
  </div> <!-- End of Modal Box-->
</main>
<!-- Scripts -->
<script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="./custom_assets/js/auxiliary.js"></script>
<!-- Animation Script -->
<script src="./custom_assets/js/indexauxiliary.js"></script>

<!-- Script triggerer -->
<script>setInterval(() => changeScene(),10000);</script>
<?php

if (isset($_SESSION['customError'])) {
	echo "<script>alert('".$_SESSION['customError']."');</script>";
	unset($_SESSION['customError']);
}

?>
</body>
</html>