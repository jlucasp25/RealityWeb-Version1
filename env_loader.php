<?php
    require __DIR__.'/dotenv/autoload.php';
    //$dotenv = Dotenv\Dotenv::create(__DIR__."../../../../../../.");
    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
    $serverhost = getenv('DATABASE_HOST');
    $username = getenv('DATABASE_USER');
    $password = getenv('DATABASE_PSW');
    $database = getenv('DATABASE_NAME');
?>

