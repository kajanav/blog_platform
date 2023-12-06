<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo =new PDO("mysql:host=$servername",$username,$password);
  $pdo->setAttribute(PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $databaseName ="blog_system";
  $pdo->exec("CREATE DATABASE IF NOT EXISTs $databaseName");
  $pdo->exec("USE $databaseName");
    echo "Database created successfully";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}

$conn = null;
?>
<?php
// Replace these with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_system";

try {
    // Create connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the 'users' table
    $sql = "CREATE TABLE users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);

    // Create the 'posts' table
    $sql = "CREATE TABLE posts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    $conn->exec($sql);

    echo "Tables created successfully";
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}

$conn = null;
?>
