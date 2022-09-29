<?php

// ! if using Docker, make sure you dont have a local MySQL server instance already running on the same port

echo "connecting to MySQL...".PHP_EOL;

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
    $dsn = "mysql:host=localhost;dbname=test"; // ! if unable to connect try 127.0.0.1 instead of localhost
    $opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    try {
        $connection = new PDO($dsn, "me", 'P@ssword1', $opt);
        echo "successfully connected to MySQL from your PHP code".PHP_EOL;
    } catch (\PDOException $pdoe) {
        echo $pdoe->getMessage().PHP_EOL;
    }
} else {
    echo "PHP extension for MySQL is not set".PHP_EOL;
    exit(1);
}