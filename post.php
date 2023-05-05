<?php
session_start();
require_once("validate.php");
require_once("connect.php");
require_once("command.php");


$host = isWindwosServer() ? 'localhost' : 'host.docker.internal';
$dbName = 'rubrica';
$user = 'root';
$password = 'root';
$options = [];
$db = connectDb($host, $dbName, $user, $password);





if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if ($isOk = validate($_POST)){
        insertDb($db,$_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['telefono'], $_POST['società']);
        if(is_uploaded_file($_FILES['image']["tmp_name"])){
            $filename = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "C:/inetpub/wwwroot/Rubrica/Images/{$filename}");
        }
        $_SESSION['isOk'] = true;
        header('Location:success.php');
    }
else{
    $_SESSION['post'] = $_POST;
    $_SESSION['isOk'] = false;

    header('Location: index.php?status=failed' );
}

}