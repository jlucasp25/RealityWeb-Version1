<?php
        session_start();
        require __DIR__.'dotenv/autoload.php';
        $dotenv = Dotenv\Dotenv::create(__DIR__."../../../../../../.");
        $dotenv->load();
        $serverhost = getenv('DATABASE_HOST');
        $username = getenv('DATABASE_USER');
        $password = getenv('DATABASE_PSW');
        $database = getenv('DATABASE_NAME');

         ////////////////////
         //MySQL Connection//
         $connection = mysqli_connect($serverhost,$username,$password);
         
         if (!$connection) {
          $_SESSION['customError'] = "Ocorreu um erro na comunicação com o servidor. Por favor tente mais tarde.";
          header("Location: ./error.php");
          die();
        }
         mysqli_set_charset($connection,"utf8");
         mysqli_select_db($connection,$database);
         
         //Extract inputs
         $inputName = mysqli_real_escape_string($connection,$_POST['fullname']); 
         $inputUser = mysqli_real_escape_string($connection,$_POST['username']);
         $inputPassword = mysqli_real_escape_string($connection,$_POST['password']);
         $inputEmail = mysqli_real_escape_string($connection,$_POST['email']); 
         $inputPhone = mysqli_real_escape_string($connection,$_POST['numtel']); 
         $inputNIF = mysqli_real_escape_string($connection,$_POST['nif']); 
         
         //Encrypts Password
         $hashedPassword = password_hash($inputPassword,PASSWORD_BCRYPT);
         
         //Checks if user or email exists
         $query = "SELECT COUNT(*) AS Count FROM Utilizador WHERE NomeUtilizador = '".$inputUser."' OR Email = '".$inputEmail."';";
         
         $result = mysqli_query($connection,$query);
         
         if ($result == FALSE) {
            $_SESSION['customError'] = "Ocorreu um erro ao comunicar com o servidor. Por favor tente mais tarde ou utilize os contactos telefónicos.";
            header("Location: ./error.php");
            die();
          }
        
        $row = mysqli_fetch_assoc($result);

        if ($row['Count'] != 0) {
            $_SESSION['customError'] = "O endereço de e-mail ou nome de utilizador fornecido já se encontra registado. Tente novamente.";
            header("Location: ./index.php");
            die();
        }

        $query = "INSERT INTO Utilizador (Nome,NomeUtilizador,Password,Email,NumTelemovel,NumContribuinte,TipoUtilizador) VALUES
        ('".$inputName."','".$inputUser."','".$hashedPassword."','".$inputEmail."',".$inputPhone.",".$inputNIF.",'CUSTOMER')";

        $result = mysqli_query($connection,$query);

        if ($result == FALSE) {
            $_SESSION['customError'] = "Ocorreu um erro ao comunicar com o servidor. Por favor tente mais tarde ou utilize os contactos telefónicos.";
            header("Location: ./error.php");
            die();
          }
    //Close SQL connection
    mysqli_close($connection);
    $_SESSION['customError'] = 'O registo foi bem-sucedido. Pode entrar no portal usando as credenciais.';
    header("Location: ./index.php");

?>