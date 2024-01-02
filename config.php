<?php
    require_once 'vendor/autoload.php';

    // init configuration
    // $clientID = '626641599606-60dds9mgg3374epvbgb6sj2ui19mgd98.apps.googleusercontent.com';
    // $clientSecret = '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';

    // Todo: Đang sử dụng tài khoản 7steam. Nếu không kết nối được hãy đăng nhập thử
    // Tài khoản: 7steam.work@gmail.com
    // Mật Khẩu: TD2Qdctt21
    $clientID = '1090436927286-al4fqmdf6kgt414b1j8tst7l957gh69o.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost:8080/burninghotel/logged/home.php';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "BurningHotel";

    $con = mysqli_connect($hostname, $username, "", $database);
?>
