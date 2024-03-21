<?php

require_once '../db/config.php';

$db = new Database();
$conn = $db->connect();

try {
    // SQL to create table category
    $sql = "CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // SQL to create table formula
    $sql = "CREATE TABLE formula (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // SQL to create table group
    $sql = "CREATE TABLE `group` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // SQL to create table travel
    $sql = "CREATE TABLE travel (
    id_travel INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    description INT NOT NULL,
    date_start DATE NOT NULL,
    date_end INT NOT NULL,
    price DOUBLE NOT NULL,
    category_id INT NOT NULL ,
    formula_id INT NOT NULL ,
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (formula_id) REFERENCES formula(id)
    )";
    $conn->exec($sql);

    // SQL to create table user
    $sql = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    group_id INT,
    FOREIGN KEY (group_id) REFERENCES `group`(id)
    )";
    $conn->exec($sql);

    echo "Tables created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;