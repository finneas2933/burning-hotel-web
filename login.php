<?php
// Include configuration file 
require_once 'config.php';

// Include User library file 
// require_once 'User.class.php'; 
if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}
if ($gClient->getAccessToken()) {
    $gpUserProfile = $google_oauthV2->userinfo->get();

    // Khởi tạo một đối tượng User để quản lý thông tin người dùng
    $user = new User();
    $gpUserData = array();
    // $gpUserData['oauth_uid']  = !empty($gpUserProfile['id']) ? $gpUserProfile['id'] : '';
    $gpUserData['HoTen']     = !empty($gpUserProfile['given_name']) ? $gpUserProfile['given_name'] : '';
    $gpUserData['AccessToken'] = !empty($gpUserProfile['access_token']) ? $gpUserProfile['access_token'] : '';
    // $gpUserData['oauth_provider'] = 'google';

    $userData = $user->checkUser($gpUserData);

    // Lưu thông tin người dùng vào phiên làm việc
    $_SESSION['userData'] = $userData;
} else {
    // Nếu chưa xác thực tài khoản Google, hiển thị nút "Sign in with Google" để bắt đầu quá trình đăng nhập
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="login-btn">Sign in with Google</a>';
}
