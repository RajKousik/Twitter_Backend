<?php

$dsn = 'mysql:host=localhost;dbname=twitterApp';
$username = 'root';
$password = 'password';

try 
{
    $pdo = new PDO($dsn, $username, $password);
} 
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function delete_tweet($tweet_id, $user_id) {
    global $pdo;
    
    $stmt = $pdo->prepare('SELECT * FROM tweets WHERE id = ?');
    $stmt->execute([$tweet_id]);
    $tweet = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($tweet['user_id'] != $user_id) {
        return ['status' => 'error', 'message' => 'You are not the owner of this tweet'];
    }
    
    // Delete the tweet from the database
    $stmt = $pdo->prepare('DELETE FROM tweets WHERE id = ?');
    $stmt->execute([$tweet_id]);
    
    if ($stmt->rowCount() > 0) {
        return ['status' => 'success', 'message' => 'Tweet deleted successfully'];
    }
    else {
        return ['status' => 'error', 'message' => 'Error deleting tweet'];
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Retrieving tweet ID and USER ID
    $tweet_id = $_GET['tweet_id'];
    $user_id = $_GET['user_id'];
    
    $result = delete_tweet($tweet_id, $user_id);
    header('Content-Type: application/json');
    echo json_encode($result);
}

?>
