<?php

function insertDb(PDO $db, string $nome, string $cognome, string $email, int $tel, string $society = null)
{

    $query = "INSERT INTO contatti (nome, cognome, email, telefono, society)  VALUEs (?,?,?,?,?)";
    $statement = $db->prepare($query);
    $statement->execute([$nome, $cognome, $email, $tel, $society]);
    $statement = null;
}