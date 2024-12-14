<?php

function getReply($message) {
    if (strpos($message, 'giá') !== false) {
        return "Bạn đang muốn hỏi về giá sản phẩm nào?";
    } else if (strpos($message, 'mở cửa') !== false) {
        return "Cửa hàng mở cửa từ 9h sáng đến 9h tối.";
    } else {
        return "Xin lỗi, tôi chưa hiểu câu hỏi của bạn.";
    }
}

function callGPTAPI($message) {
    $apiKey = 'YOUR_API_KEY';
    $url = 'https://api.openai.com/v1/engines/davinci-codex/completions';
    
    $data = ['prompt' => $message, 'max_tokens' => 150];
    $headers = ['Authorization: Bearer ' . $apiKey, 'Content-Type: application/json'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    return $responseData['choices'][0]['text'];
}