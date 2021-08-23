<?php
        session_start();
        require __DIR__.'/env_loader.php';

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
         $inputUser = mysqli_real_escape_string($connection,$_POST['username']);
         $inputPassword = mysqli_real_escape_string($connection,$_POST['password']);
         
         $query = "SELECT COUNT(*) AS Count, Password, idUtilizador AS userId FROM Utilizador WHERE NomeUtilizador = '".$inputUser."';";
         
         $result = mysqli_query($connection,$query);
         
                             
        if ($result == FALSE) {
            $_SESSION['customError'] = "Ocorreu um erro ao entrar na aplicação. Por favor tente mais tarde ou utilize os contactos telefónicos.";
            header("Location: ./error.php");
            die();
          }
        
        $row = mysqli_fetch_assoc($result);

        if ($row['Count'] == 1) {

            $encryptedPassword = $row['Password'];
            
            //Bcrypt hash verification
            if (password_verify($inputPassword,$encryptedPassword)) {
                //Save user Id to session
                $_SESSION['userId'] = $row['userId'];
                //redirect to home page
                header("Location: ./pages/home.php");
            }
            else {
                $errorMessage = "Utilizador/Password errado.";
                 $_SESSION['customError'] =  $errorMessage;
                 header("Location: ./index.php");
            }        
        }
        else {
                $errorMessage = "Utilizador/Password errado.";
                 $_SESSION['customError'] =  $errorMessage;
                 header("Location: ./index.php");
        }
    
    //Close SQL connection
    mysqli_close($connection);

?>