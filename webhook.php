<?php
require 'vendor/autoload.php';

$telegramToken = "ENTER_TOKEN_HERE";
$telegramURL = "https://api.telegram.org/bot{$telegramToken}/";
$tunnelURL = 'https://2f4fb27e.ngrok.io/webhook.php'; // Get this from ngrok or localtunnel


$_method    = @$_SERVER['REQUEST_METHOD'];

$_request  = json_decode(file_get_contents('php://input'), true);

// Register to Telegram, only need to do it once.
$client = new GuzzleHttp\Client(['base_uri' => $telegramURL]);
$httpResult = $client->request('POST', 'setWebhook', [
    'json' => [
        'url' => $tunnelURL,
        'allowed_updates' => [ 'message' ], // We only care for messages (for this demo)
    ]
]);

// Actual answering logic.
$_SALUTATIONS = ['/start', 'hi', 'hello'];


// Listen and Answer messages
if($_method === 'GET' || $_method === 'POST') {
    if(isset($_request['message'])) {
        $message = $_request['message'];
        $text = mb_convert_case($message['text'], MB_CASE_LOWER);

        $answer_text = "I did not quite get that...";
        if(in_array($text, $_SALUTATIONS)) {
            $answer_text = "Hello 👋!";
        }

        $answer_message = [
            'chat_id' => $message['chat']['id'],
            'text' => $answer_text,
            'parse_mode' => 'Markdown' // Markdown || HTML
        ];

        $httpResult = $client->request('POST', 'sendMessage', [
            'json' => $answer_message
        ]);
    }
}



/* return a proper HTTP response. We are a Web Service after all.*/
http_response_code(200);