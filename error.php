<!DOCTYPE html>
<html>
<head>
    <title>FOCA Automotive - Erro</title>
</head>
<body>
<?php

session_start();

echo "<script> alert('".$_SESSION['customError']."');</script>";
unset($_SESSION['customError']);
if (isset($_SESSION['userId'])) {
    header("Location: ./pages/home.php");
    die();
}
else {
    header("Location: ./index.php");
    die();
}

?>
</body>
</html>