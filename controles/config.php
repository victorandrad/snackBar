<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'mysql');
    define('DB_DATABASE', 'snack_bar');
    global $db;
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Erro ao conectar ao banco");
    mysqli_set_charset($db, 'utf8');//seta caracteres UTF-8
?>
