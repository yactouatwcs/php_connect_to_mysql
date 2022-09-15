<?php

echo "connecting to MySQL".PHP_EOL;

if( in_array ('pdo_mysql', get_loaded_extensions())) {
    // ! this code is bad, credentials are not read from a file or from env variables !
    /**
     * you need to have an existing `test` db
     *  - to create such a db in mysql shell => CREATE DATABASE test;
     * you also need a new user, still from mysql shell =>
     *   CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
     *   GRANT ALL PRIVILEGES ON test.* TO 'newuser'@'localhost';
      *  FLUSH PRIVILEGES;
     */
    $dsn = "mysql:host=localhost;dbname=test";
    $opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    echo "connected to DB".PHP_EOL;
    try {
        $connection = new PDO($dsn, "newuser", 'password', $opt);
        echo "successfully connected to MySQL from your PHP code".PHP_EOL;
    } catch (\PDOException $pdoe) {
        echo $pdoe->getMessage().PHP_EOL;
    }
} else {
    echo "PHP extension for MySQL is not set".PHP_EOL;
    exit(1);
}