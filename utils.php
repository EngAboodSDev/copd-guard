<?php


function redirect(String $page)
{
    echo "<script>window.location.href='" . $page . "'</script>";
}

function alertMessage($message)
{
    echo "<script>alert('" . $message . "')</script>";
}

function escapeStr($con,$str)
{
    return htmlentities(mysqli_real_escape_string($con,$str));
}



// Encryption
function encrypt($string, $key) { // key = U#h2*4pL!Z8d@9sF
    $cipher = "AES-256-CBC";
    $iv = random_bytes(openssl_cipher_iv_length($cipher));
    $encrypted = openssl_encrypt($string, $cipher, $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

// Decryption
function decrypt($encryptedString, $key) {
    $cipher = "AES-256-CBC";
    $data = base64_decode($encryptedString);
    $iv = substr($data, 0, openssl_cipher_iv_length($cipher));
    $encrypted = substr($data, openssl_cipher_iv_length($cipher));
    return openssl_decrypt($encrypted, $cipher, $key, 0, $iv);
}

function isUserLoggedIn()
{
    return isset($_COOKIE['user_id']);
}
function isAdminLoggedIn()
{
    return isset($_COOKIE['admin_id']);
}

function currentUserId()
{
    return $_COOKIE['user_id'];
}
function currentAdminId()
{
    return $_COOKIE['admin_id'];
}




?>