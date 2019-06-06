<?php
    include("config.php");
    session_start();

    $user_check = $_SESSION['user'];

    $sess_sql = mysqli_query($db, "SELECT nome FROM cliente WHERE login = '$user_check'");

    $row = mysqli_fetch_array($sess_sql, MYSQLI_ASSOC);

    $login_session = $row['nome'];

    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
