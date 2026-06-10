<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "Connected successfully\n";
    $db->exec("CREATE DATABASE IF NOT EXISTS company_cls CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database company_cls created or already exists\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
