<?php

if(array_key_exists("post", $_SESSION)){
$POST=$_SESSION['post'];
}

function validate(array $POST) :bool{
    $ok = true;
    !validateNome($POST['nome']) ? $ok=false : ""; ;
    !validateCognome($POST['cognome']) ? $ok =false : "";
    !validateEmail($POST['email']) ? $ok =false : "";
    !validatePhone($POST['telefono']) ? $ok =false : "";
    return $ok;
}

function validateNome(string $string): bool
{
    if (!preg_match('/^[A-z0-9_-]{3,15}$/', $string)) {
        echo "<div class='alert alert-danger position-relative' role='alert'>
                     Nome troppo corto!
                </div>";
        return false;
    } else {
        return true;
    }
}

function validateCognome(string $string): bool
{
    if (!preg_match('/^[A-z0-9_-]{3,15}$/', $string)) {
        echo "<div class='alert alert-danger position-relative' role='alert'>
                     Cognome troppo corto!
                </div>";
        return false;
    } else {
        return true;
    }
}

function validateEmail(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger' role='alert'>
                     Email non valida!
                </div>";
        return false;
    } else {
        return true;
    }
}

function validatePhone(string $tel): bool
{
    if (!preg_match('/^[0-9]{10}+$/', $tel)) {
        echo "<div class='alert alert-danger' role='alert'>
                    Numero di telefono non valido!
                </div>";
        return false;
    } else {
        return true;
    }
}

