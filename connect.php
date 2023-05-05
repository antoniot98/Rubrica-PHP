<?php
function isWindwosServer(): bool
{
    if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
        return true;
    } else {
        return false;
    }
}
function connectDb(string $host, string $dbName, string $user, string $password, string $options = null)
{
    $connectionString = "mysql:host={$host};dbname={$dbName}";


    try {
        $conn = new PDO($connectionString, $user, $password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (is_null($conn)) {
            throw new Exception('connection failed');
        }
        return $conn;
    } catch (Exception $exception) {
        die($exception->getMessage());
        exit;
    }
}