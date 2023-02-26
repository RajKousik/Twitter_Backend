<?php

$dsn = 'mysql:host=localhost;dbname=twitterApp';
$username = 'root';
$password = 'password';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function get_all_tweets() {
    global $pdo;
    
    //retreiving all the tweets from the database
    $stmt = $pdo->prepare('SELECT * FROM tweets ORDER BY created_at DESC');
    $stmt->execute();
    $tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $tweets;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $tweets = get_all_tweets();
    header('Content-Type: application/json');
    echo json_encode($tweets);
}



?>