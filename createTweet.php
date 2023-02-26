<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/tweets', function (Request $request, Response $response) {
    return createTweet($request, $response);
});


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

function createTweet(Request $request, Response $response): Response {
    $userId = $request->getParsedBody()['user_id'];
    $tweetId = $request->getParsedBody()['tweetId'];
    $message = $request->getParsedBody()['message'];

    if (!$userId) {
        return $response->withHeader('Content-Type', 'application/json')->withStatus(401)->getBody()->write(json_encode(['error' => 'User not authenticated']));
    }
    
    if (!$message || strlen($message) > 280) {
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400)->getBody()->write(json_encode(['error' => 'Invalid tweet message']));
    }

    $createdDate = date('Y-m-d H:i:s');
    $db = new PDO('mysql:host=localhost;dbname=twitterApp', 'root', 'password');
    $stmt = $db->prepare('INSERT INTO tweets (user_id, tweet_id, created_date, message) VALUES (?, ?, ?, ?)');
    $stmt->execute([$userId, $tweetId, $createdDate, $message]);
    
    $response->getBody()->write(json_encode(['success' => true]));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
}
?>
