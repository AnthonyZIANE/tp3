<?php
//DB details
$dbHost = 'mysql-anthonyziane.alwaysdata.net';
$dbUsername = '189623';
$dbPassword = 'voiture1313';
$dbName = 'anthonyziane_database';
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

//class Database
//{
//    private $host = 'mysql-anthonyziane.alwaysdata.net';
//    private $db   = 'anthonyziane_database';
//    private $user = '189623';
//    private $pass = 'voiture1313';
//    private $charset = 'utf8mb4';
//
//    private $pdo;
//    function __construct() {
//        $dsn = 'mysql:host='. $this->host . ';dbname='. $this->db . ';charset='. $this->charset;
//        $options = [
//            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//            PDO::ATTR_EMULATE_PREPARES   => false,
//        ];
//
//        try {
//            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
//        } catch (PDOException $e) {
//            throw new PDOException($e->getMessage(), (int)$e->getCode());
//        }
//    }
//
//    public function pdo () {
//        return $this->pdo;
//    }
//
//
//}