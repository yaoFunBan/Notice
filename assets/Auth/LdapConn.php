<?php
$login = $_POST['Login'];
$ua = base64_encode($_SERVER['HTTP_USER_AGENT']);
$secretKey = 'AhLv1WDDaMLr9lQUwFB2WhpIDpjKsus2JdwIf301fd948510e054ca9389096aaa6f8e0ea4098208lkU7J3pzUUevT0MgRnF979By0kJD1TJlbDqUFNrxba643ec628410a79a66f2a1aeb0ebe90e3ef3528FE1yLKPA9sJcAiKHAtjB';
$password = base64_encode(md5($login['Password']));
$username = $login['Username'];
$returnType = 'json'; # json, html
$url = "https://api.kku.ac.th/Auth/Server/{$ua}/{$secretKey}/{$password}/{$username}/{$returnType}";

$data = json_decode(getData($url));
print_r($data);
if ($data->success) {
    echo "<p>Success: TRUE</p>";
    echo "<p>Username: {$data->username}</p>";
    echo "<p>Firstname: {$data->firstname}</p>";
    echo "<p>Lastname: {$data->lastname}</p>";
    echo "<p>Citizen: {$data->citizen}</p>";
    echo "<p>Role: {$data->role}</p>";
    echo "<p>Ou: {$data->ou}</p>";
} else echo "Success: FALSE";

function getData($url, $type='GET', $data=array(), $timeout=3) {
    $jsonData = json_encode($data);
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_CUSTOMREQUEST => $type,
        CURLOPT_HTTPHEADER => empty($data) ? array() : array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)),
    );
    curl_setopt_array($ch, $options);

    $contentData = curl_exec($ch);
    $error = curl_error($ch);

    curl_close($ch);
    return empty($error) ? $contentData : $error;
}
